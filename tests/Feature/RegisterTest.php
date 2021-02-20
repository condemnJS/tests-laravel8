<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function test_get_register()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

        $response->assertSee('register');
    }

    public function test_post_register()
    {
        $user = User::factory()
            ->hasPosts()
            ->create();
    }
}
