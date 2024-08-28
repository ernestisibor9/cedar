@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">All Course Outlines</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Category Outline</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courseOutline as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{!! $item->course_outlines !!}</td>
                                    <td>
                                        <a href="{{ route('edit.course.outline', $item->id) }}"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('delete.course.outline', $item->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                        {{-- <a href="{{route('edit.category', $category->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete.category', $category->id)}}" class="btn btn-danger" id="delete">Delete</a> --}}
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
