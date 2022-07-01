@extends('layouts/main')

@section('container')
    <h1 class="mb-3 text-center">Halaman {{ $title }}</h1>


    <div class="row justify-content-center mb-3">
        <div class="col-6">
            <form action="/posts">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('autor') }}">
                @endif
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Jika posts nya da isi tampilkan ini --}}
    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->category->name }}">
            <div class="card-body text-center">
                <h5 class="card-title"><a href="/post/{{ $posts[0]->slug }}"
                        class="text-dark text-decoration-none fs-4">{{ $posts[0]->title }}</a></h5>
                <p class="card-text"> {{ $posts[0]->excerpt }} </p>
                <p class="card-text">
                    <small class="text-muted">
                        By. <a href="/posts?author={{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a> in
                        <a href="/posts?category={{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                    </small>
                </p>
            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}"
                                class="card-img-top" alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/post/{{ $post->slug }}" class="text-dark text-decoration-none fs-5">
                                        {{ $post->title }}
                                    </a>
                                </h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        By. <a href="/posts?author={{ $post->author->username }}"
                                            class="text-decoration-none">{{ $post->author->name }}</a> in
                                        <a href="/posts?category={{ $post->category->slug }}"
                                            class="text-decoration-none">{{ $post->category->name }}</a>
                                        {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif



    {{ $posts->links() }}


    <br><br><br><br><br><br>

    @foreach ($posts as $post)
        <article class="mb-5 border-bottom pb-5">

            {{-- Post Lama --}}
            {{-- <h2>
                <a href="/post/{{ $post['slug'] }}">
                    {{ $post['title'] }}
                </a>
                
            </h2>
            <h5>{{ $post['author'] }}</h5>
            <p>{{ $post['body'] }}</p> --}}
            {{-- end post lama --}}


            {{-- Mencari berdasarkan id --}}
            {{-- <h2>
                <a href="/post/{{ $post->id }}">
                    {{ $post->title }}
                </a>
            </h2>
            <p>{{ $post->excerpt }}</p> --}}


            {{-- Menggunakan routes model banding --}}
            <h2>
                <a href="/post/{{ $post->slug }}" class="text-decoration-none">
                    {{ $post->title }}
                </a>
            </h2>
            <p>By. <a href="/authors/{{ $post->author->username }}"
                    class="text-decoration-none">{{ $post->author->name }}</a> in
                <a href="/categories/{{ $post->category->slug }}"
                    class="text-decoration-none">{{ $post->category->name }}</a>
            </p>
            <p>{{ $post->excerpt }}</p>
            <a href="/post/{{ $post->slug }}" class="text-decoration-none">Read more..</a>
        </article>
    @endforeach
@endsection
