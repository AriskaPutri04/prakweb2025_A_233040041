<x-layout title="All Users">
    <h1>Daftar User</h1>

    @foreach ($users as $user)
        <p>{{ $user->name }} ({{ $user->email }})</p>
    @endforeach
</x-layout>