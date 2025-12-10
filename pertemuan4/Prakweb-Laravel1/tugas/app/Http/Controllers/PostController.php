<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'title' => 'All Posts',
            'posts' => Post::with(['author', 'category'])->latest()->get()
        ]);

        // Menggunakan with() untuk mengatasi N+1 Problem
        $posts = Post::with(['author', 'category'])->get();
        return view('posts', compact('posts'));
    }

    // PostController.php

// Route Model Binding untuk single post page
    public function show(Post $post)
    {
        // Menggunakan with() untuk mengatasi N+1 Problem
        $post->load(['author', 'category']);
        return view('post', compact('post'));
    }
}   