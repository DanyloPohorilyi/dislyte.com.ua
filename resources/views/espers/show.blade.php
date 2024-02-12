@extends('components.site.menu', ['page' => 'espers'])
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/style-esper.css') }}">
    <script type="text/javascript" src="{{ asset('js/javas.js') }}"></script>
    <style>
        ul.pri-list li+li:before {
            content: url("{{ URL::to('/') }}/images/svg/tri.png");
        }

        ul.pri-list li:before {
            content: url("{{ URL::to('/') }}/images/svg/tri.png");
            padding: 8px;
        }
    </style>
@endsection
@section('title', $esper->name . ' Page')
@section('content')

    <div class="bread-block">
        <ul class="breadcrumb">
            <li><a href="{{ route('espers-gallery.index') }}">Espers</a></li>
            <li> <span class="current">{{ $esper->name }}</span></li>
        </ul>
    </div>

    <div class="main">
        <div class="first">
            <div class="esper-header">
                {{-- <div class="esp-h e1 act"><a class="txt" href=""> Main</a></div> --}}
                {{-- <div class="esp-h e2"><a class="txt" href=""> Upgrade </a></div>
                <div class="esp-h e3"><a class="txt" href=""> Lore </a></div>
                <div class="esp-h e4"><a class="txt" href=""> Divinate </a></div>
                <div class="esp-h e5"><a class="txt" href=""> Skin </a></div>
                <div class="esp-h e6"><a class="txt" href=""> Gallery </a></div> --}}
            </div>

            <div class="esper-img">
                <img src="{{ asset($esper->sprite1->path) }}" alt="$esper->sprite1->alt" style="object-fit: contain">
            </div>

            <div class="esper-main">
                <div class="title">{{ $esper->rarity }}</div>
                <div class="name-block">
                    <div class="name">{{ $esper->name }}</div>
                    <div class="god"> ({{ $esper->god }})</div>
                    <div class="role">
                        <p>{{ strtoupper($esper->role) }}</p>
                    </div>
                </div>
                <div class="power">
                    <img src="{{ asset($esper->element->image->path) }}" alt="wind" height="25">
                    <p>{{ $esper->element->name }}</p>
                </div>
                <div class="description">
                    {{ $esper->short_description }}
                </div>
                <div class="quote">
                    <img src="{{ URL::to('/') }}/images/svg/quote-block.svg" alt="' '">
                    <div class="txt-block">
                        <p>{{ $esper->quote }}</p>
                    </div>
                </div>
            </div>

            <div class="esper-info">
                <div class="info-title">personal info</div>
                <div class="age-block">
                    <div class="age">
                        <div class="updown-block b1">
                            <p class="upper">age</p>
                            <p class="lower">{{ $esper->age }}</p>
                        </div>
                        <div class="updown-block b2">
                            <p class="upper">Birthday</p>
                            <p class="lower">{{ $esper->birthday }}</p>
                        </div>
                    </div>
                    <div class="birth">

                    </div>
                </div>
                <div class="height">
                    <div class="updown-block b1">
                        <p class="upper">Height</p>
                        <p class="lower">{{ $esper->height }}cm</p>
                    </div>
                </div>
                <div class="favorite">
                    <div class="updown-block b1">
                        <p class="upper">Favorite</p>
                        <p class="lower">{{ $favorites }}</p>
                    </div>
                </div>
                <div class="identity">
                    <div class="updown-block b1">
                        <p class="upper">Identity</p>
                        <p class="lower">{{ $esper->job }}</p>
                    </div>
                </div>
                <div class="affilation">
                    <div class="updown-block b1">
                        <p class="upper">Affiliation</p>
                        <p class="lower">{{ $esper->affiliation }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="advice">
            <h1 class="hadvice">Game advice</h1>
            <p class="p1">{{ $esper->game_advice }}
            </p>
        </div>
        <h1 class="eq1">
            Equipment advice
        </h1>
        <div class="equip">

            <div class="utility">
                <div class="card-holder card1">
                    <h1 class="ab-name">
                        {{ $esper->equipmentAdvice1->name }}
                    </h1>
                    <div class="abilities-block">
                        <div class="first-ab ability">
                            <img class="uti-logo" src="{{ asset($esper->equipmentAdvice1->fourRelics->image->path) }}"
                                alt="{{ $esper->equipmentAdvice1->fourRelics->image->alt }}">
                            <img class="uti-circles" src="{{ URL::to('/') }}/images/svg/4circles.svg" alt="4 circles">
                            <h1>{{ $esper->equipmentAdvice1->fourRelics->name }} Set</h1>
                            <p>{{ $esper->equipmentAdvice1->fourRelics->description }}</p>
                        </div>
                        <div class="sec-ab ability">
                            <img class="uti-logo" src="{{ asset($esper->equipmentAdvice1->twoRelics->image->path) }}"
                                alt="{{ $esper->equipmentAdvice1->twoRelics->image->alt }}">
                            <img class="uti-circles" src="{{ URL::to('/') }}/images/svg/2circles.svg" alt="2 circles">
                            <h1>{{ $esper->equipmentAdvice1->twoRelics->name }} Set</h1>
                            <p>{{ $esper->equipmentAdvice1->twoRelics->description }}</p>
                        </div>
                    </div>
                    <div class="ab-desc">
                        {{ $esper->equipmentAdvice1->description }}
                    </div>
                    <div class="icons">
                        <div class="icon-block ic1">
                            <img src="{{ URL::to('/') }}/images/svg/headphones.svg" alt="headphones">
                            @foreach ($esper->equipmentAdvice1->stats_to_upgrade['headphone'] as $stats)
                                <p>{{ $stats }}</p>
                            @endforeach
                        </div>
                        <div class="icon-block ic2">
                            <img src="{{ URL::to('/') }}/images/svg/ring.svg" alt="ring">
                            @foreach ($esper->equipmentAdvice1->stats_to_upgrade['ring'] as $stats)
                                <p>{{ $stats }}</p>
                            @endforeach
                        </div>
                        <div class="icon-block ic3">
                            <img src="{{ URL::to('/') }}/images/svg/boots.svg" alt="boots">
                            @foreach ($esper->equipmentAdvice1->stats_to_upgrade['boots'] as $stats)
                                <p>{{ $stats }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-holder card2">
                    <h1 class="ab-name">
                        {{ $esper->equipmentAdvice2->name }}
                    </h1>
                    <div class="abilities-block">
                        <div class="first-ab ability">
                            <img class="uti-logo" src="{{ asset($esper->equipmentAdvice2->fourRelics->image->path) }}"
                                alt="{{ $esper->equipmentAdvice2->fourRelics->image->alt }}">
                            <img class="uti-circles" src="{{ URL::to('/') }}/images/svg/4circles.svg" alt="4 circles">
                            <h1>{{ $esper->equipmentAdvice2->fourRelics->name }} Set</h1>
                            <p>{{ $esper->equipmentAdvice2->fourRelics->description }}</p>
                        </div>
                        <div class="sec-ab ability">
                            <img class="uti-logo" src="{{ asset($esper->equipmentAdvice2->twoRelics->image->path) }}"
                                alt="{{ $esper->equipmentAdvice2->twoRelics->image->alt }}">
                            <img class="uti-circles" src="{{ URL::to('/') }}/images/svg/2circles.svg" alt="2 circles">
                            <h1>{{ $esper->equipmentAdvice2->twoRelics->name }} Set</h1>
                            <p>{{ $esper->equipmentAdvice2->twoRelics->description }}</p>
                        </div>
                    </div>
                    <div class="ab-desc">
                        {{ $esper->equipmentAdvice2->description }}
                    </div>
                    <div class="icons">
                        <div class="icon-block ic1">
                            <img src="{{ URL::to('/') }}/images/svg/headphones.svg" alt="headphones">
                            @foreach ($esper->equipmentAdvice2->stats_to_upgrade['headphone'] as $stats)
                                <p>{{ $stats }}</p>
                            @endforeach
                        </div>
                        <div class="icon-block ic2">
                            <img src="{{ URL::to('/') }}/images/svg/ring.svg" alt="ring">
                            @foreach ($esper->equipmentAdvice2->stats_to_upgrade['ring'] as $stats)
                                <p>{{ $stats }}</p>
                            @endforeach
                        </div>
                        <div class="icon-block ic3">
                            <img src="{{ URL::to('/') }}/images/svg/boots.svg" alt="boots">
                            @foreach ($esper->equipmentAdvice2->stats_to_upgrade['boots'] as $stats)
                                <p>{{ $stats }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-holder card3">
                    <h1 class="ab-name">
                        {{ $esper->equipmentAdvice3->name }}
                    </h1>
                    <div class="abilities-block">
                        <div class="first-ab ability">
                            <img class="uti-logo" src="{{ asset($esper->equipmentAdvice3->fourRelics->image->path) }}"
                                alt="{{ $esper->equipmentAdvice3->fourRelics->image->alt }}">
                            <img class="uti-circles" src="{{ URL::to('/') }}/images/svg/4circles.svg" alt="4 circles">
                            <h1>{{ $esper->equipmentAdvice3->fourRelics->name }} Set</h1>
                            <p>{{ $esper->equipmentAdvice3->fourRelics->description }}</p>
                        </div>
                        <div class="sec-ab ability">
                            <img class="uti-logo" src="{{ asset($esper->equipmentAdvice3->twoRelics->image->path) }}"
                                alt="{{ $esper->equipmentAdvice3->twoRelics->image->alt }}">
                            <img class="uti-circles" src="{{ URL::to('/') }}/images/svg/2circles.svg" alt="2 circles">
                            <h1>{{ $esper->equipmentAdvice3->twoRelics->name }} Set</h1>
                            <p>{{ $esper->equipmentAdvice3->twoRelics->description }}</p>
                        </div>
                    </div>
                    <div class="ab-desc">
                        {{ $esper->equipmentAdvice3->description }}
                    </div>
                    <div class="icons">
                        <div class="icon-block ic1">
                            <img src="{{ URL::to('/') }}/images/svg/headphones.svg" alt="headphones">
                            @foreach ($esper->equipmentAdvice3->stats_to_upgrade['headphone'] as $stats)
                                <p>{{ $stats }}</p>
                            @endforeach
                        </div>
                        <div class="icon-block ic2">
                            <img src="{{ URL::to('/') }}/images/svg/ring.svg" alt="ring">
                            @foreach ($esper->equipmentAdvice3->stats_to_upgrade['ring'] as $stats)
                                <p>{{ $stats }}</p>
                            @endforeach
                        </div>
                        <div class="icon-block ic3">
                            <img src="{{ URL::to('/') }}/images/svg/boots.svg" alt="boots">
                            @foreach ($esper->equipmentAdvice3->stats_to_upgrade['boots'] as $stats)
                                <p>{{ $stats }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="substat">
            <h1>Substat Priority</h1>
            <div class="priority">
                @foreach ($priorityStats as $stat)
                    @if ($loop->first)
                        <div class="block small-block">{{ $stat }}</div>
                        <ul class="pri-list">
                        @elseif ($loop->last)
                            <li><span class="block">{{ $stat }}</span></li>
                        </ul>
                    @else
                        <li><span class="block">{{ $stat }}</span></li>
                    @endif
                @endforeach


            </div>
        </div>
    </div>
@endsection
