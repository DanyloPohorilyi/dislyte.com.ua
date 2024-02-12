@extends('components.site.menu', ['page' => 'about'])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/aboutus.css') }}">
@endsection
@section('title', 'About Us')
@section('content')
    <div class="txt-block">
        <h1>About Us</h1>
        <p>
            Welcome to our website dedicated to Dislyte, a thrilling and immersive game that challenges your skills
            and strategy. We are Anna and Danylo, two passionate gamers and fans of Dislyte, who decided to create
            this website to share our knowledge and tips with other players.
        </p>
        <p>
            We love Dislyte because it offers a unique and captivating experience, with stunning graphics, dynamic
            gameplay, and diverse characters. Whether you prefer to play solo or with your friends, Dislyte will
            keep you entertained and engaged for hours.
        </p>
        <p style="margin-top: 25px;">
            On this website, you will find useful information and resources about Dislyte, such as:
        </p>
        <ul class="listy">
            <li>
                Guides and tutorials on how to play, level up, and master different aspects of the game
            </li>
            <li>
                Reviews and ratings of the best weapons, items, and skills in the game
            </li>
            <li>
                News and updates on the latest features, events, and patches in the game
            </li>
        </ul>
        <p style="margin-top: 25px;">
            We hope that our website will help you improve your performance and enjoyment of Dislyte. We also
            welcome your suggestions and comments on how we can make this website better and more helpful for you.
        </p>
        <p>
            Our website is constantly updated and expanded with new content and features, so make sure to check back
            often and subscribe to our newsletter to stay informed.
        </p>
        <p>
            If you want to learn more about Dislyte and get exclusive insights and tips from Danylo, you can also
            follow his Telegram channel @dislyte_ua. He posts regularly about his personal experience and opinions
            on the game, as well as some fun and funny content.
        </p>
        <p style="margin-top: 25px;">
            <span class="close">
                Thank you for visiting our website and supporting our project. We hope you have a great time playing
                Dislyte!
            </span>
        </p>
    </div>

    <div class="img-block">
        <img src="{{ URL::to('/') }}/images/img/ab1.png" alt="aboutus1">
        <img src="{{ URL::to('/') }}/images/img/ab2.png" alt="aboutus2">
        <img src="{{ URL::to('/') }}/images/img/ab3.png" alt="aboutus3">
    </div>
@endsection
