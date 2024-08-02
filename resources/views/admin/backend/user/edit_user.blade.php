@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Edit User Profile </h6>
        <hr />
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <h5 class="text-center pt-4">Edit Student Project</h5>
                        <div class="card-body">
                            <form action="{{ route('update.user') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" class="form-control"
                                        name="name" id="" value="{{$user->name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control"
                                        name="email" id="" value="{{$user->email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control"
                                        name="phone" id="" value="{{$user->phone}}">
                                </div>
                                <div class="row">
                                    <div class="col-9 mb-3">
                                        <label for="">Upload Photo</label>
                                        <input type="file" name="photo" id="image" class="form-control">
                                    </div>
                                    <div class="col-3 mb-3">
                                        <img id="showImage"
                                        src="{{ !empty($user->photo) ? url('upload/user_images/' . $user->photo) : url('upload/no_image2.jpeg') }}"
                                        alt="Admin" class="rounded-circle p-1 bg-primary" width="90">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="">Address</label>
                                    <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$user->address}}</textarea>
                                </div>
                                <div class="mb-2">
                                    <button type="submit" class="btn btn-primary">Update User Profile</button>
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
