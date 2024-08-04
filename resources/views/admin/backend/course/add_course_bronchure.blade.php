@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Add Category </h6>
        <hr />
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="text-center pt-4">Add Bronchure</h5>
                        <div class="card-body">
                            <form action="{{ route('store.bronchure') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="input2" class="form-label">Select Course
                                        <select id="" class="form-select  @error('course_id')is-invalid @enderror"
                                            name="course_id" required>
                                            <option value='' selected="" disabled>Select Category</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                            @endforeach
                                            <div>
                                                @error('course_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </select>
                                </div>
                                <div class="mb-4">
                                    <label for="">Upload Bronchure PDF</label>
                                    <input type="file" class="form-control" name="pdf_file" id="image">
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary">Add Bronchure</button>
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
