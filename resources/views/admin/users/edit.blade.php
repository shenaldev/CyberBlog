@extends('admin.inc.html_layout')

@section('content')

<div class="row page users-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Edit User {{ $user->username }}</h2>
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
                <form action="{{ route('user.update',['user' => $user->id ]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">
                                    <label for="avatar">Avatar</label>
                                    <input type="file" id="input-avatar" name="avatar" class="form-control">
                                    <div class="mt-2">
                                        <img src="{{ asset($user->profile->avatar) }}" class="img-thumbnail" id="preview-img" alt="avatar">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="email">Email Address <span class="required-icon">*</span></label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <label for="fname">First Name <span class="required-icon">*</span></label>
                                <input type="text" name="fname" value="{{ $user->profile->fname() }}" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="lname">Last Name <span class="required-icon">*</span></label>
                                <input type="text" name="lname" value="{{ $user->profile->lname() }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="username">Userame <span class="required-icon">*</span></label>
                                <input type="text" name="username" value="{{ $user->username }}" class="form-control" required>
                            </div>
                            <div class="col">
                                <label for="password">New Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about">About <span class="required-icon">*</span></label>
                        <input type="text" name="about" value="{{ $user->profile->about }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
                            </div>
                            <div class="col">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" value="{{ $user->profile->twitter }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" value="{{ $user->profile->instagram }}" class="form-control">
                            </div>
                            <div class="col">
                                <label for="reddit">Reddit</label>
                                <input type="text" name="reddit" value="{{ $user->profile->reddit }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-blue" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


@endsection
