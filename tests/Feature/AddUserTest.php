<?php

it('has adduser page', function () {
    $response = $this->get('/adduser');

    $response->assertStatus(200);
});
