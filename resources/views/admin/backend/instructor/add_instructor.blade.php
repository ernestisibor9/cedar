@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Instructor</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Add Instructor</h5>
                <form id="myForm" action="{{ route('store.instructor') }}" method="post" class="row g-3"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label">First Name</label>
                        <input type="text" name="firstname" class="form-control @error('firstname')is-invalid @enderror" id="input1">
                        @error('firstname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label">Last Name</label>
                        <input type="text" name="lastname" class="form-control @error('lastname')is-invalid @enderror" id="input1">
                        @error('lastname')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control @error('phone')is-invalid @enderror" id="input1">
                        @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="input1">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group col-md-12">
                        <label for="input1" class="form-label">Address</label>
                        <textarea name="address" class="form-control @error('address')is-invalid @enderror"></textarea>
                        @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="input1" class="form-label">Facebook URL</label>
                        <input type="text" name="facebook_url" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input1" class="form-label">Twitter URL</label>
                        <input type="text" name="twitter_url" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input1" class="form-label">Instagram URL</label>
                        <input type="text" name="instagram_url" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="input2" class="form-label">Instructor Photo </label>
                        <input class="form-control @error('photo')is-invalid @enderror" name="photo" type="file" id="image">

                        @error('photo')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>

                    <div class="col-md-6">
                        <img id="showImage" src="{{ url('upload/no_image2.jpeg') }}" alt="Instructor"
                            class="rounded-circle p-1 bg-primary" width="80">
                    </div>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-4">Add Instructor</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>




    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
