@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Instructor</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.instructor') }}" class="btn btn-primary px-5">Add Instructor </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Photo </th>
                                <th>First Name </th>
                                <th>Last Name </th>
                                <th>Email </th>
                                <th>Phone </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($instructors as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset($item->photo) }}" alt="" width="60px" height="60px">
                                    </td>
                                    <td>{{ $item->firstname }}</td>
                                    <td>{{ $item->lastname }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        {{-- <a href="{{ route('edit.post', $item->id) }}" class="btn btn-success px-5">View </a> --}}
                                        <a href="{{ route('edit.instructor', $item->id) }}" class="btn btn-info px-5">Edit
                                        </a>
                                        <a href="{{ route('delete.instructor', $item->id) }}" class="btn btn-danger px-5"
                                            id="delete">Delete </a>
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
