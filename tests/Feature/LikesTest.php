<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LikesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_like_any_post()
    {
        $post = factory('App\Post')->make();

        $this->post('posts/' . $post->id . '/likes');

        $this->assertCount(1, $post->likes);
    }
}
