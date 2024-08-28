@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Edit Student Project </h6>
        <hr />
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <h5 class="text-center pt-4">Edit User Profile</h5>
                        <div class="card-body">
                            <form action="{{ route('update.student.project') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $studentProject->id }}">
                                <div class="mb-3">
                                    <label for="">Student Name</label>
                                    <input type="text" class="form-control" name="student_name" id=""
                                        value="{{ $studentProject->student_name }}">

                                </div>
                                <div class="mb-3">
                                    <label for="">Project URL</label>
                                    <input type="text" class="form-control" name="project_url" id=""
                                        value="{{ $studentProject->project_url }}">
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary">Update Student Project</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result)
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endsection
