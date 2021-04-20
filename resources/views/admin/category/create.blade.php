@extends('admin.inc.html_layout')

@section('content')

<div class="row page category-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Create New Category</h2>
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

        <div class="row mt-5 justify-content-center">
            <div class="col-lg-6 col-12">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="img">Category Image <span class="required-icon">*</span></label>
                        <input type="file" name="img" id="input-category-img" class="form-control" required>
                    </div>
                    <div class="form-row">
                        <div class="mt-1 pb-2">
                            <img src="" class="img-thumbnail" style="display:none;" id="preview-img" alt="avatar">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Category Name <span class="required-icon">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-blue" type="submit">Create</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>

@endsection
