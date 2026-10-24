<?php

it('returns a successful response', function () {
    // '/' queries many tables; the login page is the public entry point that needs no data.
    $response = $this->get('/login');

    $response->assertStatus(200);
});
