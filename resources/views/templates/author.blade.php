@extends('layouts.html_layout')

@section('body')

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
                <h5>{{ $user->profile->about }}</h5>
            </div>
            <div class="mt-3">
                <table class="table table-borderless author-counts-table">
                    <tbody class="text-left">
                        <tr>
                            <td>Total Posts</td>
                            <td>{{ $user->posts->count() }}</td>
                        </tr>
                        <tr>
                            <td>Total Likes</td>
                            <td>{{ $user->votes->count() }}</td>
                        </tr>
                        <tr>
                            <td>Joined</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-7 offset-lg-1 mt-5 mt-lg-0 myaccount-row text-center">
            <div>
                <h5>Author Details</h5>
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
        </div>

    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col text-center">
            <h3 class="text-uppercase">Posts By {{ $user->username }}</h3>
        </div>
    </div>
</div>

<div class="container mt-4 post-card-container">
    <div class="row card-outter-row">
    @foreach($posts as $post)
        <div class="col-lg-4 col-md-6 card-inner-col">
            <div class="card-inner">
                <div class="row">
                    <a href="{{ route('post',['slug' => $post->slug]) }}" class="card-img-link">
                        <div class="col card-img-div" style="background:url('{{asset($post->img)}}')">
                        </div>
                    </a>
                </div>
                <div class="row">
                    <div class="col card-content">
                        <a href="{{ route('post',['slug' => $post->slug]) }}">
                            <h1>{{ $post->title }}</h1>
                        </a>
                        <p class="py-2">{!! $post->getContentChunk($post->content) !!}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <a href="{{ route('post',['slug' => $post->slug]) }}" class="btn-blue">Read More</a>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col card-credits">
                        <p>Author: <a href="{{ route('author',['name' => $post->user->username]) }}">{{ $post->user->username }}</a></p>
                        <p>Date: {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 pagination-col text-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>

@endsection
