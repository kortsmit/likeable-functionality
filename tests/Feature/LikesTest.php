<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LikesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
//    function guests_can_not_like_anything()
//    {
//        $this->withExceptionHandling()
//            ->post('posts/1/likes')
//            ->assertRedirect('/login');
//    }

    /** @test */
    public function an_authenticated_user_can_like_any_post()
    {
        $this->signIn();

        $post = create('App\Post');

        $this->post('posts/' . $post->id . '/likes');

        $this->assertCount(1, $post->likes);
    }
}
