@extends('components.admins.menu', ['active' => 'elements'])
@section('title', 'Add Element')
@section('content')
    <h1 class="display-4 text-center">Edit {{ $element->name }}</h1>
    <hr>
    <div class="container mt-2 ">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-5 bg-body-secondary p-4 rounded-2">
                {!! Form::open([
                    'method' => 'PATCH',
                    'route' => ['elements.update', $element->id],
                    'enctype' => 'multipart/form-data',
                ]) !!}

                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col">
                        <div class="container d-flex flex-md-column align-items-center">
                            {{-- <svg class="bd-placeholder-img card-img-top" width="10rem" height="9rem"
                                xmlns="http://www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice"
                                focusable="false" id="placeholder-image">
                                <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%"
                                    fill="#eceeef" dy=".3em"></text>
                            </svg> --}}
                            <img src="{{ url($element->image->path) }}" alt="{{ $element->image->alt }}" id="imagePreview"
                                class="img-thumbnail" style="max-width: 10rem; object-fit: contain; height: 9rem;">
                            <label for="iconImage" class="form-label mt-2">Icon</label>

                            {{-- <input name="icon" type="file" id="iconImage" class="form-control"
                                onchange="imagePreview()" accept="image/*"> --}}
                            {!! Form::file('icon', [
                                'id' => 'iconImage',
                                'class' => 'form-control',
                                'onchange' => 'imagePreview()',
                                'accept' => 'image/*',
                            ]) !!}
                            @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col text-center">
                        <label for="text-input" class="form-label">Name</label>
                        {!! Form::text('name', $element->name, ['id' => 'text-input', 'class' => 'form-control']) !!}
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        {{-- <input type="text" name="" id="text-input" class="form-control"> --}}
                    </div>
                </div>
                <div class="row mt-4">
                    <input type="submit" value="Save" class="btn btn-primary col-4 offset-sm-4">
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function imagePreview() {
                var mainImagePreview = document.getElementById("imagePreview");
                mainImagePreview.src = URL.createObjectURL(event.target.files[0]);
            }

            document.getElementById("iconImage").onchange = function() {
                imagePreview();
            };
        });
    </script>
@endsection
