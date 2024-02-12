@extends('components.admins.menu', ['active' => 'admins'])
@section('title', 'Admins')
@section('content')
    <a href="{{ route('managers.create') }}" class="link z-3">
        <img src="{{ URL::to('/') }}/images/admin/add.svg" alt=""
            style="position: fixed; right: 25px; bottom: 25px; ">

    </a>
    <div class=" d-flex flex-column flex-shrink-1 container py-4 h-100 bg-white">
        <h1 class="display-4 text-center">Admins</h1>
        <hr>
        <div class="container mt-2 ">
            <div class="row row-cols-3 row-cols-md-2 row-gap-4">
                @if (!empty($managers))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Admin URL</th>
                                <th scope="col">Access level</th>
                                <th scope="col">Permits</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($managers as $manager)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><a
                                            href="{{ route('users.show', ['user' => $manager->user->id]) }}">{{ $manager->user->login }}</a>
                                    </td>
                                    <td>{{ $manager->access_level }}</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1" disabled {{ $manager->can_create ? 'checked' : '' }} />
                                            <label class="form-check-label" for="inlineCheckbox1">Creating</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2" disabled {{ $manager->can_edit ? 'checked' : '' }} />
                                            <label class="form-check-label" for="inlineCheckbox2">Editing</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option3" disabled {{ $manager->can_delete ? 'checked' : '' }} />
                                            <label class="form-check-label" for="inlineCheckbox3">Deleting</label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('managers.edit', ['manager' => $manager->id]) }}"
                                            class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </td>
                                    <td>

                                        <form action="{{ route('managers.destroy', ['manager' => $manager->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>


                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                @else
                    <div>No admins here...</div>
                @endif

            </div>


        </div>
    </div>
@endsection
