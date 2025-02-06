@extends('layouts-copy.app')

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Judul">
        <textarea name="content" placeholder="Konten"></textarea>
        <button type="submit">Simpan</button>
    </form>
@endsection