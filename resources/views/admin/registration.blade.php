@extends('components.admins.loginpage')
@section('title', 'Sign In')
@section('content')
    <div class="col-3 bg-light rounded-3 p-4 shadow-lg">
        <h4 class="display-6 text-center">Sign In</h4>
        <hr>
        {!! Form::open(['route' => ['addUser']]) !!}
        @csrf
        <div class="row g-3">
            <div class="col-12">
                {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Login']) !!}
            </div>

            <div class="col-12">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            </div>

            <div class="col-12">
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
            </div>

            <div class="col-md-6">
                {!! Form::label('name', 'First Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'John']) !!}
            </div>

            <div class="col-md-6">
                {!! Form::label('last_name', 'Last Name') !!}
                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Doe']) !!}
            </div>

            <hr>

            <div class="col-12">
                {!! Form::submit('Sign In', ['class' => 'btn btn-outline-danger w-100']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
