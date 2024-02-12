@extends('components.site.menu', ['page' => 'espers'])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style-espers.css') }}">
    <script type="text/javascript" src="{{ asset('js/javas.js') }}"></script>
    <style>
        body {
            background-image: url("{{ URL::to('/') }}/images/svg/dislyte-bg.jpg");

        }

        .espers-main {
            background-image: url("{{ URL::to('/') }}/images/svg/pattern-bg.svg");
        }
    </style>
@endsection
@section('title', 'Espers')
@section('content')
    <section class="espers-header">
        <h2>Meet the Espers: </h2>
        <p>
            On this page, you will find out more about the Espers, their history, their culture,
            and their role in the world of Dislyte. You will also learn how to unlock, upgrade,
            and customize your Espers to make them stronger and more suited to your playstyle.
        </p>
    </section>

    <section class="espers-main">
        <div class="search">
            <form action="#" method="GET">
                <input type="text" class="search-bar" name="search" placeholder="Search by Esper name">
                <button type="submit" class="search-button">find</button>

            </form>

        </div>
        <section class="espers-content">
            @if (!empty($legendary))
                <div class="opener op1">
                    <img class="badge" src="{{ URL::to('/') }}/images/svg/5star-badge.svg" alt="5-star badge">
                    <a href="#home" class="arrow" onclick="toggleContent()">
                        <img class="arr" src="{{ URL::to('/') }}/images/svg/arrow.svg" alt="toggle arrow"
                            id="arrow">
                    </a>
                </div>

                <div class="content" id="content">

                    @foreach ($legendary as $esper)
                        <a href="{{ route('espers-gallery.show', ['espers_gallery' => $esper->id]) }}"
                            class="card c{{ $loop->iteration }}">
                            <div class="card-img">
                                <img src="{{ asset($esper->icon->path) }}" alt="{{ $esper->icon->alt }}">
                            </div>
                            <h1 class="card-txt">{{ $esper->name }}</h1>
                        </a>
                    @endforeach



                </div>
            @endif
            @if (!empty($epic))
                <div class="opener op2">
                    <img class="badge" src="{{ URL::to('/') }}/images/svg/4star-badge.svg" alt="4-star badge">
                    <a href="#home" class="arrow" onclick="toggleContent2()">
                        <img class="arr" src="{{ URL::to('/') }}/images/svg/arrow.svg" alt="toggle arrow"
                            id="arrow2">
                    </a>
                </div>
                <div class="content" id="content2">
                    @foreach ($epic as $esper)
                        <a href="{{ route('espers-gallery.show', ['espers_gallery' => $esper->id]) }}"
                            class="card c{{ $loop->iteration }}">
                            <div class="card-img">
                                <img src="{{ asset($esper->icon->path) }}" alt="{{ $esper->icon->alt }}">
                            </div>
                            <h1>{{ $esper->name }}</h1>
                        </a>
                    @endforeach

                </div>
            @endif

            @if (!empty($rare))
                <div class="opener op3">
                    <img class="badge" src="{{ URL::to('/') }}/images/svg/4star-badge.svg" alt="4-star badge">
                    <a href="#home" class="arrow" onclick="toggleContent3()">
                        <img class="arr" src="{{ URL::to('/') }}/images/svg/arrow.svg" alt="toggle arrow"
                            id="arrow3">
                    </a>
                </div>
                <div class="content" id="content2">
                    @foreach ($rare as $esper)
                        <a href="{{ route('espers-gallery.show', ['espers_gallery' => $esper->id]) }}"
                            class="card c{{ $loop->iteration }}">
                            <div class="card-img">
                                <img src="{{ asset($esper->icon->path) }}" alt="{{ $esper->icon->alt }}">
                            </div>
                            <h1>{{ $esper->name }}</h1>
                        </a>
                    @endforeach

                </div>
            @endif



            {{-- <div class="content" id="content3">
                <a href="#" class="card c1">
                    <div class="card-img">
                        <img src="espers/rare/Jeanne (Gerd) Avatar.png" alt="Jeanne">
                    </div>
                    <h1>Jeanne</h1>
                </a>
                <a href="#" class="card c2">
                    <div class="card-img">
                        <img src="espers/rare/Helena (Helen) Avatar.png" alt="helena">
                    </div>
                    <h1>helena</h1>
                </a>
                <a href="#" class="card c3">
                    <div class="card-img">
                        <img src="espers/rare/Hall (Hodur) Avatar.png" alt="hall">
                    </div>
                    <h1>hall</h1>
                </a>
                <a href="#" class="card c4">
                    <div class="card-img">
                        <img src="espers/rare/Freddy (Fenrir) Avatar.png" alt="Freddy">
                    </div>
                    <h1>Freddy</h1>
                </a>
                <a href="#" class="card c5">
                    <div class="card-img">
                        <img src="espers/rare/Drew (Anubis) Avatar.png" alt="Drew">
                    </div>
                    <h1>Drew</h1>
                </a>
                <a href="#" class="card c6">
                    <div class="card-img">
                        <img src="espers/rare/David (Jason) Avatar.png" alt="David">
                    </div>
                    <h1>David</h1>
                </a>


                <a href="#" class="card c7">
                    <div class="card-img">
                        <img src="espers/rare/Chang Pu (Yao Ji) Avatar.png" alt="Chang Pu">
                    </div>
                    <h1>Chang Pu</h1>
                </a>
                <a href="#" class="card c8">
                    <div class="card-img">
                        <img src="espers/rare/Chalmers (Idun) Avatar.png" alt="Chalmers">
                    </div>
                    <h1>Chalmers</h1>
                </a>
                <a href="#" class="card c9">
                    <div class="card-img">
                        <img src="espers/rare/Brynn (Valkyrie) Avatar.png" alt="Brynn">
                    </div>
                    <h1>Brynn</h1>
                </a>
                <a href="#" class="card c10">
                    <div class="card-img">
                        <img src="espers/rare/Berenice (Bastet) Avatar.png" alt="Berniece">
                    </div>
                    <h1>Berniece</h1>
                </a>
                <a href="#" class="card c11">
                    <div class="card-img">
                        <img src="espers/rare/Bardon (Baldr) Avatar.png" alt="Bardon">
                    </div>
                    <h1>Bardon</h1>
                </a>
                <a href="#" class="card c12">
                    <div class="card-img">
                        <img src="espers/rare/Bai Liuli (White Snake) Avatar.png" alt="Bai Liuli">
                    </div>
                    <h1>Bai Liuli</h1>
                </a>

            </div> --}}

        </section>
    </section>
@endsection
