@extends('components.site.menu', ['page' => 'blog'])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
@endsection
@section('title', 'Blog')
@section('content')
    <main class="editing">
        <img src="{{ URL::to('/') }}/images/img/oopsie.png" alt="oopsie">
        <h1>Oh, I think this page is not available now! </h1>
        <p>But don't worry! We are almost done &lt;3 </p>
    </main>
@endsection
