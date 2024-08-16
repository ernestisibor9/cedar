@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Edit Course </h6>
        <hr />
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card p-3">
                        <h5 class="text-center pt-4">Edit Course</h5>
                        <div class="card-body">
                            <form action="{{ route('update.course') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="course_id" value="{{$course->id}}">
                                <input type="hidden" name="old_img" value="{{$course->course_image}}">
                                <input type="hidden" name="old_vid" value="{{$course->video}}">
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="">Course Name</label>
                                        <input type="text" class="form-control"
                                            name="course_name" id="" value="{{$course->course_name}}">
                                    </div>
                                    <div class="col">
                                        <label for="">Course Title</label>
                                        <input type="text"
                                            class="form-control "
                                            name="course_title" id="" value="{{$course->course_title}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="">Course Image</label>
                                        <input type="file" class="form-control" name="course_image" id="image">
                                    </div>
                                    <div class="col">
                                        <img id="showImage" src="{{ asset($course->course_image) }}" alt="Admin"
                                            class="rounded-circle p-1 bg-primary" width="90">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="">Course Intro Video</label>
                                            <input type="file" class="form-control" name="video" id=""
                                                accept="video/mp4">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="">Course Category</label>
                                        <select name="category_id" id=""
                                            class="form-select @error('category_id')is-invalid @enderror">
                                            <option value="" disabled>Select Course Category</option>
                                            @foreach ($categories as $cat)
                                            <option value="{{ $cat->id }}" {{$cat->id === $course->category_id ? 'selected' : ''}}>{{ $cat->category_name }}</option>
                                        @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="">Course Price</label>
                                        <input type="text" class="form-control " name="selling_price" id="" value="{{$course->selling_price}}">
                                    </div>
                                    <div class="col">
                                        <label for="">Discount Price</label>
                                        <input type="text" class="form-control " name="discount_price" id="" value="{{$course->discount_price}}">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="">Language</label>
                                        <input type="text" class="form-control " name="language" id="" value="{{$course->language}}">
                                    </div>
                                    <div class="col">
                                        <label for="">Level</label>
                                        <input type="text" class="form-control " name="level" id="" value="{{$course->level}}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="">Start Date</label>
                                        <input type="date" class="form-control " name="start_date" id="" value="{{$course->start_date}}">
                                    </div>
                                    <div class="col">
                                        <label for="">Duration</label>
                                        <input type="text" class="form-control " name="duration" id="" value="{{$course->duration}}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea name="description" id="mytextarea" cols="30" rows="10" class="form-control">
                                            {!! $course->description !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="">Course Outline</label>
                                        <textarea name="course_outlines" id="mytextarea" cols="30" rows="10" class="form-control @error('course_outlines')is-invalid @enderror">
                                            {!! $course->course_outlines !!}
                                        </textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="">Course Benefits</label>
                                        <textarea name="course_benefits" id="mytextarea" cols="30" rows="10" class="form-control">
                                            {!! $course->course_benefits !!}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Update Course</button>                                  </div>
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
