@extends('layouts.main')

@section('container')
    <h1>Halaman About</h1>
    <h3>{{ $name }}</h3>
    <h3>{{ $email }}</h3>
    <img src="img/{{ $image }}" width="100px" height="100px" alt="{{ $name }}" class="rounded-circle">
@endsection
