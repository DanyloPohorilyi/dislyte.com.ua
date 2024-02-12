@extends('components.admins.menu', ['active' => 'users'])
@section('title', 'User')
@section('content')
    <div class=" d-flex flex-column flex-shrink-1 container py-4 h-100 bg-white">
        <h1 class="display-6 mb-3">User {{ $user->name }}</h1>
        <hr>
        {!! Form::open([
            'method' => 'PATCH',
            'route' => ['users.update', $user->id],
            'enctype' => 'multipart/form-data',
        ]) !!}
        <div class="row">
            <div class="col-4">
                <div class="container d-flex flex-md-column align-items-center">
                    @if ($user->image != null)
                        <img src="{{ url($user->image->path) }}" alt="" id="mainImagePreview" class="img-thumbnail"
                            style="max-width: 20rem; object-fit: contain; height: 18rem;">
                    @else
                        <svg class="bd-placeholder-img card-img-top" width="15rem" height="15rem"
                            xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                            preserveAspectRatio="xMidYMid slice" focusable="false" id="placeholder-image">
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em"></text>
                        </svg>
                        <img src="" alt="" id="mainImagePreview" class="img-thumbnail d-none"
                            style="max-width: 20rem; object-fit: contain; height: 18rem;">
                    @endif

                    <label for="mainImage" class="form-label mt-2">Image</label>
                    {!! Form::file('mainImage', [
                        'id' => 'mainImage',
                        'class' => 'form-control',
                        'onchange' => 'preview()',
                        'accept' => 'image/gif, image/jpeg, image/png, image/webp',
                        'disabled' => $readonly,
                    ]) !!}
                </div>

            </div>
            <div class="col">
                <div class="row pt-2 pb-3">
                    <div class="col">
                        {!! Form::text('login', $user->login, [
                            'class' => 'form-control',
                            'placeholder' => 'Login',
                            'aria-label' => 'Login',
                            'readonly' => $readonly,
                        ]) !!}

                    </div>

                </div>
                <div class="row pt-3 pb-3">
                    <div class="col">
                        {!! Form::text('name', $user->name, [
                            'class' => 'form-control',
                            'placeholder' => 'Name',
                            'aria-label' => 'Name',
                            'readonly' => $readonly,
                        ]) !!}

                    </div>
                    <div class="col">
                        {!! Form::text('surname', $user->surname, [
                            'class' => 'form-control',
                            'placeholder' => 'Surname',
                            'aria-label' => 'Surname',
                            'readonly' => $readonly,
                        ]) !!}

                    </div>
                </div>
                <div class="row pt-2">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        {!! Form::email('email', $user->email, [
                            'class' => 'form-control',
                            'id' => 'exampleInputEmail1',
                            'aria-describedby' => 'emailHelp',
                            'placeholder' => 'email@website.com',
                            'aria-label' => 'Email',
                            'readonly' => $readonly,
                        ]) !!}

                    </div>
                </div>

            </div>

        </div>

        <div class="row">
            <div class="container-fluid">
                @if ($readonly)
                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-3 w-100">Back</a>
                @else
                    <input type="submit" value="Add" class="btn btn-primary mt-3 w-100">
                @endif
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
