@extends('admin.inc.html_layout')

@section('content')

<div class="row page users-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Manage All Users</h2>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <a href="{{ route('user.create') }}" class="btn btn-success float-right">Create New User</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col users-table">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Edit / Delete</th>
                            <th>Make An Admin</th>
                        </tr>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td> {{ $user->id }} </td>
                                    <td>
                                        <img class="user-avatar" src="{{ asset($user->profile->avatar) }}" alt="Avatar">
                                    </td>
                                    <td> {{ $user->name }} </td>
                                    <td> {{ $user->email }} </td>

                                    <td class="action-btn-div">
                                        <a href="{{ route('user.edit',['user' => $user->id]) }}" class="d-inline">
                                            <svg class="edit" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a>
                                        <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST" class="user-delete d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn" type="submit">
                                                <svg class="delete" style="pointer-events:none;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        @if($user->admin)
                                            <form action="{{ route('user.permission',['id' => $user->id,'access' => 'user' ]) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button class="btn btn-warning btn-sm" type="submit">Make User</button>
                                            </form>
                                        @else
                                            <form action="{{ route('user.permission',['id' => $user->id,'access' => 'admin' ]) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button class="btn btn-danger btn-sm" type="submit">Make Admin</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col pagination-div text-center">
                {{ $users->links() }}
            </div>
        </div>

    </div>
</div>


@endsection
