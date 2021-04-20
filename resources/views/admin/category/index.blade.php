@extends('admin.inc.html_layout')

@section('content')

<div class="row page post-page m-4">
    <div class="col">

        <div class="row dashboard-page-header">
            <div class="col">
                <h2>Manage All Categories</h2>
            </div>
        </div>

        <div class="row mt-4 justify-content-end">
            <div class="col-lg-3 col-md-4 col-sm-6 float-right">
                <a href="{{ route('category.create') }}" class="btn btn-success btn-sm d-inline float-right">Create New Category</a>
            </div>
        </div>


        @if($categories->count() > 0)

        <!-- multiple posts action form -->
        <form action="{{ route('category.action') }}" id="actions_form" method="POST">@csrf</form>

        <div class="row mt-3">
            <div class="col post-table">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th><input type="checkbox" id="select-all" name="select-all"></th>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Edit / Delete</th>
                        </tr>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="action-check" form="actions_form" name="select_categories[]" value="{{ $category->id }}">
                                    </td>
                                    <td> {{ $category->id }} </td>
                                    <td>
                                        <img class="user-avatar" src="{{ asset($category->img) }}" alt="Category Image">
                                    </td>
                                    <td> {{ $category->name }} </td>

                                    <td class="action-btn-div">
                                        <a href="{{ route('category.edit',['category' => $category->id]) }}" class="btn d-inline">
                                            <svg class="edit" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        </a>

                                        <form action="{{ route('category.destroy',['category' => $category->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
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
                    <option value="delete">Delete</option>
                </select>
            </div>
            <div class="col">
                <button class="btn btn-danger btn-sm" form="actions_form" type="submit">Make Changes</button>
            </div>
        </div>

        @else

        <div class="row empty-row">
            <div class="col empty-content-col">
                <h2>No Posts To Display</h2>
            </div>
        </div>

        @endif

    </div> <!-- Main col end -->
</div>

@endsection
