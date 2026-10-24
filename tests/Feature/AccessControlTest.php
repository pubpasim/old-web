<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

beforeEach(function () {
    config([
        'database.default' => 'sqlite',
        'database.connections.sqlite.database' => ':memory:',
        'session.driver' => 'array',
    ]);
    DB::purge('sqlite');

    Schema::create('tb_user', function ($table) {
        $table->increments('id_user');
        $table->integer('id_mahasiswa')->nullable();
        $table->string('username');
        $table->string('password');
        $table->string('level');
    });
    Schema::create('tb_pertanyaan', function ($table) {
        $table->increments('id');
    });

    DB::table('tb_user')->insert([
        ['id_user' => 1, 'id_mahasiswa' => 7, 'username' => 'boss', 'password' => 's3cret', 'level' => 'admin'],
        ['id_user' => 2, 'id_mahasiswa' => 9, 'username' => 'alum', 'password' => 'pa55word', 'level' => 'alumni'],
    ]);
});

dataset('protected get routes', [
    '/tampilUser',
    '/alumni_admin/det_pelatihan',
    '/mahasiswa',
    '/pelatihan/index',
    '/admin',
]);

dataset('protected post routes', [
    '/editUser',
    '/tambahUser/store',
    '/daerah_sos_ppmb/store',
]);

dataset('protected delete routes', [
    '/hapusUser/1',
    '/daerah_sos_ppmb/delete/1',
    '/mahasiswaHapus/1',
    '/pelatihan/hapus/1',
]);

it('redirects anonymous visitors to the login page on GET routes', function (string $uri) {
    $this->get($uri)->assertRedirect(url('login'));
})->with('protected get routes');

it('redirects anonymous visitors to the login page on POST routes', function (string $uri) {
    $this->post($uri)->assertRedirect(url('login'));
})->with('protected post routes');

it('redirects anonymous visitors to the login page on DELETE routes and deletes nothing', function (string $uri) {
    $this->delete($uri)->assertRedirect(url('login'));

    expect(DB::table('tb_user')->count())->toBe(2);
})->with('protected delete routes');

it('keeps the public pages reachable without a session', function () {
    $this->get('/login')->assertOk();
    $this->get('/profile_video')->assertRedirect('https://youtu.be/BGh-seYCtdo');
});

it('keeps the shared short links (external redirects) working for anonymous visitors', function (string $uri, string $host) {
    $location = $this->get($uri)->assertRedirect()->headers->get('Location');

    expect($location)->toContain($host);
})->with([
    ['/formulir_online', 'docs.google.com/forms'],
    ['/video_profil', 'youtube.com'],
    ['/profile_video', 'youtu.be'],
]);

it('does not create a session when the password is wrong', function () {
    $this->post('/login/masuk', ['username' => 'boss', 'password' => 'wrong'])
        ->assertRedirect(url('login'))
        ->assertSessionMissing('level');

    $this->get('/admin')->assertRedirect(url('login'));
});

it('does not create a session for an unknown username', function () {
    $this->post('/login/masuk', ['username' => 'nobody', 'password' => 's3cret'])
        ->assertRedirect(url('login'))
        ->assertSessionMissing('level');
});

it('logs an admin in with the right password and keeps the password out of the session', function () {
    $this->post('/login/masuk', ['username' => 'boss', 'password' => 's3cret'])
        ->assertRedirect(url('admin'))
        ->assertSessionHas('level', 'admin')
        ->assertSessionMissing('password');
});

it('sends an alumni user to their own page after login', function () {
    $this->post('/login/masuk', ['username' => 'alum', 'password' => 'pa55word'])
        ->assertRedirect(url('admin/alumni/9'))
        ->assertSessionHas('level', 'alumni');
});

it('ends the session on logout', function () {
    $this->withSession(['level' => 'admin'])
        ->get('/logout')
        ->assertRedirect('/')
        ->assertSessionMissing('level');
});

// ---- deleting is DELETE-only -------------------------------------------------

it('lets a logged-in user delete with the DELETE verb', function () {
    $this->withSession(['level' => 'admin'])
        ->delete('/hapusUser/2')
        ->assertRedirect(url('tampilUser'));

    expect(DB::table('tb_user')->where('id_user', 2)->exists())->toBeFalse();
});

it('refuses to delete over GET, even for a logged-in user', function () {
    $this->withSession(['level' => 'admin'])->get('/hapusUser/2')->assertStatus(405);
    $this->get('/hapusUser/2')->assertStatus(405);

    expect(DB::table('tb_user')->where('id_user', 2)->exists())->toBeTrue();
});

it('registers no route with a deleting name that answers GET', function () {
    $offenders = collect(app('router')->getRoutes()->getRoutes())
        ->filter(fn ($route) => in_array('GET', $route->methods(), true)
            && preg_match('#(hapus|delete|destroy|remove|/del/|^del/|/hps/|delet/)#i', $route->uri()))
        ->map(fn ($route) => $route->uri())
        ->values()
        ->all();

    expect($offenders)->toBe([]);
});

it('never links to a delete route with a plain href in a view', function () {
    $bases = collect(app('router')->getRoutes()->getRoutes())
        ->filter(fn ($route) => in_array('DELETE', $route->methods(), true))
        ->map(fn ($route) => preg_replace('#/?\{.*$#', '', $route->uri()))
        ->unique()
        ->values();

    $linked = [];
    foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator(resource_path('views'))) as $file) {
        if (! $file->isFile() || ! str_ends_with($file->getFilename(), '.php')) {
            continue;
        }
        $html = file_get_contents($file->getPathname());
        foreach ($bases as $base) {
            if (preg_match('#<a\b[^>]*?href=(["\'])(?:(?!\1).)*'.preg_quote($base, '#').'#s', $html)) {
                $linked[] = $file->getFilename().' -> '.$base;
            }
        }
    }

    expect($linked)->toBe([]);
});

it('renders the delete button as a CSRF-protected DELETE form that asks for confirmation', function () {
    $html = Blade::render('<x-delete-button action="/hapusUser/5" confirm="Yakin?" class="btn btn-danger">Hapus</x-delete-button>');

    expect($html)
        ->toContain('method="POST"')
        ->toContain('action="/hapusUser/5"')
        ->toContain('name="_method" value="DELETE"')
        ->toContain('name="_token"')
        ->toContain('confirm(')
        ->toContain('Yakin?')
        ->toContain('class="btn btn-danger"')
        ->toContain('>Hapus</button>');
});
