@extends('admin.admin_dashboard')

@section('admin')
    <div class="page-content">
        <h6 class="mb-0 text-uppercase">Add Testimonial</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <form action="{{ route('store.testimonial') }}" method="post" enctype="multipart/form-data">
					@csrf

					<div class="card">
						<div class="card-body">
                            <div class="col-md-12 mb-2">
                                <label for="input8" class="form-label">Name <span style="color: red;">*</span></label>
                                <input type="text" required class="form-control" id="input8" name="name" placeholder="Full Name">
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="input8" class="form-label">Select Role <span style="color: red;">*</span></label>
                                 <select name="status" id="" class="form-select">
                                    <option value="" disabled>Select Role</option>
                                    <option value="student">Student</option>
                                    <option value="parents">Parents</option>
                                 </select>
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="">Message <span style="color: red;">*</span></label>
                                <textarea class="form-control" required  rows="4" name="message"></textarea>
                            </div>
                            <div class="col-md-12 form-group mb-2">
                                <label for="input2" class="form-label">Testimonial Photo <span style="color: red;">*</span></label>
                                <input type="file" required name="photo" class="form-control @error('photo')is-invalid @enderror" id="input1" onChange="mainThamUrl(this)">
                                <div class="mt-2">
                                @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                    <img src="" id="mainThmb">
                            </div>
							<div class="mt-3">
								<button type="submit" class="btn btn-primary">Add</button>
							</div>
						</div>
					</div>
				</form>
            </div>
        </div>
    </div>
    </div>
@endsection
