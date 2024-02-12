@extends('components.site.menu', ['page' => 'home'])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style-index.css') }}">
@endsection
@section('title', 'Dislyte Page')
@section('content')
    <div class="main-1">
        <img class="main-1_gif" src="{{ asset('images/img/output-onlinegiftools.gif') }}" alt="red-haired-boy">
        <div class="main-1_text">
            <h2>
                <span style="color: #FF102F;">Dislyte:</span> The Gods are <br> waiting for your choice
            </h2>
            <div class="main-1_p">
                <p>
                    Dislyte is an open world game where you can create your own character, explore a vast and
                    diverse
                    world, and make choices that have an impact on the story and the environment.

                </p>
            </div>

        </div>
    </div>

    <div class="main-2">

        <video src="vid/out (2).mp4" loop muted autoplay></video>
        <div class="layout"></div>

        <div class="content">
            <h1 class="title">
                Fight with the Gods in a Stylish <br>
                Urban Mythological RPG
            </h1>

            <p class="text">
                Dislyte is a game that combines stunning visuals, captivating comics, and thrilling battles in a
                futuristic world where urban myths become reality. You can build your squad of superhero Espers, who
                gained powers from the myth gods, and fight the monsters that are hell-bent on causing destruction.
                Explore the stories of various unique characters and unravel the mysteries that lie beneath.
                Pandora’s
                box has been opened. Will you stand up and fight for humanity?
            </p>

            <a href="https://play.google.com/store/apps/details?id=com.lilithgames.xgame.gp&pcampaignid=web_share"
                class="button">
                play

            </a>
        </div>


    </div>

    <div class="espers">
        <h1 class="title">
            espers
        </h1>

        <div class="cards">
            <div class="card card1">
                <div class="card-inner">
                    <div class="card-front"
                        style="background-image: url({{ asset($espers->firstWhere('name', 'Clara')->resonanceImg->path) }})">
                    </div>
                    <div class="card-back">
                        <p>
                            {{ $espers->firstWhere('name', 'Clara')->name }}
                            <br>
                            ({{ $espers->firstWhere('name', 'Clara')->god }})
                        </p>
                        <a class="card-a"
                            href="{{ route('espers-gallery.show', ['espers_gallery' => $espers->firstWhere('name', 'Clara')->id]) }}">
                            <p>more</p>
                            <img class="arr" src="{{ asset('images/svg/arr.svg') }}" alt="->">
                            <img class="arr2" src="{{ asset('images/svg/arr2.svg') }}" alt="->">

                        </a>
                    </div>
                </div>
            </div>

            <div class="card card2">
                <div class="card-inner">
                    <div class="card-front"
                        style="background-image: url({{ asset($espers->firstWhere('name', 'Elliot')->resonanceImg->path) }})">
                    </div>
                    <div class="card-back">
                        <p>
                            {{ $espers->firstWhere('name', 'Elliot')->name }}
                            <br>
                            ({{ $espers->firstWhere('name', 'Elliot')->god }})
                        </p>
                        <a class="card-a"
                            href="{{ route('espers-gallery.show', ['espers_gallery' => $espers->firstWhere('name', 'Elliot')->id]) }}">
                            <p>more</p>
                            <img class="arr" src="{{ asset('images/svg/arr.svg') }}" alt="->">
                            <img class="arr2" src="{{ asset('images/svg/arr2.svg') }}" alt="->">

                        </a>
                    </div>
                </div>
            </div>

            <div class="card card3">
                <div class="card-inner">
                    <div class="card-front"
                        style="background-image: url({{ asset($espers->firstWhere('name', 'Gaius')->resonanceImg->path) }})">
                    </div>
                    <div class="card-back">
                        <p>
                            {{ $espers->firstWhere('name', 'Gaius')->name }}
                            <br>
                            ({{ $espers->firstWhere('name', 'Gaius')->god }})
                        </p>
                        <a class="card-a"
                            href="{{ route('espers-gallery.show', ['espers_gallery' => $espers->firstWhere('name', 'Gaius')->id]) }}">
                            <p>more</p>
                            <img class="arr" src="{{ asset('images/svg/arr.svg') }}" alt="->">
                            <img class="arr2" src="{{ asset('images/svg/arr2.svg') }}" alt="->">

                        </a>
                    </div>
                </div>
            </div>

            <div class="card card4">
                <div class="card-inner">
                    <div class="card-front"
                        style="background-image: url('{{ asset($espers->firstWhere('name', 'Jiang Jiuli')->resonanceImg->path) }}')">
                    </div>
                    <div class="card-back">
                        <p>
                            {{ $espers->firstWhere('name', 'Jiang Jiuli')->name }}
                            <br>
                            ({{ $espers->firstWhere('name', 'Jiang Jiuli')->god }})
                        </p>
                        <a class="card-a"
                            href="{{ route('espers-gallery.show', ['espers_gallery' => $espers->firstWhere('name', 'Jiang Jiuli')->id]) }}">
                            <p>more</p>
                            <img class="arr" src="{{ asset('images/svg/arr.svg') }}" alt="->">
                            <img class="arr2" src="{{ asset('images/svg/arr2.svg') }}" alt="->">

                        </a>
                    </div>
                </div>
            </div>

            <div class="card card5">
                <div class="card-inner">
                    <div class="card-front"
                        style="background-image: url('{{ asset($espers->firstWhere('name', 'Leon')->resonanceImg->path) }}')">
                    </div>
                    <div class="card-back">
                        <p>
                            {{ $espers->firstWhere('name', 'Leon')->name }}
                            <br>
                            ({{ $espers->firstWhere('name', 'Leon')->god }})
                        </p>
                        <a class="card-a"
                            href="{{ route('espers-gallery.show', ['espers_gallery' => $espers->firstWhere('name', 'Leon')->id]) }}">
                            <p>more</p>
                            <img class="arr" src="{{ asset('images/svg/arr.svg') }}" alt="->">
                            <img class="arr2" src="{{ asset('images/svg/arr2.svg') }}" alt="->">

                        </a>
                    </div>
                </div>
            </div>

            <div class="card card6">
                <div class="card-inner">
                    <div class="card-front"
                        style="background-image: url('{{ asset($espers->firstWhere('name', 'Yuuhime')->resonanceImg->path) }}')">
                    </div>
                    <div class="card-back">
                        <p>
                            {{ $espers->firstWhere('name', 'Yuuhime')->name }}
                            <br>
                            ({{ $espers->firstWhere('name', 'Yuuhime')->god }})
                        </p>
                        <a class="card-a"
                            href="{{ route('espers-gallery.show', ['espers_gallery' => $espers->firstWhere('name', 'Yuuhime')->id]) }}">
                            <p>more</p>
                            <img class="arr" src="{{ asset('images/svg/arr.svg') }}" alt="->">
                            <img class="arr2" src="{{ asset('images/svg/arr2.svg') }}" alt="->">

                        </a>
                    </div>
                </div>
            </div>

            <div class="card card7">
                <div class="card-inner">
                    <div class="card-front"
                        style="background-image: url('{{ asset($espers->firstWhere('name', 'Luo Yan')->resonanceImg->path) }}')">
                    </div>
                    <div class="card-back">
                        <p>
                            {{ $espers->firstWhere('name', 'Luo Yan')->name }}
                            <br>
                            ({{ $espers->firstWhere('name', 'Luo Yan')->god }})
                        </p>
                        <a class="card-a"
                            href="{{ route('espers-gallery.show', ['espers_gallery' => $espers->firstWhere('name', 'Luo Yan')->id]) }}">
                            <p>more</p>
                            <img class="arr" src="{{ asset('images/svg/arr.svg') }}" alt="->">
                            <img class="arr2" src="{{ asset('images/svg/arr2.svg') }}" alt="->">

                        </a>
                    </div>
                </div>
            </div>

            <div class="card card8">
                <div class="card-inner">
                    <div class="card-front"
                        style="background-image: url('{{ asset($espers->firstWhere('name', 'Sally')->resonanceImg->path) }}')">
                    </div>
                    <div class="card-back">
                        <p>
                            {{ $espers->firstWhere('name', 'Sally')->name }}
                            <br>
                            ({{ $espers->firstWhere('name', 'Sally')->god }})
                        </p>
                        <a class="card-a"
                            href="{{ route('espers-gallery.show', ['espers_gallery' => $espers->firstWhere('name', 'Sally')->id]) }}">
                            <p>more</p>
                            <img class="arr" src="{{ asset('images/svg/arr.svg') }}" alt="->">
                            <img class="arr2" src="{{ asset('images/svg/arr2.svg') }}" alt="->">

                        </a>
                    </div>
                </div>
            </div>


        </div>
        <div class="button-block">
            <a href="{{ route('espers-gallery.index') }}" class="button">
                more
            </a>
        </div>
    </div>

    <div class="main-4">
        <video src="vid/out (3).mp4" loop muted autoplay></video>
        <div class="cards">


            <h1 class="title">
                Why should you play Dislyte?
            </h1>

            <p class="text">
                If you like nice graphics, exciting comics, and thrilling battles in a world where urban myths
                become reality, then Dislyte is the game for you.
            </p>


        </div>


    </div>
@endsection
