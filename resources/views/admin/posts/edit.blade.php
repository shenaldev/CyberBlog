@extends('admin.inc.html_layout')

@section('content')

<div class="row page post-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Edit Post</h2>
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

        <div class="row mt-4">
            <div class="col">
                <form action="{{ route('post.update',['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="col-lg-8">
                            <label for="title">Title <span class="required-icon">*</span></label>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label for="img">Image</label>
                            <input type="file" name="img" class="form-control">
                            <div class="mt-2">
                                <img src="{{ asset($post->img) }}" class="img-thumbnail" id="preview-img" alt="Post Image">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label for="category">Select Category <span class="required-icon">*</span></label>
                            <select name="category" id="category" class="form-control" required>
                                @foreach($categories as $catergory)
                                    @if($catergory->id == $post->category_id)
                                        <option value="{{ $catergory->id }}" selected>{{ $catergory->name }}</option>
                                    @else
                                        <option value="{{ $catergory->id }}">{{ $catergory->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label for="content">Content <span class="required-icon">*</span></label>
                            <textarea id="editor" name="content">{{ $post->content }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <label>Select Tags</label>
                        </div>
                    </div>
                    @foreach($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id}}"
                                @foreach($post->tags as $post_tag)
                                    @if($tag->id == $post_tag->id)
                                        checked
                                    @endif
                                @endforeach
                             class="form-check-input">
                            <label for="tag{{ $tag->id }}"> {{ $tag->name }} </label>
                        </div>
                    @endforeach
                    <div class="form-group text-center">
                        <button class="btn btn-blue" type="submit">Publish</button>
                    </div>
                </form>
            </div>
        </div>

    </div> <!-- Main col end -->
</div>
@endsection
