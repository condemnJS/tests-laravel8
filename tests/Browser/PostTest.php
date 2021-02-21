<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;
use App\Models\Post;

class PostTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_go_to_posts()
    {
        $post = Post::factory()->make();
        $user = User::find(2);

        $this->browse(function (Browser $browser) use ($user, $post) {
            $browser->loginAs($user)
                ->visitRoute('posts.index')
                ->assertSee('Create Post')
                ->assertTitle('Создать пост')
                ->type('title', $post->title)
                ->type('description', $post->description)
                ->press('Создать')
                ->assertPathIs('/');
        });
    }

    public function test_delete_post()
    {
        $user = User::find(2);
        $post = $user->posts[mt_rand(0, count($user->posts) - 1)];
        $this->browse(function (Browser $browser) use($user, $post) {
            $browser->loginAs($user)
                    ->visit("posts/delete/$post->id")
                    ->assertPathIs('/')
                    ->assertSee('Пост успешно удален');
        });
    }
}
