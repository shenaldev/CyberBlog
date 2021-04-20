@extends('layouts.html_layout')

@section('body')

<div class="container mt-5">
    <div class="row text-center">
        <div class="col">
            <h4>All Categories</h4>
        </div>
    </div>
</div>

@if($categories->count() > 0)
<div class="container mt-4 post-card-container">
    <div class="row card-outter-row">
        @foreach($categories as $category)
            <div class="col-lg-4 col-md-6 card-inner-col">
                <div class="card-inner">
                    <div class="row">
                        <a href="{{ route('category.posts',['category' => $category->slug]) }}" class="card-img-link">
                            <div class="col card-img-div" style="background:url('{{asset($category->img)}}')"></div>
                        </a>
                    </div>
                    <div class="row">
                        <div class="col card-content">
                            <a href="{{ route('category.posts',['category' => $category->slug]) }}">
                                <h1>{{ $category->name }}</h1>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <a href="{{ route('category.posts',['category' => $category->slug]) }}" class="btn-blue">View Posts</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <p>Total Posts : {{ $category->posts->count() }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endif

@if($categories->count() == 0)
    <div class="container mt-1">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="alert alert-warning text-center" role="alert">
                    Sorry Categories Not Found !
                </div>
            </div>
        </div>
    </div>
@endif


@endsection
