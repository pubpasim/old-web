<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

// Mahasiswa 9 (user 2) is the alumnus under test, mahasiswa 7 (user 3) is somebody else,
// mahasiswa 1 (user 1) is the admin.
const ME = 9;

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
    Schema::create('tb_pertanyaan', fn ($table) => $table->increments('id'));
    foreach (['tb_alumni_dok' => 'id_alumnidok', 'tb_detpendidikan' => 'id_detpendidikan', 'tb_detpengalaman' => 'id_detpengalaman'] as $name => $key) {
        Schema::create($name, function ($table) use ($key) {
            $table->integer($key)->primary();
            $table->integer('id_mahasiswa');
        });
    }

    DB::table('tb_user')->insert([
        ['id_user' => 1, 'id_mahasiswa' => 1, 'username' => 'boss', 'password' => 's3cret', 'level' => 'admin'],
        ['id_user' => 2, 'id_mahasiswa' => ME, 'username' => 'alum', 'password' => 'pa55word', 'level' => 'alumni'],
        ['id_user' => 3, 'id_mahasiswa' => 7, 'username' => 'other', 'password' => 'hunter22', 'level' => 'alumni'],
    ]);
    // ids 50/60/70 belong to mahasiswa 7, ids 51/61/71 to the alumnus under test
    DB::table('tb_alumni_dok')->insert([['id_alumnidok' => 50, 'id_mahasiswa' => 7], ['id_alumnidok' => 51, 'id_mahasiswa' => ME]]);
    DB::table('tb_detpendidikan')->insert([['id_detpendidikan' => 60, 'id_mahasiswa' => 7], ['id_detpendidikan' => 61, 'id_mahasiswa' => ME]]);
    DB::table('tb_detpengalaman')->insert([['id_detpengalaman' => 70, 'id_mahasiswa' => 7], ['id_detpengalaman' => 71, 'id_mahasiswa' => ME]]);
});

function alumnus(): array
{
    return ['level' => 'alumni', 'id_mahasiswa' => ME, 'id_user' => 2];
}

it('remembers who logged in', function () {
    $this->post('/login/masuk', ['username' => 'alum', 'password' => 'pa55word'])
        ->assertSessionHas('id_mahasiswa', ME)
        ->assertSessionHas('id_user', 2);
});

it('keeps an alumnus out of the admin area', function (string $method, string $uri) {
    $this->withSession(alumnus())->call($method, $uri)->assertForbidden();
})->with([
    ['GET', '/admin'],
    ['GET', '/tampilUser'],
    ['GET', '/mahasiswa'],
    ['GET', '/alumni_admin/det_pelatihan'],
    ['POST', '/editUser'],
    ['POST', '/tambahUser/store'],
    ['DELETE', '/hapusUser/1'],
]);

it('forbids another alumnus id in the URL', function (string $uri) {
    $this->withSession(alumnus())->get($uri)->assertForbidden();
})->with([
    '/admin/alumni/7',
    '/admin/alumni/akun/7',
    '/admin/alumni/profile/7',
    '/admin/alumni/aktivitas/7',
    '/editProfil/7',
    '/tambahPend/7',
    '/tambahPeng/7',
    '/admin/aktivitas/7',
]);

it('reaches the controller for their own id in the URL', function (string $uri) {
    expect($this->withSession(alumnus())->get($uri)->getStatusCode())->not->toBe(403);
})->with([
    '/admin/alumni/9',
    '/admin/alumni/akun/9',
    '/admin/alumni/profile/9',
    '/admin/alumni/aktivitas/9',
    '/editProfil/9',
    '/tambahPend/9',
    '/tambahPeng/9',
    '/admin/aktivitas/9',
]);

it('forbids another alumnus id in the form body', function (string $uri, array $body) {
    $this->withSession(alumnus())->post($uri, $body)->assertForbidden();
})->with([
    ['/simpanPend', ['idmhs' => 7]],
    ['/tambah/pengalaman', ['id' => 7]],
    ['/tambahFoto', ['id_mhs' => 7]],
    ['/tambahFoto/aktivitas', ['id_mhs' => 7]],
    ['/simpanProfil/edit/9', ['idmhs' => 7]],
]);

