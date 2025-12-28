<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller; // Tambahkan ini jika error

class PostController extends Controller
{
    public function index()
    {
        // Mengambil semua data posts dari API
        $response = Http::get('https://apipw.kodingin.id/api/posts');
 
        if ($response->failed()) {
            abort(500, 'Gagal mengambil data posts');
        }

        $posts = $response->json('data');

        return view('posts', compact('posts'));
    }

    public function show($id)
    {
        // Mengambil detail satu post berdasarkan ID
        $response = Http::get("https://apipw.kodingin.id/api/posts/{$id}");

        if ($response->failed()) {
            abort(404, 'Post tidak ditemukan');
        }

        $post = $response->json('data');

        return view('post', compact('post'));
    }
}