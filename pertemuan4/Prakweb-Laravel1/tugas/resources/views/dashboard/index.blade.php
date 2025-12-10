<x-dashboard-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>

    <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome, {{ auth()->user()->name }}</h1>

    {{-- Success Alert --}}
    @if(session('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft border border-success-subtle" role="alert">
        <svg class="w-4 h-4 me-2 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="24" height="24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12.5v5.5m0-11v.5h.01M12 9v6m-2-12v.5h.01M14 12v5m0-11v.5h.01"/>
        </svg>
        <p class="flex-1"><span class="font-medium me-1">Success!</span> {{ session('success') }}</p>
        <button type="button" onclick="this.parentElement.remove()" class="ms-auto -mx-1.5 -my-1.5 bg-success-soft text-fg-success-strong rounded-base focus:ring-2 focus:ring-success-subtle p-1.5 hover:bg-success-medium inline-flex items-center justify-center h-8 w-8">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
    @endif

    {{-- Tombol untuk menambah data baru --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('dashboard.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md transition duration-150">
            Create New Post
        </a>
    </div>

    {{-- STRUKTUR TABEL POSTS --}}
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="py-3 px-6">#</th>
                    <th scope="col" class="py-3 px-6">Title</th>
                    <th scope="col" class="py-3 px-6">Category</th>
                    <th scope="col" class="py-3 px-6">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- Perulangan data $posts (READ/INDEX) --}}
                @foreach ($posts as $post)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="py-4 px-6">{{ $loop->iteration }}</td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">{{ $post->title }}</td>
                    <td class="py-4 px-6">{{ $post->category->name }}</td>
                    <td class="py-4 px-6 flex space-x-2">
                        
                        {{-- Tombol View Detail (SHOW) --}}
                        <a href="{{ route('dashboard.show', $post->slug) }}" class="font-medium text-blue-600 hover:underline">View</a>
                        
                        {{-- Tombol Edit (UPDATE POSTS) --}}
                        {{-- Anda harus mendaftarkan route 'dashboard.edit' atau menggunakan format resource: /dashboard/posts/{slug}/edit --}}
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="font-medium text-amber-600 hover:underline">Edit</a>
                        
                        {{-- Tombol Delete (DELETE POSTS) --}}
                        <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="inline">
                            @csrf
                            @method('delete')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')" class="font-medium text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Link Pagination --}}
    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</x-dashboard-layout>