it('reaches the controller for their own id in the form body', function (string $uri, array $body) {
    expect($this->withSession(alumnus())->post($uri, $body)->getStatusCode())->not->toBe(403);
})->with([
    ['/simpanPend', ['idmhs' => 9]],
    ['/tambah/pengalaman', ['id' => 9]],
    ['/tambahFoto', ['id_mhs' => 9]],
    ['/tambahFoto/aktivitas', ['id_mhs' => 9]],
]);

it('cannot rewrite another account through akunEdit, even knowing its credentials', function () {
    // akunEdit only checks the target's current username and password, never who is asking.
    $this->withSession(alumnus())
        ->post('/akunEdit/9', ['id_usr' => 1, 'uss' => 'boss', 'pss' => 's3cret', 'usr' => 'hacked', 'psw1' => 'owned', 'psw2' => 'owned'])
        ->assertForbidden();

    expect(DB::table('tb_user')->where('id_user', 1)->first())
        ->username->toBe('boss')
        ->password->toBe('s3cret');
});

it('still lets an alumnus change their own account', function () {
    $this->withSession(alumnus())
        ->post('/akunEdit/9', ['id_usr' => 2, 'uss' => 'alum', 'pss' => 'pa55word', 'usr' => 'alum2', 'psw1' => 'newpass', 'psw2' => 'newpass'])
        ->assertRedirect(url('admin/alumni/9'));

    expect(DB::table('tb_user')->where('id_user', 2)->value('username'))->toBe('alum2');
});

it('cannot edit or delete records owned by someone else', function () {
    $this->withSession(alumnus())->get('/editPendidikan/9/60')->assertForbidden();
    $this->withSession(alumnus())->get('/editPengalaman/9/70')->assertForbidden();
    $this->withSession(alumnus())->get('/edit/aktivitas/9/50')->assertForbidden();
    $this->withSession(alumnus())->post('/editPendidikan', ['idmhs' => 9, 'idpnd' => 60])->assertForbidden();
    $this->withSession(alumnus())->post('/updatePengalaman', ['id' => 9, 'idpeng' => 70])->assertForbidden();
    $this->withSession(alumnus())->post('/simpan/aktivitasEdit', ['id_mhs' => 9, 'id_dok' => 50])->assertForbidden();
    $this->withSession(alumnus())->delete('/hapusAktivitas/9/50')->assertForbidden();

    expect(DB::table('tb_alumni_dok')->where('id_alumnidok', 50)->exists())->toBeTrue();
});

it('can still reach and delete their own records', function () {
    foreach (['/editPendidikan/9/61', '/editPengalaman/9/71', '/edit/aktivitas/9/51'] as $uri) {
        expect($this->withSession(alumnus())->get($uri)->getStatusCode())->not->toBe(403);
    }
    $this->withSession(alumnus())->delete('/hapusAktivitas/9/51');

    expect(DB::table('tb_alumni_dok')->where('id_alumnidok', 51)->exists())->toBeFalse();
});

it('does not restrict the other levels', function (string $level) {
    foreach (['/admin/alumni/7', '/tampilUser'] as $uri) {
        expect($this->withSession(['level' => $level])->get($uri)->getStatusCode())->not->toBe(403);
    }
})->with(['admin', 'admin_pub', 'admin_ppmb', 'ikatan_alumni']);

it('asks an alumnus without a remembered id to log in again', function () {
    $this->withSession(['level' => 'alumni'])->get('/admin/alumni/9')->assertRedirect(url('login'));
});

it('leaves the public pages open to an alumnus', function () {
    $this->withSession(alumnus())->get('/login')->assertOk();
    $this->withSession(alumnus())->get('/profile_video')->assertRedirect();
});
