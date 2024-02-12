@extends('components.admins.menu', ['active' => 'espers'])

@section('title', 'Espers')


@section('content')
    <a href="{{ route('espers.create') }}" class="link z-3">
        <img src="{{ URL::to('/') }}/images/admin/add.svg" alt=""
            style="position: fixed; right: 25px; bottom: 25px; ">

    </a>
    <h1 class="display-4 text-center">Espers</h1>
    <hr>
    <form method="GET" action="{{ route('search') }}">
        <div class="d-flex w-50 mx-auto p-2">
            <div class="input-group flex-nowrap  mx-auto p-2">
                <img class="input-group-text" id="search-wrapping" src="{{ URL::to('/') }}/images/admin/search.svg"
                    alt="">
                <input type="text" name="name" class="form-control" placeholder="Search" aria-label="Search"
                    aria-describedby="search-wrapping">
            </div>
            <button type="submit" class="btn btn-outline-primary h-50 mt-2">Find</button>
        </div>
    </form>

    @if (!empty($espers) && count($espers) > 0)
        <div class="container mt-2 ">
            <div class="row row-cols-4 row-cols-md-4 row-gap-4">
                @foreach ($espers as $esper)
                    <div class="col" style="min-width: 10rem;">
                        <div class="card shadow-sm">
                            <img class="card-img-top mt-2" style="object-fit: contain;" height="225"
                                src="{{ url($esper->sprite1->path) }}" alt="Gabrielle">
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

                                    <a href="">
                                        <form id="deleteForm_{{ $esper->id }}"
                                            action="{{ route('espers.destroy', $esper->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff102f"
                                            class="bi bi-trash3" viewBox="0 0 16 16"
                                            onclick="submitDeleteForm({{ $esper->id }})">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach


            </div>


        </div>
    @else
        <div>No espers right now!</div>
    @endif
@stop
@section('scripts')
    <script>
        function submitDeleteForm(elementId) {
            event.preventDefault();
            document.getElementById('deleteForm_' + elementId).submit();
        }
    </script>
@endsection
