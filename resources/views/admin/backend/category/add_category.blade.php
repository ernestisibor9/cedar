@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Add Category </h6>
        <hr />
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="text-center pt-4">Add Category</h5>
                        <div class="card-body">
                            <form action="{{ route('store.category') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Category Name</label>
                                    <input type="text" class="form-control @error('category_name')is-invalid @enderror"
                                        name="category_name" id="">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="">Category Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <div class="mb-4">
                                    <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin"
                                        class="rounded-circle p-1 bg-primary" width="90">
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary">Add Category</button>
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
