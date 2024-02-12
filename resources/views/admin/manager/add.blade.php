@extends('components.admins.menu', ['active' => 'admins'])
@section('title', 'Add admin')
@section('content')
    <div class=" d-flex flex-column flex-shrink-1 container py-4 h-100 bg-white">
        <h1 class="display-6 mb-3">New Admin</h1>
        <hr>
        {!! Form::open(['route' => ['managers.store'], 'enctype' => 'multipart/form-data']) !!}
        <div class="row">

            <div class="col">

                <div class="col pb-3">
                    <label for="role" class="form-label">Select Admin</label>
                    {!! Form::select('users', $users->pluck('login', 'id'), null, ['class' => 'ui search dropdown form-select']) !!}


                </div>
                <div class="col">
                    <label for="role" class="form-label">Access Level</label>
                    {{ Form::select(
                        'role',
                        [
                            'owner' => 'Owner',
                            'manager' => 'Manager',
                            'admin' => 'Admin',
                        ],
                        null,
                        [
                            'class' => 'form-select',
                            'id' => 'role',
                        ],
                    ) }}

                </div>

            </div>

        </div>
        <div class="row mt-3 d-flex">
            <div class="col">
                {{ Form::checkbox('creating', 'option1', null, ['class' => 'form-check-input', 'id' => 'inlineCheckbox1']) }}
                {{ Form::label('inlineCheckbox1', 'Creating', ['class' => 'form-check-label']) }}
            </div>
            <div class="col">
                {{ Form::checkbox('editing', 'option2', null, ['class' => 'form-check-input', 'id' => 'inlineCheckbox2']) }}
                {{ Form::label('inlineCheckbox2', 'Editing', ['class' => 'form-check-label']) }}</div>
            <div class="col">
                {{ Form::checkbox('deleting', 'option3', null, ['class' => 'form-check-input', 'id' => 'inlineCheckbox3']) }}
                {{ Form::label('inlineCheckbox3', 'Deleting', ['class' => 'form-check-label']) }}</div>

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
        $('.ui.dropdown').dropdown();
    </script>
@endsection
