<x-layout title="All Posts">
    <h1>Daftar Post</h1>

    @foreach ($posts as $post)
        <div>
            <h3>{{ $post->title }}</h3>
            <p>Kategori: {{ $post->category->name }}</p>
            <p>Penulis: {{ $post->author->name }}</p>
            <p>{{ $post->excerpt }}</p>
        </div>
        <hr>
    @endforeach
</x-layout>