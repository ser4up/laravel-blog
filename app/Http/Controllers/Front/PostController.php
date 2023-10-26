<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repository\PostRepository;

class PostController extends Controller
{
    public function index()
    {
        return view('front.post.index', [
            'posts' => PostRepository::getListWithPagination()
        ]);
    }

    public function show(Post $post)
    {
        return view('front.post.show', [
            'post' => $post
        ]);
    }
}
