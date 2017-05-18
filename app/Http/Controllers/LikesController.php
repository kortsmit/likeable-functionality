<?php

namespace App\Http\Controllers;

use App\Post;

class LikesController extends Controller
{
    /**
     * LikesController constructor.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->middleware('auth');

        $this->post = $post;
    }

    /**
     * Like a specific post.
     *
     * @param integer $postId
     */
    public function store($postId)
    {
        $this->post->find($postId)->like();
        return $this->post->find($postId)->likeCount;
    }

    /**
     * Unlike a specific post.
     *
     * @param integer $postId
     */
    public function delete($postId)
    {
        $this->post->find($postId)->unlike();
        return $this->post->find($postId)->get();
    }
}
