@extends('components.site.menu', ['page' => 'blog'])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/404.css') }}">
    <style>
        .error {
            background-image: url("{{ URL::to('/') }}/images/img/404.png");

        }
    </style>
@endsection
@section('title', '404')
@section('content')
    <main class="error">
        <img src="{{ URL::to('/') }}/images/img/discoboom.gif" alt="404">
        <h1>Oops, sorry!</h1>
        <p>
            We can't find the page you are looking for...
            Maybe you entered the wrong address or the page was moved.
            Try checking the spelling or go back to the main page.
        </p>
        <a href="{{ route('index') }}">Go Back</a>



    </main>
@endsection
