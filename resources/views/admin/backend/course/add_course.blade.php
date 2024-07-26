@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Add Course </h6>
        <hr />
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card p-3">
                        <h5 class="text-center pt-4">Add Course</h5>
                        <div class="card-body">
                            <form action="{{ route('store.course') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="">Course Name</label>
                                        <input type="text" class="form-control @error('course_name')is-invalid @enderror"
                                            name="course_name" id="">
                                        @error('course_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="">Course Title</label>
                                        <input type="text"
                                            class="form-control @error('course_title')is-invalid @enderror"
                                            name="course_title" id="">
                                        @error('course_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="">Course Image</label>
                                        <input type="file" class="form-control" name="course_image" id="image">
                                    </div>
                                    <div class="col">
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin"
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
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
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
                                        <input type="text" class="form-control " name="selling_price" id="">
                                    </div>
                                    <div class="col">
                                        <label for="">Discount Price</label>
                                        <input type="text" class="form-control " name="discount_price" id="">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col">
                                        <label for="">Language</label>
                                        <input type="text" class="form-control " name="language" id="">
                                    </div>
                                    <div class="col">
                                        <label for="">Level</label>
                                        <input type="text" class="form-control " name="level" id="">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="">Start Date</label>
                                        <input type="date" class="form-control " name="start_date" id="">
                                    </div>
                                    <div class="col">
                                        <label for="">Duration</label>
                                        <input type="text" class="form-control " name="duration" id="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea name="description" id="mytextarea" cols="30" rows="10" class="form-control @error('description')is-invalid @enderror">

                                        </textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="">Course Outline</label>
                                        <textarea name="course_outlines" id="mytextarea" cols="30" rows="10" class="form-control @error('course_outlines')is-invalid @enderror">

                                        </textarea>
                                        @error('course_outlines')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="">Course Benefits</label>
                                        <textarea name="course_benefits" id="mytextarea" cols="30" rows="10" class="form-control @error('course_outlines')is-invalid @enderror">

                                        </textarea>
                                        @error('course_outlines')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Add Course</button>                                  </div>
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
