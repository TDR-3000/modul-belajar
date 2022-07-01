@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <h1>{{ $post->title }}</h1>
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="">
                <p>By. <a href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->name }}</a> in
                    <a href="/posts?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </p>

                {{-- {!!  !!} : Dengan menggunakan ini maka ini tidak melakukan escaping --}}
                {!! $post->body !!}
            </div>
        </div>
    </div>
@endsection
