@extends('components.admins.menu', ['active' => 'home'])
@section('title', 'Dashboard')
@section('content')
    <h1>Dashboard</h1>
    <hr>
    <h2>Main activity</h2>
    <div class="container-sm">
        <div class="row d-flex gap-4 ">
            <div class="card text center col">
                <div class="card-body text-center">
                    <img class="pt-2" src="{{ URL::to('/') }}/images/admin/users.svg" alt="Users">
                    <h6 class="text-secondary pt-2">Users</h6>
                    <h4 class="text-primary fw-bolder">{{ $user_count }}</h4>
                </div>
            </div>
            <div class="card text center col">
                <div class="card-body text-center">
                    <img class="pt-2" src="{{ URL::to('/') }}/images/admin/eye.svg" alt="Visitors">
                    <h6 class="text-secondary pt-2">Visitors</h6>
                    <h4 class="text-primary fw-bolder">0</h4>
                </div>
            </div>
            <div class="card text center col">
                <div class="card-body text-center">
                    <img class="pt-2" src="{{ URL::to('/') }}/images/admin/comment.svg" alt="Comments">
                    <h6 class="text-secondary pt-2">Comments</h6>
                    <h4 class="text-primary fw-bolder">0</h4>
                </div>
            </div>
            <div class="card text center col bg-primary text-light">
                <div class="card-body text-center">
                    <img class="pt-2" src="{{ URL::to('/') }}/images/admin/thunder.svg" alt="Espers">
                    <h6 class="text-light pt-2">Espers</h6>
                    <h4 class="text-white fw-bolder">{{ $esper_count }}</h4>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="d-inline-flex">
        <a href="{{ route('espers.index') }}" class="link d-inline-flex link-dark">
            <h2 class="">Espers</h2>
            <img class="h-100 " src="{{ URL::to('/') }}/images/admin/aroow-right-short.svg" alt="">
        </a>

    </div>
    <div class="container mt-2">
        <div class="row overflow-x-scroll flex-nowrap row-cols-4 row-cols-md-4">
            @foreach ($espers as $esper)
                <div class="col" style="min-width: 10rem;">
                    <div class="card shadow-sm">
                        <img class="card-img-top mt-2" style="object-fit: contain;" height="225"
                            src="{{ url($esper->sprite1->path) }}" alt="{{ $esper->sprite1->alt }}">
                        <div class="card-body">
                            <hr>
                            <h6>{{ $esper->name }} ({{ $esper->god }})</h6>
                            <p>
                                <span class="badge bg-primary">{{ ucfirst($esper->role) }}</span>
                                <span class="badge bg-warning">{{ ucfirst($esper->rarity) }}</span>
                                <span class="badge bg-secondary">{{ $esper->element->name }}</span>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('espers.show', ['esper' => $esper->id]) }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        View
                                    </a>
                                    <a href="{{ route('espers.edit', ['esper' => $esper->id]) }}"
                                        class="btn btn-sm btn-outline-secondary">
                                        Edit
                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>


    </div>
@endsection
