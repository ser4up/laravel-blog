<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repository\PostRepository;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('front.home.index', [
            'posts' => PostRepository::getListWithPagination(limit: 3)
        ]);
    }
}
