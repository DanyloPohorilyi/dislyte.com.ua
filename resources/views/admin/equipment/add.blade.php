@extends('components.admins.menu', ['active' => 'equipment'])
@section('title', 'Add equipment')
@section('content')
    <div class=" d-flex flex-column flex-shrink-1 container py-4 h-100 bg-white">
        <h1 class="display-6 mb-3">New Equipment</h1>
        <hr>
        {!! Form::open(['route' => ['equipment.store'], 'enctype' => 'multipart/form-data']) !!}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                    <label for="image" class="form-label mt-2">Image</label>
                    {!! Form::file('image', [
                        'id' => 'image',
                        'class' => 'form-control',
                        'onchange' => 'preview()',
                        'accept' => 'image/jpeg, image/png, image/webp, image/svg+xml',
                    ]) !!}
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <div class="col">
                <div class="row">
                    <div class="col">
                        {!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name', 'aria-label' => 'Name']) !!}
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
                <div class="row pt-2">
                    <div class="col">
                        <label for="rarity" class="form-label">Set of Relics</label>
                        {!! Form::select('numbers_sets', ['2' => '2', '4' => '4'], null, ['class' => 'form-select', 'id' => 'rarity']) !!}
                        @error('numbers_sets')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                </div>
                <div class="row pt-2">
                    <div class="col">
                        <label for="short-descriprtion" class="form-label">Description</label>
                        {!! Form::textarea('description', null, [
                            'class' => 'form-control',
                            'id' => 'short-description',
                            'rows' => 8,
                            'maxlength' => 460,
                        ]) !!}
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>


            </div>

        </div>

        <div class="row">
            <div class="container-fluid">
                <input type="submit" value="Add" class="btn btn-primary mt-3 w-100">
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
            document.getElementById("image").onchange = function() {
                preview();
            };
        });
    </script>
@endsection
