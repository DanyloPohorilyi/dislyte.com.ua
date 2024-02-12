@extends('components.admins.loginpage')
@section('title', 'Log In')
@section('content')
    <div class="col-3 bg-light rounded-3 p-4 shadow-lg">
        <h4 class="display-6 text-center">Log In</h4>
        <hr>
        {!! Form::open(['route' => ['checkUser']]) !!}
        @csrf
        <div class="row g-3">
            <div class="col-12">
                {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => 'Login']) !!}
            </div>

            <div class="col-12">
                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
            </div>

            <div class="col-12">
                <a href="{{ route('signIn') }}">You don't have an account?</a>
            </div>

            <hr>

            <div class="col-12">
                {!! Form::submit('Log In', ['class' => 'btn btn-outline-danger w-100']) !!}
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
