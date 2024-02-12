@extends('components.admins.menu', ['active' => 'espers'])
@section('title', 'Add Esper')
@section('content')
    <div class=" d-flex flex-column flex-shrink-1 container py-4 h-100 bg-white">
        <h1 class="display-6 mb-3">New Esper</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <hr>

        {!! Form::open(['route' => ['espers.store'], 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-4">
                <div class="container d-flex flex-md-column align-items-center">
                    <svg class="bd-placeholder-img card-img-top" width="20rem" height="18rem"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                        preserveAspectRatio="xMidYMid slice" focusable="false" id="placeholder-image">
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em"></text>
                    </svg>
                    <img src="" alt="" id="mainImagePreview" class="img-thumbnail d-none"
                        style="max-width: 20rem; object-fit: contain; height: 18rem;">
                    <label for="mainImage" class="form-label mt-2">Main Image</label>
                    {!! Form::file('sprite1', [
                        'id' => 'mainImage',
                        'class' => 'form-control',
                        'onchange' => 'preview()',
                        'accept' => 'image/gif, image/jpeg, image/png, image/webp, image/svg+xml',
                    ]) !!}
                    {{-- <input type="file" id="mainImage" class="form-control" onchange="preview()"
                        accept="image/gif, image/jpeg, image/png, image/webp"> --}}
                </div>

            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name', 'aria-label' => 'Name']) !!}
                        {{-- <input type="text" class="form-control" placeholder="Name" aria-label="Name"> --}}
                    </div>
                    <div class="col">
                        {!! Form::text('god', null, ['class' => 'form-control', 'placeholder' => 'God', 'aria-label' => 'God']) !!}
                        {{-- <input type="text" class="form-control" placeholder="God" aria-label="Name"> --}}
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <label for="rarity" class="form-label">Rarity</label>
                        {!! Form::select(
                            'rarity',
                            [
                                'rare' => 'Rare',
                                'epic' => 'Epic',
                                'legendary' => 'Legendary',
                            ],
                            null,
                            ['class' => 'form-select', 'id' => 'rarity'],
                        ) !!}
                        {{-- <select class="form-select" name="" id="rarity">
                            <option value="">Rare</option>
                            <option value="">Epic</option>
                            <option value="">Legendary</option>
                        </select> --}}
                    </div>
                    <div class="col">
                        <label for="element" class="form-label">Element</label>
                        {!! Form::select('element', $elements->pluck('name', 'id'), null, [
                            'class' => 'form-control',
                            'id' => 'element',
                        ]) !!}
                        {{-- <select class="form-select" name="" id="element">
                            <option value="">Inferno</option>
                            <option value="">Flow</option>
                            <option value="">Wind</option>
                            <option value="">Shimmer</option>
                        </select> --}}
                    </div>
                    <div class="col">
                        <label for="role" class="form-label">Role</label>
                        {!! Form::select(
                            'role',
                            [
                                'fighter' => 'Fighter',
                                'support' => 'Support',
                                'defender' => 'Defender',
                                'controller' => 'Controller',
                            ],
                            null,
                            ['class' => 'form-select', 'id' => 'role'],
                        ) !!}
                        {{-- <select class="form-select" name="" id="role">
                            <option value="">Fighter</option>
                            <option value="">Support</option>
                            <option value="">Defender</option>
                            <option value="">Controller</option>
                        </select> --}}
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <label for="short-descriprtion" class="form-label">Short Description</label>
                        {!! Form::textarea('short_description', null, [
                            'class' => 'form-control',
                            'id' => 'short-description',
                            'rows' => 4,
                            'maxlength' => 250,
                        ]) !!}
                        {{-- <textarea class="form-control" id="short-descriprtion" rows="4" maxlength="250"></textarea> --}}
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <label for="quote" class="form-label">Quote</label>
                        {!! Form::textarea('quote', null, ['class' => 'form-control', 'id' => 'quote', 'rows' => 2, 'maxlength' => 150]) !!}
                        {{-- <textarea class="form-control" id="quote" rows="2" maxlength="150"></textarea> --}}
                    </div>
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-md-3 m-3">
                <div class="row">
                    <div class="col bg-body-secondary p-4 rounded-2  ">
                        <h6>Personal Info</h6>
                        {!! Form::text('age', null, ['class' => 'form-control', 'placeholder' => 'Age', 'aria-label' => 'Age']) !!}
                        {!! Form::text('birthday', null, [
                            'class' => 'form-control mt-2',
                            'placeholder' => 'Birthday: July 30, 1994',
                            'aria-label' => 'Birthday',
                        ]) !!}
                        {!! Form::text('height', null, [
                            'class' => 'form-control mt-2',
                            'placeholder' => 'Height: 173cm',
                            'aria-label' => 'Height',
                        ]) !!}
                        {!! Form::text('favorites', null, [
                            'class' => 'form-control mt-2',
                            'placeholder' => 'Favorite: Basebal;Edit video',
                            'aria-label' => 'Favorite',
                        ]) !!}
                        {!! Form::text('job', null, [
                            'class' => 'form-control mt-2',
                            'placeholder' => 'Identity: Healer',
                            'aria-label' => 'Identity',
                        ]) !!}
                        {!! Form::text('affiliation', null, [
                            'class' => 'form-control mt-2',
                            'placeholder' => 'Affilation: Esper Union',
                            'aria-label' => 'Affiliation',
                        ]) !!}

                        {{-- <input type="text" class="form-control" placeholder="Age" aria-label="Age: 33">
                        <input type="text" class="form-control mt-2" placeholder="Birthday: July 30, 1994"
                            aria-label="Birthday">
                        <input type="text" class="form-control mt-2" placeholder="Height: 173cm" aria-label="Height">
                        <input type="text" class="form-control mt-2" placeholder="Favorite: Basebal;Edit video"
                            aria-label="Favorite">
                        <input type="text" class="form-control mt-2" placeholder="Identity: Healer"
                            aria-label="Identity">
                        <input type="text" class="form-control mt-2" placeholder="Affilation: Esper Union"
                            aria-label="Favorite"> --}}
                    </div>
                </div>
            </div>
            <div class="col m-2 mt-3">
                <h4 class="text-center">Game advice</h4>
                {!! Form::textarea('gameAdvice', null, ['class' => 'form-control', 'rows' => 12, 'id' => 'editor']) !!}
                {{-- <textarea id="editor" rows="12" class="form-control"></textarea> --}}
            </div>
        </div>
        <div class="row">
            <h4 class="text-center">Equipment advice</h4>
            <div class="container-fluid">

                <div class="row">
                    <div class="col bg-body-secondary rounded-2 ms-3 pt-2">
                        <div class="row m-3">
                            {!! Form::text('adviceName1', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Name advice...',
                                'aria-label' => 'Name advice',
                            ]) !!}
                            {{-- <input type="text" class="form-control" name="" id=""
                                placeholder="Name advice..." aria-label="Name advice"> --}}
                        </div>
                        <div class="row m-3">
                            <label for="set-4-advice-1" class="form-label">4 relics</label>
                            {{ Form::select('equipmentSetFour1', $eq_4->pluck('name', 'id'), null, [
                                'class' => 'form-select',
                                'id' => 'set-4-advice-1',
                            ]) }}
                            {{-- <select class="form-select" name="" id="set-4-advice-1">
                                <option value="">War</option>
                                <option value="">Wind</option>
                                <option value="">Thunder</option>
                                <option value="">Nether</option>
                                <option value="">Ocean</option>
                                <option value="">Avatara</option>
                            </select> --}}
                        </div>
                        <div class="row m-3">
                            <label for="set-2-advice-1" class="form-label">2 relics</label>
                            {{ Form::select('equipmentSetTwo1', $eq_2->pluck('name', 'id'), null, [
                                'class' => 'form-select',
                                'id' => 'set-2-advice-1',
                            ]) }}
                            {{-- <select class="form-select" name="" id="set-2-advice-1">
                                <option value="">War</option>
                                <option value="">Wind</option>
                                <option value="">Thunder</option>
                                <option value="">Nether</option>
                                <option value="">Ocean</option>
                                <option value="">Avatara</option>
                            </select> --}}
                        </div>
                        <div class="row m-3">
                            {{ Form::textarea('advice_description1', null, [
                                'class' => 'form-control',
                                'id' => 'advice-description1',
                                'rows' => 3,
                                'placeholder' => 'Describe your advice...',
                            ]) }}
                            {{-- <textarea name="" class="form-control" id="" rows="3" placeholder="Describe your advise..."></textarea> --}}
                        </div>
                        <div class="row m-3">
                            <div class="col d-flex align-items-center flex-column">
                                <label for="stat11" class="form-label ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-headphones" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5" />
                                    </svg>
                                </label>
                                {{ Form::select(
                                    'stats11[]',
                                    [
                                        'ATK%' => 'ATK%',
                                        'HP%' => 'HP%',
                                        'DEF%' => 'DEF%',
                                        'C. RATE' => 'C. RATE',
                                        'C. DMG' => 'C. DMG',
                                        'SPD' => 'SPD',
                                        'RESIST' => 'RESIST',
                                        'ACC' => 'ACC',
                                    ],
                                    null,
                                    ['class' => 'form-select', 'id' => 'stat11', 'multiple' => 'multiple'],
                                ) }}
                                {{-- <select name="" id="stat11" class="form-select" multiple>
                                    <option value="">ATK%</option>
                                    <option value="">HP%</option>
                                    <option value="">DEF%</option>
                                    <option value="">C. RATE</option>
                                    <option value="">C. DMG</option>
                                    <option value="">SPD</option>
                                    <option value="">RESIST</option>
                                    <option value="">ACC</option>
                                </select> --}}
                            </div>
                            <div class="col d-flex align-items-center flex-column">
                                <label for="stat12" class="form-label ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-headphones" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    </svg>
                                </label>
                                {{ Form::select(
                                    'stats12[]',
                                    [
                                        'ATK%' => 'ATK%',
                                        'HP%' => 'HP%',
                                        'DEF%' => 'DEF%',
                                        'C. RATE' => 'C. RATE',
                                        'C. DMG' => 'C. DMG',
                                        'SPD' => 'SPD',
                                        'RESIST' => 'RESIST',
                                        'ACC' => 'ACC',
                                    ],
                                    null,
                                    ['class' => 'form-select', 'id' => 'stat12', 'multiple' => 'multiple'],
                                ) }}
                                {{-- <select name="" id="stat12" class="form-select" multiple>
                                    <option value="">ATK%</option>
                                    <option value="">HP%</option>
                                    <option value="">DEF%</option>
                                    <option value="">C. RATE</option>
                                    <option value="">C. DMG</option>
                                    <option value="">SPD</option>
                                    <option value="">RESIST</option>
                                    <option value="">ACC</option>
                                </select> --}}
                            </div>
                            <div class="col d-flex align-items-center flex-column">
                                <label for="stat13" class="form-label ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-headphones" viewBox="0 0 24 24">
                                        <path
                                            d="M22,16v1H4V2H14V12h4A4,4,0,0,1,22,16ZM4,20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V19H4Z" />
                                    </svg>
                                </label>
                                {{ Form::select(
                                    'stats13[]',
                                    [
                                        'ATK%' => 'ATK%',
                                        'HP%' => 'HP%',
                                        'DEF%' => 'DEF%',
                                        'C. RATE' => 'C. RATE',
                                        'C. DMG' => 'C. DMG',
                                        'SPD' => 'SPD',
                                        'RESIST' => 'RESIST',
                                        'ACC' => 'ACC',
                                    ],
                                    null,
                                    ['class' => 'form-select', 'id' => 'stat13', 'multiple' => 'multiple'],
                                ) }}
                                {{-- <select name="" id="stat13" class="form-select" multiple>
                                    <option value="">ATK%</option>
                                    <option value="">HP%</option>
                                    <option value="">DEF%</option>
                                    <option value="">C. RATE</option>
                                    <option value="">C. DMG</option>
                                    <option value="">SPD</option>
                                    <option value="">RESIST</option>
                                    <option value="">ACC</option>
                                </select> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col bg-body-secondary rounded-2 ms-3 me-3 pt-2">
                        <div class="row m-3">
                            {!! Form::text('adviceName2', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Name 2nd advice...',
                                'aria-label' => 'Name advice',
                            ]) !!}
                            {{-- <input type="text" class="form-control" name="" id=""
                                placeholder="Name 2nd advice..." aria-label="Name advice"> --}}
                        </div>
                        <div class="row m-3">
                            <label for="set-4-advice-2" class="form-label">4 relics</label>
                            {{ Form::select('equipmentSetFour2', $eq_4->pluck('name', 'id'), null, [
                                'class' => 'form-select',
                                'id' => 'set-4-advice-3',
                            ]) }}
                            {{-- <select class="form-select" name="" id="set-4-advice-2">
                                <option value="">War</option>
                                <option value="">Wind</option>
                                <option value="">Thunder</option>
                                <option value="">Nether</option>
                                <option value="">Ocean</option>
                                <option value="">Avatara</option>
                            </select> --}}
                        </div>
                        <div class="row m-3">
                            <label for="set-2-advice-2" class="form-label">2 relics</label>
                            {{ Form::select('equipmentSetTwo2', $eq_2->pluck('name', 'id'), null, [
                                'class' => 'form-select',
                                'id' => 'set-2-advice-2',
                            ]) }}
                            {{-- <select class="form-select" name="" id="set-2-advice-2">
                                <option value="">War</option>
                                <option value="">Wind</option>
                                <option value="">Thunder</option>
                                <option value="">Nether</option>
                                <option value="">Ocean</option>
                                <option value="">Avatara</option>
                            </select> --}}
                        </div>
                        <div class="row m-3">
                            {{ Form::textarea('advice_description2', null, [
                                'class' => 'form-control',
                                'id' => 'advice-description2',
                                'rows' => 3,
                                'placeholder' => 'Describe your advice...',
                            ]) }}
                            {{-- <textarea name="" class="form-control" id="" rows="3" placeholder="Describe your advise..."></textarea> --}}
                        </div>
                        <div class="row m-3">
                            <div class="col d-flex align-items-center flex-column">
                                <label for="stat21" class="form-label ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-headphones" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5" />
                                    </svg>
                                </label>
                                {{ Form::select(
                                    'stats21[]',
                                    [
                                        'ATK%' => 'ATK%',
                                        'HP%' => 'HP%',
                                        'DEF%' => 'DEF%',
                                        'C. RATE' => 'C. RATE',
                                        'C. DMG' => 'C. DMG',
                                        'SPD' => 'SPD',
                                        'RESIST' => 'RESIST',
                                        'ACC' => 'ACC',
                                    ],
                                    null,
                                    ['class' => 'form-select', 'id' => 'stat21', 'multiple' => 'multiple'],
                                ) }}
                                {{-- <select name="" id="stat21" class="form-select" multiple>
                                    <option value="">ATK%</option>
                                    <option value="">HP%</option>
                                    <option value="">DEF%</option>
                                    <option value="">C. RATE</option>
                                    <option value="">C. DMG</option>
                                    <option value="">SPD</option>
                                    <option value="">RESIST</option>
                                    <option value="">ACC</option>
                                </select> --}}
                            </div>
                            <div class="col d-flex align-items-center flex-column">
                                <label for="stat22" class="form-label ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-headphones" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    </svg>
                                </label>
                                {{ Form::select(
                                    'stats22[]',
                                    [
                                        'ATK%' => 'ATK%',
                                        'HP%' => 'HP%',
                                        'DEF%' => 'DEF%',
                                        'C. RATE' => 'C. RATE',
                                        'C. DMG' => 'C. DMG',
                                        'SPD' => 'SPD',
                                        'RESIST' => 'RESIST',
                                        'ACC' => 'ACC',
                                    ],
                                    null,
                                    ['class' => 'form-select', 'id' => 'stat22', 'multiple' => 'multiple'],
                                ) }}
                                {{-- <select name="" id="stat22" class="form-select" multiple>
                                    <option value="">ATK%</option>
                                    <option value="">HP%</option>
                                    <option value="">DEF%</option>
                                    <option value="">C. RATE</option>
                                    <option value="">C. DMG</option>
                                    <option value="">SPD</option>
                                    <option value="">RESIST</option>
                                    <option value="">ACC</option>
                                </select> --}}
                            </div>
                            <div class="col d-flex align-items-center flex-column">
                                <label for="stat23" class="form-label ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-headphones" viewBox="0 0 24 24">
                                        <path
                                            d="M22,16v1H4V2H14V12h4A4,4,0,0,1,22,16ZM4,20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V19H4Z" />
                                    </svg>
                                </label>
                                {{ Form::select(
                                    'stats23[]',
                                    [
                                        'ATK%' => 'ATK%',
                                        'HP%' => 'HP%',
                                        'DEF%' => 'DEF%',
                                        'C. RATE' => 'C. RATE',
                                        'C. DMG' => 'C. DMG',
                                        'SPD' => 'SPD',
                                        'RESIST' => 'RESIST',
                                        'ACC' => 'ACC',
                                    ],
                                    null,
                                    ['class' => 'form-select', 'id' => 'stat23', 'multiple' => 'multiple'],
                                ) }}
                                {{-- <select name="" id="stat23" class="form-select" multiple>
                                    <option value="">ATK%</option>
                                    <option value="">HP%</option>
                                    <option value="">DEF%</option>
                                    <option value="">C. RATE</option>
                                    <option value="">C. DMG</option>
                                    <option value="">SPD</option>
                                    <option value="">RESIST</option>
                                    <option value="">ACC</option>
                                </select> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col bg-body-secondary rounded-2 me-3 pt-2">
                        <div class="row m-3">
                            {!! Form::text('adviceName3', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Name 3rd advice...',
                                'aria-label' => 'Name advice',
                            ]) !!}
                            {{-- <input type="text" class="form-control" name="" id=""
                                placeholder="Name 3rd advice..." aria-label="Name advice"> --}}
                        </div>
                        <div class="row m-3">
                            <label for="set-4-advice-3" class="form-label">4 relics</label>
                            {{ Form::select('equipmentSetFour3', $eq_4->pluck('name', 'id'), null, [
                                'class' => 'form-select',
                                'id' => 'set-4-advice-3',
                            ]) }}
                            {{-- <select class="form-select" name="" id="set-4-advice-3">
                                <option value="">War</option>
                                <option value="">Wind</option>
                                <option value="">Thunder</option>
                                <option value="">Nether</option>
                                <option value="">Ocean</option>
                                <option value="">Avatara</option>
                            </select> --}}
                        </div>
                        <div class="row m-3">
                            <label for="set-2-advice-3" class="form-label">2 relics</label>
                            {{ Form::select('equipmentSetTwo3', $eq_2->pluck('name', 'id'), null, [
                                'class' => 'form-select',
                                'id' => 'set-2-advice-3',
                            ]) }}
                            {{-- <select class="form-select" name="" id="set-2-advice-3">
                                <option value="">War</option>
                                <option value="">Wind</option>
                                <option value="">Thunder</option>
                                <option value="">Nether</option>
                                <option value="">Ocean</option>
                                <option value="">Avatara</option>
                            </select> --}}
                        </div>
                        <div class="row m-3">
                            {{ Form::textarea('advice_description3', null, [
                                'class' => 'form-control',
                                'id' => 'advice-description3',
                                'rows' => 3,
                                'placeholder' => 'Describe your advice...',
                            ]) }}
                            {{-- <textarea name="" class="form-control" id="" rows="3" placeholder="Describe your advise..."></textarea> --}}
                        </div>
                        <div class="row m-3">
                            <div class="col d-flex align-items-center flex-column">
                                <label for="stat31" class="form-label ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="currentColor" class="bi bi-headphones" viewBox="0 0 16 16">
                                        <path
                                            d="M8 3a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V8a6 6 0 1 1 12 0v5a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h1V8a5 5 0 0 0-5-5" />
                                    </svg>
                                </label>
                                {{ Form::select(
                                    'stats31[]',
                                    [
                                        'ATK%' => 'ATK%',
                                        'HP%' => 'HP%',
                                        'DEF%' => 'DEF%',
                                        'C. RATE' => 'C. RATE',
                                        'C. DMG' => 'C. DMG',
                                        'SPD' => 'SPD',
                                        'RESIST' => 'RESIST',
                                        'ACC' => 'ACC',
                                    ],
                                    null,
                                    ['class' => 'form-select', 'id' => 'stat31', 'multiple' => 'multiple'],
                                ) }}
                                {{-- <select name="" id="stat31" class="form-select" multiple>
                                    <option value="">ATK%</option>
                                    <option value="">HP%</option>
                                    <option value="">DEF%</option>
                                    <option value="">C. RATE</option>
                                    <option value="">C. DMG</option>
                                    <option value="">SPD</option>
                                    <option value="">RESIST</option>
                                    <option value="">ACC</option>
                                </select> --}}
                            </div>
                            <div class="col d-flex align-items-center flex-column">
                                <label for="stat32" class="form-label ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-headphones" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                    </svg>
                                </label>
                                {{ Form::select(
                                    'stats32[]',
                                    [
                                        'ATK%' => 'ATK%',
                                        'HP%' => 'HP%',
                                        'DEF%' => 'DEF%',
                                        'C. RATE' => 'C. RATE',
                                        'C. DMG' => 'C. DMG',
                                        'SPD' => 'SPD',
                                        'RESIST' => 'RESIST',
                                        'ACC' => 'ACC',
                                    ],
                                    null,
                                    ['class' => 'form-select', 'id' => 'stat32', 'multiple' => 'multiple'],
                                ) }}
                                {{-- <select name="" id="stat32" class="form-select" multiple>
                                    <option value="">ATK%</option>
                                    <option value="">HP%</option>
                                    <option value="">DEF%</option>
                                    <option value="">C. RATE</option>
                                    <option value="">C. DMG</option>
                                    <option value="">SPD</option>
                                    <option value="">RESIST</option>
                                    <option value="">ACC</option>
                                </select> --}}
                            </div>
                            <div class="col d-flex align-items-center flex-column">
                                <label for="stat33" class="form-label ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-headphones" viewBox="0 0 24 24">
                                        <path
                                            d="M22,16v1H4V2H14V12h4A4,4,0,0,1,22,16ZM4,20a2,2,0,0,0,2,2H20a2,2,0,0,0,2-2V19H4Z" />
                                    </svg>
                                </label>
                                {{ Form::select(
                                    'stats33[]',
                                    [
                                        'ATK%' => 'ATK%',
                                        'HP%' => 'HP%',
                                        'DEF%' => 'DEF%',
                                        'C. RATE' => 'C. RATE',
                                        'C. DMG' => 'C. DMG',
                                        'SPD' => 'SPD',
                                        'RESIST' => 'RESIST',
                                        'ACC' => 'ACC',
                                    ],
                                    null,
                                    ['class' => 'form-select', 'id' => 'stat33', 'multiple' => 'multiple'],
                                ) }}
                                {{-- <select name="" id="stat33" class="form-select" multiple>
                                    <option value="">ATK%</option>
                                    <option value="">HP%</option>
                                    <option value="">DEF%</option>
                                    <option value="">C. RATE</option>
                                    <option value="">C. DMG</option>
                                    <option value="">SPD</option>
                                    <option value="">RESIST</option>
                                    <option value="">ACC</option>
                                </select> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h4 class="text-center mt-4">Substat Priority from 1 to 6</h4>
            <div class="col">
                <div class="row">
                    <div class="col">
                        {{ Form::select(
                            'substatPriority1',
                            [
                                '' => 'none',
                                'Flat ATK' => 'Flat ATK',
                                'Flat HP' => 'Flat HP',
                                'Flat DEF' => 'Flat DEF',
                                'ATK%' => 'ATK%',
                                'HP%' => 'HP%',
                                'DEF%' => 'DEF%',
                                'C. RATE' => 'C. RATE',
                                'C. DMG' => 'C. DMG',
                                'SPD' => 'SPD',
                                'RESIST' => 'RESIST',
                                'ACC' => 'ACC',
                            ],
                            null,
                            ['class' => 'form-select', 'id' => 'substatPriority1'],
                        ) }}
                        {{-- <select name="" id="" class="form-select">
                            <option value="">none</option>
                            <option value="">Flat ATK</option>
                            <option value="">Flat HP</option>
                            <option value="">Flat DEF</option>
                            <option value="">ATK%</option>
                            <option value="">HP%</option>
                            <option value="">DEF%</option>
                            <option value="">C. RATE</option>
                            <option value="">C. DMG</option>
                            <option value="">SPD</option>
                            <option value="">RESIST</option>
                            <option value="">ACC</option>
                        </select> --}}
                    </div>
                    <div class="col">
                        {{ Form::select(
                            'substatPriority2',
                            [
                                '' => 'none',
                                'Flat ATK' => 'Flat ATK',
                                'Flat HP' => 'Flat HP',
                                'Flat DEF' => 'Flat DEF',
                                'ATK%' => 'ATK%',
                                'HP%' => 'HP%',
                                'DEF%' => 'DEF%',
                                'C. RATE' => 'C. RATE',
                                'C. DMG' => 'C. DMG',
                                'SPD' => 'SPD',
                                'RESIST' => 'RESIST',
                                'ACC' => 'ACC',
                            ],
                            null,
                            ['class' => 'form-select', 'id' => 'substatPriority2'],
                        ) }}
                        {{-- <select name="" id="" class="form-select">
                            <option value="">none</option>
                            <option value="">Flat ATK</option>
                            <option value="">Flat HP</option>
                            <option value="">Flat DEF</option>
                            <option value="">ATK%</option>
                            <option value="">HP%</option>
                            <option value="">DEF%</option>
                            <option value="">C. RATE</option>
                            <option value="">C. DMG</option>
                            <option value="">SPD</option>
                            <option value="">RESIST</option>
                            <option value="">ACC</option>
                        </select> --}}
                    </div>
                    <div class="col">
                        {{ Form::select(
                            'substatPriority3',
                            [
                                '' => 'none',
                                'Flat ATK' => 'Flat ATK',
                                'Flat HP' => 'Flat HP',
                                'Flat DEF' => 'Flat DEF',
                                'ATK%' => 'ATK%',
                                'HP%' => 'HP%',
                                'DEF%' => 'DEF%',
                                'C. RATE' => 'C. RATE',
                                'C. DMG' => 'C. DMG',
                                'SPD' => 'SPD',
                                'RESIST' => 'RESIST',
                                'ACC' => 'ACC',
                            ],
                            null,
                            ['class' => 'form-select', 'id' => 'substatPriority3'],
                        ) }}
                        {{-- <select name="" id="" class="form-select">
                            <option value="">none</option>
                            <option value="">Flat ATK</option>
                            <option value="">Flat HP</option>
                            <option value="">Flat DEF</option>
                            <option value="">ATK%</option>
                            <option value="">HP%</option>
                            <option value="">DEF%</option>
                            <option value="">C. RATE</option>
                            <option value="">C. DMG</option>
                            <option value="">SPD</option>
                            <option value="">RESIST</option>
                            <option value="">ACC</option>
                        </select> --}}
                    </div>
                    <div class="col">
                        {{ Form::select(
                            'substatPriority4',
                            [
                                '' => 'none',
                                'Flat ATK' => 'Flat ATK',
                                'Flat HP' => 'Flat HP',
                                'Flat DEF' => 'Flat DEF',
                                'ATK%' => 'ATK%',
                                'HP%' => 'HP%',
                                'DEF%' => 'DEF%',
                                'C. RATE' => 'C. RATE',
                                'C. DMG' => 'C. DMG',
                                'SPD' => 'SPD',
                                'RESIST' => 'RESIST',
                                'ACC' => 'ACC',
                            ],
                            null,
                            ['class' => 'form-select', 'id' => 'substatPriority4'],
                        ) }}
                        {{-- <select name="" id="" class="form-select">
                            <option value="">none</option>
                            <option value="">Flat ATK</option>
                            <option value="">Flat HP</option>
                            <option value="">Flat DEF</option>
                            <option value="">ATK%</option>
                            <option value="">HP%</option>
                            <option value="">DEF%</option>
                            <option value="">C. RATE</option>
                            <option value="">C. DMG</option>
                            <option value="">SPD</option>
                            <option value="">RESIST</option>
                            <option value="">ACC</option>
                        </select> --}}
                    </div>
                    <div class="col">
                        {{ Form::select(
                            'substatPriority5',
                            [
                                '' => 'none',
                                'Flat ATK' => 'Flat ATK',
                                'Flat HP' => 'Flat HP',
                                'Flat DEF' => 'Flat DEF',
                                'ATK%' => 'ATK%',
                                'HP%' => 'HP%',
                                'DEF%' => 'DEF%',
                                'C. RATE' => 'C. RATE',
                                'C. DMG' => 'C. DMG',
                                'SPD' => 'SPD',
                                'RESIST' => 'RESIST',
                                'ACC' => 'ACC',
                            ],
                            null,
                            ['class' => 'form-select', 'id' => 'substatPriority5'],
                        ) }}
                        {{-- <select name="" id="" class="form-select">
                            <option value="">none</option>
                            <option value="">Flat ATK</option>
                            <option value="">Flat HP</option>
                            <option value="">Flat DEF</option>
                            <option value="">ATK%</option>
                            <option value="">HP%</option>
                            <option value="">DEF%</option>
                            <option value="">C. RATE</option>
                            <option value="">C. DMG</option>
                            <option value="">SPD</option>
                            <option value="">RESIST</option>
                            <option value="">ACC</option>
                        </select> --}}
                    </div>
                    <div class="col">
                        {{ Form::select(
                            'substatPriority6',
                            [
                                '' => 'none',
                                'Flat ATK' => 'Flat ATK',
                                'Flat HP' => 'Flat HP',
                                'Flat DEF' => 'Flat DEF',
                                'ATK%' => 'ATK%',
                                'HP%' => 'HP%',
                                'DEF%' => 'DEF%',
                                'C. RATE' => 'C. RATE',
                                'C. DMG' => 'C. DMG',
                                'SPD' => 'SPD',
                                'RESIST' => 'RESIST',
                                'ACC' => 'ACC',
                            ],
                            null,
                            ['class' => 'form-select', 'id' => 'substatPriority6'],
                        ) }}
                        {{-- <select name="" id="" class="form-select">
                            <option value="">none</option>
                            <option value="">Flat ATK</option>
                            <option value="">Flat HP</option>
                            <option value="">Flat DEF</option>
                            <option value="">ATK%</option>
                            <option value="">HP%</option>
                            <option value="">DEF%</option>
                            <option value="">C. RATE</option>
                            <option value="">C. DMG</option>
                            <option value="">SPD</option>
                            <option value="">RESIST</option>
                            <option value="">ACC</option>
                        </select> --}}
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <h4 class="text-center mt-2">Images</h4>
            <div class="col">
                <div class="container d-flex flex-md-column align-items-center">
                    <svg class="bd-placeholder-img card-img-top" width="20rem" height="18rem"
                        xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice"
                        focusable="false" id="placeholder-image-1">
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em"></text>
                    </svg>
                    <img src="" alt="" id="script2Preview" class="img-thumbnail d-none"
                        style="max-width: 20rem; object-fit: contain; height: 18rem;">
                    <label for="sprite2Image" class="form-label mt-2">2nd Script Image</label>
                    {{ Form::file('sprite2Image', [
                        'id' => 'sprite2Image',
                        'class' => 'form-control',
                        'onchange' => 'Scriptpreview()',
                        'accept' => 'image/gif, image/jpeg, image/png, image/webp, image/svg+xml',
                    ]) }}
                    {{-- <input type="file" id="sprite2Image" class="form-control" onchange="Scriptpreview()"
                        accept="image/gif, image/jpeg, image/png, image/webp, image/svg+xml"> --}}
                </div>
            </div>
            <div class="col">
                <div class="container d-flex flex-md-column align-items-center">
                    <svg class="bd-placeholder-img card-img-top" width="20rem" height="18rem"
                        xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice"
                        focusable="false" id="placeholder-image-2">
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em"></text>
                    </svg>
                    <img src="" alt="" id="iconPreview" class="img-thumbnail d-none"
                        style="max-width: 20rem; object-fit: contain; height: 18rem;">
                    <label for="iconImage" class="form-label mt-2">Icon</label>
                    {{ Form::file('iconImage', [
                        'id' => 'iconImage',
                        'class' => 'form-control',
                        'onchange' => 'IconPreview()',
                        'accept' => 'image/gif, image/jpeg, image/png, image/webp, image/svg+xml',
                    ]) }}
                    {{-- <input type="file" id="iconImage" class="form-control" onchange="IconPreview()"
                        accept="image/gif, image/jpeg, image/png, image/webp"> --}}
                </div>
            </div>
            <div class="col">
                <div class="container d-flex flex-md-column align-items-center">
                    <svg class="bd-placeholder-img card-img-top" width="20rem" height="18rem"
                        xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice"
                        focusable="false" id="placeholder-image-3">
                        <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                            dy=".3em"></text>
                    </svg>
                    <img src="" alt="" id="resonancePreview" class="img-thumbnail d-none"
                        style="max-width: 20rem; object-fit: contain; height: 18rem;">
                    <label for="resonanceImage" class="form-label mt-2">Full Resonance Art</label>
                    {{ Form::file('resonanceImage', [
                        'id' => 'resonanceImage',
                        'class' => 'form-control',
                        'onchange' => 'ResonancePreview()',
                        'accept' => 'image/gif, image/jpeg, image/png, image/webp, image/svg+xml',
                    ]) }}
                    {{-- <input type="file" id="resonanceImage" class="form-control" onchange="ResonancePreview()"
                        accept="image/gif, image/jpeg, image/png, image/webp"> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                {!! Form::submit('Add', ['class' => 'btn btn-primary mt-3 w-100']) !!}
                {{-- <input type="submit" value="Add" class="btn btn-primary mt-3 w-100"> --}}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function preview() {
                var placeholder = document.getElementById("placeholder-image");
                if (placeholder.style.display != "none") {
                    placeholder.style.display = "none"
                }
                var mainImagePreview = document.getElementById("mainImagePreview");
                mainImagePreview.classList.remove('d-none');
                mainImagePreview.src = URL.createObjectURL(event.target.files[0]);
            }

            function Scriptpreview() {
                var placeholder = document.getElementById("placeholder-image-1");
                if (placeholder.style.display != "none") {
                    placeholder.style.display = "none"
                }
                var mainImagePreview = document.getElementById("script2Preview");
                mainImagePreview.classList.remove('d-none');
                mainImagePreview.src = URL.createObjectURL(event.target.files[0]);
            }

            function IconPreview() {
                var placeholder = document.getElementById("placeholder-image-2");
                if (placeholder.style.display != "none") {
                    placeholder.style.display = "none"
                }
                var mainImagePreview = document.getElementById("iconPreview");
                mainImagePreview.classList.remove('d-none');
                mainImagePreview.src = URL.createObjectURL(event.target.files[0]);
            }

            function ResonancePreview() {
                var placeholder = document.getElementById("placeholder-image-3");
                if (placeholder.style.display != "none") {
                    placeholder.style.display = "none"
                }
                var mainImagePreview = document.getElementById("resonancePreview");
                mainImagePreview.classList.remove('d-none');
                mainImagePreview.src = URL.createObjectURL(event.target.files[0]);
            }

            document.getElementById("mainImage").onchange = function() {
                preview();
            };

            document.getElementById("sprite2Image").onchange = function() {
                Scriptpreview();
            };
            document.getElementById("iconImage").onchange = function() {
                IconPreview();
            };
            document.getElementById("resonanceImage").onchange = function() {
                ResonancePreview();
            };
        });
    </script>
@endsection
