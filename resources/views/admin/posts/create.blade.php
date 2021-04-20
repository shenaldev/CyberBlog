@extends('admin.inc.html_layout')

@section('content')

<div class="row page post-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Create A New Post</h2>
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
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="col-lg-8">
                            <label for="title">Title <span class="required-icon">*</span></label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label for="img">Image <span class="required-icon">*</span></label>
                            <input type="file" name="img" class="form-control" required>
                            <div class="mt-2">
                                <img src="#" class="img-thumbnail d-none" id="preview-img" alt="avatar">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4">
                            <label for="category">Select Category <span class="required-icon">*</span></label>
                            <select name="category" id="category" class="form-control" required>
                                @foreach($categories as $catergory)
                                    <option value="{{ $catergory->id }}">{{ $catergory->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            <label for="content">Content <span class="required-icon">*</span></label>
                            <textarea id="editor" name="content">
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col">
                            <label>Select Tags</label>
                        </div>
                    </div>
                    @foreach($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" id="tag{{ $tag->id }}" name="tags[]" value="{{ $tag->id}}" class="form-check-input">
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
