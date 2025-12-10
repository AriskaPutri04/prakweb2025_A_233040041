<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        // menggunakan user_id dari user yang sedang login
         $posts = Post::query();
        
        // fitur search
        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%');
        }

        // menampilkan 5 data per halaman dengan pagination
        return view('dashboard.index', [
            'posts' => $posts->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua categories
        $categories = Category::all();

        return view('dashboard.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) { // Menggunakan hasFile() seperti di gambar
            // Store file di storage/app/public/post-images
            // Method store() akan generate nama file unik otomatis
            $imagePath = $request->file('image')->store('post-images', 'public');
        }
        
        // Generate slug dari title
        $slug = Str::slug($request->title);

        // Pastikan slug unique - jika sudah, tambahkan angka di belakang
        $originalSlug = $slug;
        $count = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        // Create post
        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image' => $imagePath, // Simpan path gambar (contoh: post-images/abc123.jpg)
            'user_id' => 1,
        ]); 

        return redirect()->route('dashboard.index')->with('success', 'Post created
    successfully!');

    // Validasi input dengan custom messages
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
        'category_id' => 'required|exists:categories,id', // Memastikan ID ada di tabel categories
        'excerpt' => 'required',
        'body' => 'required',
        // Aturan untuk Image: Opsional (nullable), harus gambar, format tertentu, max 2MB
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
        // Custom Messages
        'title.required' => 'Field Title wajib diisi',
        'title.max' => 'Field Title tidak boleh lebih dari 255 karakter',
        'category_id.required' => 'Field Category wajib dipilih',
        'category_id.exists' => 'Category yang dipilih tidak valid',
        'excerpt.required' => 'Field Excerpt wajib diisi',
        'body.required' => 'Field Content wajib diisi',
        'image.image' => 'File harus berupa gambar',
        'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
        'image.max' => 'Ukuran gambar maksimal 2MB',
         ]);

    // Jika validasi gagal, redirect kembali dengan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Mengirimkan semua pesan error kembali
                ->withInput(); // Mengirimkan semua data yang sudah diinput (old data)
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
