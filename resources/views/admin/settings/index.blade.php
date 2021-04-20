@extends('admin.inc.html_layout')

@section('content')

<div class="row page post-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Manage Settings</h2>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="site_name">Site Name</label>
                        <input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Site Description</label>
                        <input type="text" name="description" value="{{ $settings->description }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Keywords <small>( Seperate From Comma )</small></label>
                        <input type="text" name="keywords" value="{{ $settings->keywords }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="logo">logo</label>
                        <input type="file" name="logo" id="setting-logo" class="form-control">
                        <div class="mt-2">
                            <img src="{{ asset($settings->logo) }}" class="img-thumbnail" id="preview-img" alt="logo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" value="{{ $settings->email }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" name="facebook" value="{{ $settings->facebook }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input type="text" name="twitter" value="{{ $settings->twitter }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" name="instagram" value="{{ $settings->instagram }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="reddit">Reddit</label>
                        <input type="text" name="reddit" value="{{ $settings->reddit }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input type="checkbox" name="guest_likes" id="guest-like" value="1" class="form-check-input">
                                    <label for="guest-like">Enable Guest Users Like</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input type="checkbox" name="guest_comments" id="guest-comments" value="1" class="form-check-input">
                                    <label for="guest-comments">Enable Guest Users Comments</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-blue" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>


    </div> <!-- Main col end -->
</div>


@endsection
