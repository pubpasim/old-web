<?php

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
    '/hapusUser/1',
    '/tampilUser',
    '/alumni_admin/det_pelatihan',
    '/daerah_sos_ppmb/delete/1',
    '/mahasiswaHapus/1',
    '/admin',
]);

dataset('protected post routes', [
    '/editUser',
    '/tambahUser/store',
    '/daerah_sos_ppmb/store',
]);

it('redirects anonymous visitors to the login page on GET routes', function (string $uri) {
    $this->get($uri)->assertRedirect(url('login'));
})->with('protected get routes');

it('redirects anonymous visitors to the login page on POST routes', function (string $uri) {
    $this->post($uri)->assertRedirect(url('login'));
})->with('protected post routes');

it('does not delete anything for an anonymous GET', function () {
    $this->get('/hapusUser/1')->assertRedirect(url('login'));

    expect(DB::table('tb_user')->where('id_user', 1)->exists())->toBeTrue();
});

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

it('lets a logged-in user through to protected routes', function () {
    $this->withSession(['level' => 'admin'])
        ->get('/hapusUser/2')
        ->assertRedirect(url('tampilUser'));

    expect(DB::table('tb_user')->where('id_user', 2)->exists())->toBeFalse();
});

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
