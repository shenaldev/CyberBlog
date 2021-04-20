@extends('layouts.html_layout')

@section('body')

<div class="container mt-5">
    <div class="row text-center">
        <div class="col">
            <h4>Posts For Tag Name "{{ $tag->name }}"</h4>
        </div>
    </div>
</div>

@if($posts->count() > 0)
<div class="container mt-4 post-card-container">
    <div class="row card-outter-row">
        @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 card-inner-col">
                <div class="card-inner">
                    <div class="row">
                        <a href="!{ route('post',['slug' => $post->slug]) }}" class="card-img-link">
                            <div class="col card-img-div" style="background:url('{{asset($post->img)}}')"></div>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col card-content">
                            <a href="{{ route('post',['slug' => $post->slug]) }}">
                                <h1>{{ $post->title }}</h1>
                            </a>
                            <p>{{ $post->getContentChunk($post->content) }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{ route('post',['slug' => $post->slug]) }}" class="btn-blue">Read More</a>
                        </div>
                    </div>
                    <div class="row">
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
@endif

@if($posts->count() == 0)
    <div class="container mt-1">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="alert alert-warning text-center" role="alert">
                    Sorry Posts Not Found !
                </div>
            </div>
        </div>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 pagination-col text-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>


@endsection
