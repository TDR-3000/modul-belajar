@extends('layouts.main')

@section('container')
    {{-- Post Lama --}}
    {{-- <h1>{{ $post['title'] }}</h1>
    <p>{{ $post['body'] }}</p>
    <a href="/posts">Back to post</a> --}}

    <h1>{{ $post->title }}</h1>
    <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in
        <a href="/posts?category={{ $post->category->slug }}"
            class="text-decoration-none">{{ $post->category->name }}</a>
    </p>

    {{-- {!!  !!} : Dengan menggunakan ini maka ini tidak melakukan escaping --}}
    {!! $post->body !!}

    <br>
    <a href="/posts" class="d-block mt-3 text-decoration-none">Back to post</a>
@endsection
