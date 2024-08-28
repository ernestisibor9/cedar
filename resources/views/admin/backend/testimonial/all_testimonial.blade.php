@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">All Testimonial</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonial as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ asset($item->photo) }}" alt="Admin"
                                            class="rounded-circle p-1 bg-primary" width="60" height="60"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ Str::substr($item->message, 0, 50) }}...</td>

                                    <td>
                                        <a href="{{ route('edit.testimonial', $item->id) }}" title="Edit"
                                            class="btn btn-primary">Edit</a>
                                        <a href="{{ route('delete.testimonial', $item->id) }}" title="Delete"
                                            class="btn btn-danger" id="delete">Delete</a>
                                        {{-- <a href="{{ route('edit.testimonial', $item->id) }}" title="Edit" class="btn btn-primary">Edit</a>
                                    <button href="{{ route('delete.testimonial', $item->id) }}" title="Delete" class="btn btn-danger" id="delete">Delete</button> --}}

                                    </td>
                                </tr>
                </div>
                @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
