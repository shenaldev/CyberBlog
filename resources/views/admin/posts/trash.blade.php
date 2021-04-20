@extends('admin.inc.html_layout')

@section('content')

<div class="row page trash-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Manage Trash Posts</h2>
            </div>
        </div>

        <div class="row mt-4 justify-content-end">
            <div class="col-lg-3 col-md-4 col-sm-6 float-right">
                <a href="{{ route('post.create') }}" class="btn btn-success btn-sm ">Create New Post</a>
                <a href="{{ route('post.index') }}" class="btn btn-info btn-sm">View Posts</a>
            </div>
        </div>

        <!-- If Have Any Posts -->
        @if($posts->count() > 0)

        <!-- multiple posts action form -->
        <form action="{{ route('post.action') }}" id="actions_form" method="POST">@csrf</form>

        <div class="row mt-3">
            <div class="col users-table">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all" name="select-all"></th>
                            <th>ID</th>
                            <th>Img</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Restore</th>
                        </tr>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="action-check" form="actions_form" name="select_posts[]" value="{{ $post->id }}">
                                    </td>
                                    <td> {{ $post->id }} </td>
                                    <td>
                                        <img class="user-avatar" src="{{ asset($post->img) }}" alt="Post Image">
                                    </td>
                                    <td> {{ $post->title }} </td>
                                    <td> {{ $post->category->name }} </td>

                                    <td class="action-btn-div">
                                        <form action="{{ route('post.restore',['id' => $post->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="restore" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-refresh-ccw"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>
                                            </button>
                                        </form>
                                        <form action="{{ route('post.kill',['id' => $post->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn" type="submit">
                                                <svg class="delete" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>

        <!-- multiple posts actions  -->
        <div class="row bg-dark p-2 mt-3" style="border-radius:5px">
            <div class="col-2">
                <select form="actions_form" name="action" id="action" class="form-control form-control-md">
                    <option value="restore">Restore All</option>
                    <option value="delete">Delete All</option>
                </select>
            </div>
            <div class="col">
                <button class="btn btn-danger btn-sm" form="actions_form" type="submit">Make Changes</button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col pagination-div text-center">
                {{ $posts->links() }}
            </div>
        </div>

        @else

        <div class="row empty-row">
            <div class="col empty-content-col">
                <h2>Nothing On Trash</h2>
            </div>
        </div>

        @endif

    </div><!-- Main col end -->
</div>

@endsection
