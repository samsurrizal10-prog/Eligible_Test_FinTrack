<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_homepage_redirects_to_register(): void
    {
        $response = $this->get('/');

        $response->assertRedirect('/register');
    }

    public function test_register_page_can_be_opened(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
