@extends('admin.admin_dashboard')

@section('admin')
    @php
        $registeredStudents = App\Models\User::where('role', 'user')->get();
        $enrollStudents = App\Models\Payment::latest()->get();
        $totalCourses = App\Models\Course::latest()->get();
        $blogPost = App\Models\BlogPost::latest()->get();
        $payment = App\Models\Payment::latest()->get();
    @endphp


    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="{{route('register.students')}}">
                                    <p class="mb-0 text-secondary">Registered Students</p>
                                    <h4 class="my-1 text-info">{{ count($registeredStudents) }}</h4>
                                    <p class="mb-0 font-13"> registered students</p>
                                </a>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i
                                    class='bx bxs-user-plus'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="{{route('enrolled.students')}}">
                                    <p class="mb-0 text-secondary">Enrolled Students</p>
                                    <h4 class="my-1 text-danger">{{ count($enrollStudents) }}</h4>
                                    <p class="mb-0 font-13">Total enrolled students</p>
                                </a>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i
                                    class='bx bxs-user-plus'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="{{route('total.course')}}">
                                    <p class="mb-0 text-secondary">Total Course</p>
                                    <h4 class="my-1 text-success">{{ count($totalCourses) }}</h4>
                                    <p class="mb-0 font-13">Total number of courses</p>
                                </a>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i
                                    class='bx bxs-book'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-4 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <a href="{{route('total.blog')}}">
                                    <p class="mb-0 text-secondary">Total Blog Post</p>
                                    <h4 class="my-1 text-warning">{{ count($blogPost) }}</h4>
                                    <p class="mb-0 font-13">Total Blog Post</p>
                                </a>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i
                                    class='bx bxs-comment'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <!--end row-->

        <div class="card radius-10">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Total Blogs</h6>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>S/N</th>
                                <th>Post Image</th>
                                <th>Post Title</th>
                                <th>Post Content</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogPost as $key => $item)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td><img src="{{asset($item->post_image) }}" class="product-img-2"
                                        alt="product img"></td>
                                <td>{{$item->post_title}}</td>
                                <td>{!! substr($item->long_descp, 0, 50) !!}...</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--end row-->
        <!--end row-->

    </div>
@endsection
