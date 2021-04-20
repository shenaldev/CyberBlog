@extends('layouts.html_layout')

@section('body')

<!----------------------------------------------------
    Section Posts With Categories
---------------------------------------------------->


<div class="container-fluid category-section mt-5">
    <div class="row">
        <div class="col-lg-5">
            <div class="category-name-div">
                <h1>{{ $category->name }}</h1>
            </div>
        </div>
        <div class="category-lable">
            <p>{{ $category->name }}</p>
        </div>
        <div class="col category-btn-div">

        </div>
    </div>
</div>


<div class="container post-card-container">
    <div class="row card-outter-row">
        @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 card-inner-col">
                <div class="card-inner">
                    <div class="row">
                        <a href="{{ route('post',['slug' => $post->slug]) }}" class="card-img-link">
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-6 pagination-col text-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>


@endsection
