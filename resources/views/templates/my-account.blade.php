@extends('layouts.html_layout')

@section('body')

@if($errors->any())
    <div class="container">
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
    </div>
@endif

<div class="container myaccount-container mt-5 pb-4">
    <div class="row">
        <div class="col-lg-4 myaccount-row text-center">
            <div class="user-avatar">
                <form action="{{ route('myaccount.updateAvatar',['userID' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="avatar" id="myaccount-avatar-input" hidden required>
                <img id="myaccount-avatar" src="{{ asset($user->profile->avatar) }}">

                    <div class="form-row d-none mt-4 pb-2 text-center form-actions">
                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                        <button id="close-btn" class="btn btn-sm btn-secondary">Close</button>
                    </div>
                </form>
            </div>
            <div class="mt-3">
                <h2>{{ $user->username }}</h2>
            </div>
            <div>
                <h6>{{ $user->profile->about }}</h6>
            </div>
            <div class="mt-3">
               <p>Joined : {{  $user->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <div class="col-lg-7 offset-lg-1 mt-5 mt-lg-0 myaccount-row text-center">
            <div>
                <h5>Account Details</h5>
            </div>
            <div class="mt-2">
                <table class="table table-borderless text-left">
                    <tbody>
                        <tr>
                            <td>Full Name</td>
                            <td>:</td>
                            <td>{{ $user->profile->full_name }}</td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Facebook Profile</td>
                            <td>:</td>
                            <td>{{ $user->profile->facebook }}</td>
                        </tr>
                        <tr>
                            <td>Twitter Profile</td>
                            <td>:</td>
                            <td>{{ $user->profile->twitter }}</td>
                        </tr>
                        <tr>
                            <td>Instagram Profile</td>
                            <td>:</td>
                            <td>{{ $user->profile->instagram }}</td>
                        </tr>
                        <tr>
                            <td>Reddit Profile</td>
                            <td>:</td>
                            <td>{{ $user->profile->reddit }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <button class="btn btn-sm btn-warning" id="account-edit">Edit</button>
                <button class="btn btn-sm btn-danger" id="change-password">Change Password</button>
            </div>
        </div>

    </div>
</div>


<!-- Change Account Details Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Change Account Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('myaccount.update',['id' => $user->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name <span class="required-icon">*</span></label>
                <input type="text" name="full_name" value="{{ $user->profile->full_name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="about">About <span class="required-icon">*</span></label>
                <input type="text" name="about" value="{{ $user->profile->about }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email <span class="required-icon">*</span></label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="facebook">Facebook Profile</label>
                <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="twitter">Twitter Profile</label>
                <input type="text" name="twitter" value="{{ $user->profile->twitter }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="instagram">Instagram Profile</label>
                <input type="text" name="instagram" value="{{ $user->profile->instagram }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="reddit">Reddit Profile</label>
                <input type="text" name="reddit" value="{{ $user->profile->reddit }}" class="form-control">
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePasswordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('myaccount.updatePassword',['id' => $user->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="text" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="text" name="password_confirmation" class="form-control" required>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
