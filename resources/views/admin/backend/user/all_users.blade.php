@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">
    <h6 class="mb-0 text-uppercase">All Users</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><img src="{{ (!empty($user->photo)) ? url('upload/user_images/'.$user->photo) : url('upload/no_image2.jpeg')}}" alt="" width="60px" height="60px"></td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>
                                <a href="{{route('edit.user', $user->id)}}" title="Edit" class="btn btn-primary">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                                {{-- <a href="{{route('edit.user', $user->id)}}" title="Edit" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete.user', $user->id)}}" title="Delete" class="btn btn-danger" id="delete">Delete</a> --}}
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
