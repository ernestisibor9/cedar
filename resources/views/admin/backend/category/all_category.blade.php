@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">All Category</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Category Image</th>
                                <th>Category Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset($category->image) }}" alt="" width="80px" height="60px">
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>
                                        <a href="{{ route('edit.category', $category->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('delete.category', $category->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                        {{-- <a href="{{route('edit.category', $category->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete.category', $category->id)}}" class="btn btn-danger" id="delete">Delete</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
