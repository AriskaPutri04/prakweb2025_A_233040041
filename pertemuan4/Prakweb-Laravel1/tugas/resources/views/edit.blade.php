@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>
    </div>
 
    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put') 
            @csrf
            
            {{-- Field Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
                
                @error('title')
                    <div class="invalid-feedback text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- Field Slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                {{-- Gunakan disabled agar tidak bisa diedit, atau tambahkan script JS untuk autogenerate --}}
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
                
                 @error('title')
                    <div class="invalid-feedback text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- Field Category --}}
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" name="category_id">
                    @foreach ($categories as $category)
                        {{-- Logika untuk memilih kategori yang sedang aktif --}}
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{-- Field Image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                
                {{-- Tampilkan gambar lama jika ada --}}
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                <input type="hidden" name="oldImage" value="{{ $post->image }}"> {{-- Input hidden untuk gambar lama --}}

                 @error('title')
                    <div class="invalid-feedback text-red-600">{{ $message }}</div>
                @enderror
            </div>

            {{-- Field Body --}}
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
               
                 @error('title')
                    <div class="invalid-feedback text-red-600">{{ $message }}</div>
                @enderror

                {{-- Gunakan Trix Editor atau Textarea biasa --}}
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="body"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div> 