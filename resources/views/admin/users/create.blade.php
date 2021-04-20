@extends('admin.inc.html_layout')

@section('content')

<div class="row page users-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Create New User</h2>
            </div>
        </div>

        @if($errors->any())
            <div class="row mt-3">
                <div class="col">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="row mt-5">
            <div class="col">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                                <div class="col">
                                    <label for="email">Email Address <span class="required-icon">*</span></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="fname">First Name <span class="required-icon">*</span></label>
                                <input type="text" name="fname" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="lname">Last Name <span class="required-icon">*</span></label>
                                <input type="text" name="lname" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="username">Userame <span class="required-icon">*</span></label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="password">Password <span class="required-icon">*</span></label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about">About</label>
                        <input type="text" name="about" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-blue" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>

@endsection
