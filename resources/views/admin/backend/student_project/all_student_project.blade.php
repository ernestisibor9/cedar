@extends('admin.admin_dashboard')

@section('admin')


<div class="page-content">
    <h6 class="mb-0 text-uppercase">All Projects</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Project URL</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($studentProjects as $key => $studentProject)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$studentProject->project_url}}</td>
                            <td>
                                @if($studentProject->status == 0)
                                    <span class="badge badge-danger">Inactive</span>
                                @else
                                    <span class="badge badge-success">Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('edit.category', $category->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('delete.category', $category->id)}}" class="btn btn-danger" id="delete">Delete</a>
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
