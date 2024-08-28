@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Edit Course Outline </h6>
        <hr />
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="text-center pt-4">Edit Course Outline </h5>
                        <div class="card-body">
                            <form action="{{ route('update.course.outline') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $courseOutline->id }}">
                                <div class="mb-3">
                                    <label for="">Course Outline</label>
                                    <textarea name="course_outlines" id="mytextarea" cols="30" rows="10"
                                        class="form-control @error('course_outlines')is-invalid @enderror">
                                        {!! $courseOutline->course_outlines !!}
                                    </textarea>
                                    @error('course_outlines')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary">Update Course Outline</button>
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
