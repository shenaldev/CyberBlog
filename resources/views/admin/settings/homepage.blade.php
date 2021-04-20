@extends('admin.inc.html_layout')

@section('content')

<div class="row page post-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Homepage Settings</h2>
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
                <form action="{{ route('settings.home.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="col-lg-4 col-12">
                            <label for="home_post_limit">Homepage Pre Category Post Limit</label>
                            <input type="number" name="home_post_limit" value="{{ $settings->home_post_limit }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 col-12">
                            <label for="post_limit">Posts Limit Pre Page</label>
                            <input type="number" name="post_limit" value="{{ $settings->post_limit }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group mt-5">
                            <h5 for="categories">Homepage Categories</h5>
                    </div>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <th>Category</th>
                            <th>Display On Homapage</th>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <label for="category_{{ $category->id }}" class="form-check-label">{{ $category->name }}</label>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" name="id[]" value="{{ $category->indexCategory->id }}" class="form-check-input" id="category_{{ $category->id }}"
                                            @if($category->indexCategory->in_home) checked @endif>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                    <div class="form-group mt-4">
                        <button class="btn btn-sm btn-blue" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>


    </div> <!-- Main col end -->
</div>


@endsection
