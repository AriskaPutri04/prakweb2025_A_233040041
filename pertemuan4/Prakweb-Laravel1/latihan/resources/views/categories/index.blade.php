<x-layout title="Categories">
    
    <h1>All Categories</h1>

    <ul>
        @foreach ($categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>

</x-layout>