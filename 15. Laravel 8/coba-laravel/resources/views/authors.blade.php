@extends('layouts/main')

@section('container')
    <h1 class="mb-5">Halaman Blog Authors</h1>
    @foreach ($posts as $post)
        <article class="mb-5 border-bottom pb-5">

            <h2>
                <a href="/post/{{ $post->slug }}" class="text-decoration-none">
                    {{ $post->title }}
                </a>
            </h2>
            <p>By. <a href="" class="text-decoration-none">{{ $post->author->name }}</a> in <a
                    href="/categories/{{ $post->category->slug }}"
                    class="text-decoration-none">{{ $post->category->name }}</a>
            </p>
            <p>{{ $post->excerpt }}</p>
            <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read more..</a>
        </article>
    @endforeach
@endsection
