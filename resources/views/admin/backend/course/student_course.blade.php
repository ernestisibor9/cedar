@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">All Courses</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Course Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($courses as $key => $course)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ !empty($course->user->photo) ? url('upload/user_images/' . $course->user->photo) : url('upload/no_image2.jpeg') }}"
                                            alt="" width="60px" height="60px"></td>
                                    <td>{{ $course->user->name }}</td>
                                    <td>{{ $course->user->phone }}</td>
                                    <td>{{ $course->course->course_name }}</td>
                                    <td>{{ $course->user->email }}</td>
                                    <td>
                                        <a href="{{ route('edit.course', $course->id) }}" title="Edit"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('delete.course', $course->id) }}" title="Delete"
                                            class="btn btn-danger" id="delete">Delete</a>
                                        {{-- <a href="{{route('edit.course', $course->id)}}" title="Lecture" class="btn btn-warning" id="delete">View</a>
                                <a href="{{route('add.course.lecture', $course->id)}}" title="Add" class="btn btn-success">Add</a>
                                <a href="{{route('edit.course', $course->id)}}" title="Edit" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete.course', $course->id)}}" title="Delete" class="btn btn-danger" id="delete">Delete</a> --}}
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
