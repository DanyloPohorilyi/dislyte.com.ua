@extends('components.admins.menu', ['active' => 'elements'])

@section('title', 'Elements')


@section('content')
    <a href="{{ route('elements.create') }}" class="link z-3">
        <img src="{{ URL::to('/') }}/images/admin/add.svg" alt=""
            style="position: fixed; right: 25px; bottom: 25px; ">

    </a>
    <h1 class="display-4 text-center">Elements</h1>
    <hr>
    @if (!empty($message))
        <div>{{ $message }}</div>
    @endif
    <div class="container mt-2 ">
        <div class="row row-cols-3 row-cols-md-2 row-gap-4">
            @if (count($elements) > 0)
                <?php
                foreach ($elements as $element) {
                    ?>
                <div class="col" style="min-width: 10rem;">
                    <div class="card shadow-sm">
                        <img class="card-img-top mt-2" style="object-fit: contain;" height="100"
                            src="{{ url($element->image->path) }}" alt="{{ $element->image->alt }}">
                        <div class="card-body">
                            <hr>
                            <h6>{{ $element->name }}</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('elements.edit', ['element' => $element->id]) }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </a>
                                </div>

                                <a href="">
                                    <form id="deleteForm_{{ $element->id }}"
                                        action="{{ route('elements.destroy', $element->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff102f"
                                        class="bi bi-trash3" viewBox="0 0 16 16"
                                        onclick="submitDeleteForm({{ $element->id }})">
                                        <path
                                            d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                    </svg>

                                </a>

                            </div>
                        </div>
                    </div>

                </div>
                <?php
        }
                ?>
            @else
                <div>No elements found.</div>
            @endif
        </div>

    </div>
@stop
@section('scripts')
    <script>
        function submitDeleteForm(elementId) {
            event.preventDefault();
            document.getElementById('deleteForm_' + elementId).submit();
        }
    </script>
@endsection
