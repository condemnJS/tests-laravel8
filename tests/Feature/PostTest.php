<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_posts()
    {
        $response = $this->get('/posts');

        $response->assertStatus(200);
    }

    public function test_create_post()
    {
        $response = $this->post('/posts/create');
    }
}
