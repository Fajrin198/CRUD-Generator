@extends('layouts-copy.app')

@section('content')
    <a href="{{ route('posts.create') }}">Tambah Post</a>
    @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        <a href="{{ route('posts.show', $post) }}">Lihat</a>
        <a href="{{ route('posts.edit', $post) }}">Edit</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    @endforeach
@endsection