@extends('components.admins.menu', ['active' => 'users'])
@section('title', 'Users')
@section('content')
    <div class=" d-flex flex-column flex-shrink-1 container py-4 h-100 bg-white">
        <h1 class="display-4 text-center">Users</h1>
        <hr>
        @if (!empty($users))
            <div class="container mt-2 ">
                <div class="row row-cols-3 row-cols-md-2 row-gap-4">
                    <table class="table">
                        <thead>

                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Login</th>
                                <th scope="col">Email</th>
                                <th scope="col">Name + Surname</th>
                                <th scope="col">Action</th>
                                {{-- <th scope="col"></th>
                                <th scope="col"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $user->login }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->name . ' ' . $user->surname }}</td>
                                    <td>
                                        <a href="{{ route('users.show', ['user' => $user->id]) }}"
                                            class="btn btn-sm btn-outline-secondary">View</a>



                                    </td>
                                    {{-- <td>
                                        <a href="
                                        {{ route('users.edit', ['user' => $user->id]) }}"
                                            class="btn btn-sm btn-outline-secondary">Edit</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>


            </div>
        @else
            <div>No users found.</div>
        @endif

    </div>
@endsection
