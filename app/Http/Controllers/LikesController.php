<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    /**
     * LikesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     *
     * @param Post $post
     * @return mixed
     */
    public function store(Post $post)
    {
        return \DB::table('likes')->insert([
            'user_id'    => auth()->id(),
            'liked_id'   => $post->id,
            'liked_type' => get_class($post)
        ]);
    }
}
