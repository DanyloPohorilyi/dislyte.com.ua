<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-footer.css') }}">
    @yield('styles')
    <title>@yield('title')</title>

    <link rel="icon" href="{{ URL::to('/') }}/images/svg/icon.png" type="image/x-icon" />
</head>
<div class="rect1 line"></div>
<div class="rect2 line"></div>
<div class="rect3 line"></div>
<div class="rect4 line"></div>
<div class="rect5 line"></div>
<div class="rect6 line"></div>
<div class="rect7 line"></div>
<div class="rect8 line"></div>
<div class="rect9 line"></div>
<div class="rect10 line"></div>

<body>
    <span class="dot1"></span>
    <span class="dot2"></span>
    <span class="dot3"></span>
    <span class="dot4"></span>

    <header class="header">
        <div class="logo-block">
            <img class="header-img" src="{{ URL::to('/') }}/images/svg/logo.svg" alt="DISLYTE LOGO">
        </div>

        <div class="header-block">
            <a class="head_1 {{ $page === 'home' ? 'active' : '' }}" href="{{ route('index') }}">
                Home
            </a>
            <a class="head_2 {{ $page === 'espers' ? 'active' : '' }}" href="{{ route('espers-gallery.index') }}">
                Espers
            </a>
            <a class="head_3 {{ $page === 'blog' ? 'active' : '' }}" href="{{ route('blog') }}">
                Blog
            </a>
            <a class="head_4 {{ $page === 'about' ? 'active' : '' }}" href="{{ route('aboutUs') }}">
                About us
            </a>
        </div>
    </header>

    <main class="main">
        @yield('content')

    </main>

    <hr>

    <footer class="footer">


        <div class="footer-logo-block">
            <img class="footer-logo-img" src="{{ asset('images/svg/logo.svg') }}" alt="DISLYTE LOGO">
            <p>
                fight for infinite possibilities
            </p>
        </div>

        <div class="footer-links">

            <a class="footer-1" href="{{ route('index') }}">
                Home
            </a>

            <a class="footer-2" href="{{ route('espers-gallery.index') }}">
                Espers
            </a>

            <a class="footer-3" href="{{ route('blog') }}">
                Blog
            </a>

            <a class="footer-4" href="{{ route('aboutUs') }}">
                About us
            </a>

            <a class="footer-5" href="{{ route('adminIndex') }}">
                Manage
            </a>
        </div>

        <div class="footer-d-media">
            <p>DISLYTE SOCIAL MEDIA</p>

            <div class="footer-d-media-links">
                <a href="https://dislyte.farlightgames.com/">
                    <img class="footer-link-img" src="{{ URL::to('/') }}/images/socialmedia/website.svg"
                        alt="website">
                </a>
                <a href="https://www.reddit.com/r/Dislyte/?rdt=48152">
                    <img class="footer-link-img" src="{{ URL::to('/') }}/images/socialmedia/reddit.svg"
                        alt="reddit">
                </a>
                <a href="https://discord.gg/dislyte">
                    <img class="footer-link-img" src="{{ URL::to('/') }}/images/socialmedia/discord.svg"
                        alt="discord">
                </a>
                <a href="https://x.com/dislyte?s=20">
                    <img class="footer-link-img" src="{{ URL::to('/') }}/images/socialmedia/twitter.svg"
                        alt="twitter">
                </a>
                <a href=https://www.youtube.com/c/dislyte"">
                    <img class="footer-link-img" src="{{ URL::to('/') }}/images/socialmedia/youtube.svg"
                        alt="youtube">
                </a>
                <a href="https://www.instagram.com/dislyte_official/">
                    <img class="footer-link-img" src="{{ URL::to('/') }}/images/socialmedia/instagram.svg"
                        alt="instagram">
                </a>
                <a href="https://www.facebook.com/Dislyte/?locale=uk_UA">
                    <img class="footer-link-img" src="{{ URL::to('/') }}/images/socialmedia/facebook.svg"
                        alt="facebook">
                </a>
            </div>
        </div>

        <div class="footer-o-media">
            <p>OUR SOCIAL MEDIA</p>
            <div class="footer-o-media-links">
                <a href="https://t.me/dislyte_ua">
                    <img class="footer-link-img" src="{{ URL::to('/') }}/images/socialmedia/telegram.svg"
                        alt="telegram">
                </a>
                <a href="">
                    <img class="footer-link-img" src="{{ URL::to('/') }}/images/socialmedia/telegram.svg"
                        alt="telegram">
                </a>

            </div>
        </div>
    </footer>

</body>

</html>
