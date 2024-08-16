@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">
    <h6 class="mb-0 text-uppercase">{{count($users)}} Enrolled Students</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Image</th>
                            <th>Student's Name</th>
                            <th>Phone</th>
                            <th>Course Enrolled For</th>
                            <th>Payment ID</th>
                            <th>Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td><img src="{{ (!empty($user->user->photo)) ? url('upload/user_images/'.$user->user->photo) : url('upload/no_image2.jpeg')}}" alt="" width="60px" height="60px"></td>
                            <td>{{$user->user->name}}</td>
                            <td>{{$user->user->phone}}</td>
                            <td>{{$user->course->course_name}}</td>
                            <td>{{$user->payment_id}}</td>
                            <td>{{$user->payment_method}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




@endsection
