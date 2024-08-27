@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')


@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
    $enrollCourses = App\Models\Payment::where('user_id', $id)->latest()->get();
    $newCourses = App\Models\Course::latest()->limit(3)->get();
    $payment= App\Models\Payment::latest()->get();
@endphp


<div class="container-fluid">

    <div class="section-block mb-5"></div>
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">My Courses</h3>
    </div>
    <div class="dashboard-cards mb-5">
        @foreach ($enrollCourses as $item)
            @if ($item->course)
            <div class="card card-item card-item-list-layout">
                <div class="card-image">
                    <a href="#" class="d-block">
                        <img class="card-img-top" src="{{asset($item->course->course_image)}}" alt="Card image cap">
                    </a>
                    {{-- <div class="course-badge-labels">
                        <div class="course-badge">Bestseller</div>
                        <div class="course-badge blue">-39%</div>
                    </div> --}}
                </div><!-- end card-image -->
                <div class="card-body">
                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{$item->course->level}} Levels</h6>
                    <h5 class="card-title"><a href="course-details.html">{{$item->course->course_title}}</a></h5>
                    <p class="card-text"><a href="teacher-detail.html">Cedar</a></p>
                    {{-- <div class="rating-wrap d-flex align-items-center py-2">
                        <div class="review-stars">
                            <span class="rating-number">4.4</span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star"></span>
                            <span class="la la-star-o"></span>
                        </div>
                        <span class="rating-total pl-1">(20,230)</span>
                    </div><!-- end rating-wrap --> --}}
                    <ul class="card-duration d-flex align-items-center fs-15 pb-2">
                        {{-- <li class="mr-2">
                            <span class="text-black">Status:</span>
                            <span class="badge badge-success text-white">Published</span>
                        </li> --}}
                        <li class="mr-2">
                            <span class="text-black">Duration:</span>
                            <span>{{$item->course->duration}} months</span>
                        </li>
                        <li class="mr-2">
                            <span class="text-black">Students:</span>
                            <span>{{count($payment)}}</span>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-price text-black font-weight-bold">${{$item->course->selling_price}}</p>
                        {{-- <div class="card-action-wrap pl-3">
                            <a href="course-details.html" class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-success" data-toggle="tooltip" data-placement="top" data-title="View"><i class="la la-eye"></i></a>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-secondary" data-toggle="tooltip" data-placement="top" data-title="Edit"><i class="la la-edit"></i></div>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                <span data-toggle="modal" data-target="#itemDeleteModal" class="w-100 h-100 d-inline-block"><i class="la la-trash"></i></span>
                            </div>
                        </div> --}}
                    </div>
                </div><!-- end card-body -->
            </div>
            @else
            <h5 class="text-danger">You have not enroll for any course</h5>
            <h6>Click <a href="" class="btn btn-primary">here</a> to enroll now</h6>
            @endif
        @endforeach<!-- end card -->
        {{-- <div class="card card-item card-item-list-layout">
            <div class="card-image">
                <a href="course-details.html" class="d-block">
                    <img class="card-img-top" src="images/img9.jpg" alt="Card image cap">
                </a>
                <div class="course-badge-labels">
                    <div class="course-badge">Bestseller</div>
                    <div class="course-badge blue">-39%</div>
                </div>
            </div><!-- end card-image -->
            <div class="card-body">
                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst Course 2021</a></h5>
                <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
                <div class="rating-wrap d-flex align-items-center py-2">
                    <div class="review-stars">
                        <span class="rating-number">4.4</span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star-o"></span>
                    </div>
                    <span class="rating-total pl-1">(20,230)</span>
                </div><!-- end rating-wrap -->
                <ul class="card-duration d-flex align-items-center fs-15 pb-2">
                    <li class="mr-2">
                        <span class="text-black">Status:</span>
                        <span class="badge badge-danger text-white">Cancelled</span>
                    </li>
                    <li class="mr-2">
                        <span class="text-black">Duration:</span>
                        <span>3 hours 20 min</span>
                    </li>
                    <li class="mr-2">
                        <span class="text-black">Students:</span>
                        <span>30,405</span>
                    </li>
                </ul>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="card-price text-black font-weight-bold">129.99</p>
                    <div class="card-action-wrap pl-3">
                        <a href="course-details.html" class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-success" data-toggle="tooltip" data-placement="top" data-title="View"><i class="la la-eye"></i></a>
                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-secondary" data-toggle="tooltip" data-placement="top" data-title="Edit"><i class="la la-edit"></i></div>
                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                            <span data-toggle="modal" data-target="#itemDeleteModal" class="w-100 h-100 d-inline-block"><i class="la la-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
        <div class="card card-item card-item-list-layout">
            <div class="card-image">
                <a href="course-details.html" class="d-block">
                    <img class="card-img-top" src="images/img10.jpg" alt="Card image cap">
                </a>
                <div class="course-badge-labels">
                    <div class="course-badge">Bestseller</div>
                    <div class="course-badge blue">-39%</div>
                </div>
            </div><!-- end card-image -->
            <div class="card-body">
                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst Course 2021</a></h5>
                <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
                <div class="rating-wrap d-flex align-items-center py-2">
                    <div class="review-stars">
                        <span class="rating-number">4.4</span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star-o"></span>
                    </div>
                    <span class="rating-total pl-1">(20,230)</span>
                </div><!-- end rating-wrap -->
                <ul class="card-duration d-flex align-items-center fs-15 pb-2">
                    <li class="mr-2">
                        <span class="text-black">Status:</span>
                        <span class="badge badge-success text-white">Published</span>
                    </li>
                    <li class="mr-2">
                        <span class="text-black">Duration:</span>
                        <span>3 hours 20 min</span>
                    </li>
                    <li class="mr-2">
                        <span class="text-black">Students:</span>
                        <span>30,405</span>
                    </li>
                </ul>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="card-price text-black font-weight-bold">129.99</p>
                    <div class="card-action-wrap pl-3">
                        <a href="course-details.html" class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-success" data-toggle="tooltip" data-placement="top" data-title="View"><i class="la la-eye"></i></a>
                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-secondary" data-toggle="tooltip" data-placement="top" data-title="Edit"><i class="la la-edit"></i></div>
                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                            <span data-toggle="modal" data-target="#itemDeleteModal" class="w-100 h-100 d-inline-block"><i class="la la-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
        <div class="card card-item card-item-list-layout">
            <div class="card-image">
                <a href="course-details.html" class="d-block">
                    <img class="card-img-top" src="images/img11.jpg" alt="Card image cap">
                </a>
                <div class="course-badge-labels">
                    <div class="course-badge">Bestseller</div>
                    <div class="course-badge blue">-39%</div>
                </div>
            </div><!-- end card-image -->
            <div class="card-body">
                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">All Levels</h6>
                <h5 class="card-title"><a href="course-details.html">The Business Intelligence Analyst Course 2021</a></h5>
                <p class="card-text"><a href="teacher-detail.html">Jose Portilla</a></p>
                <div class="rating-wrap d-flex align-items-center py-2">
                    <div class="review-stars">
                        <span class="rating-number">4.4</span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star-o"></span>
                    </div>
                    <span class="rating-total pl-1">(20,230)</span>
                </div><!-- end rating-wrap -->
                <ul class="card-duration d-flex align-items-center fs-15 pb-2">
                    <li class="mr-2">
                        <span class="text-black">Status:</span>
                        <span class="badge badge-success text-white">Published</span>
                    </li>
                    <li class="mr-2">
                        <span class="text-black">Duration:</span>
                        <span>3 hours 20 min</span>
                    </li>
                    <li class="mr-2">
                        <span class="text-black">Students:</span>
                        <span>30,405</span>
                    </li>
                </ul>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="card-price text-black font-weight-bold">12.99 <span class="before-price font-weight-medium">129.99</span></p>
                    <div class="card-action-wrap pl-3">
                        <a href="course-details.html" class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-success" data-toggle="tooltip" data-placement="top" data-title="View"><i class="la la-eye"></i></a>
                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-secondary" data-toggle="tooltip" data-placement="top" data-title="Edit"><i class="la la-edit"></i></div>
                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer ml-1 text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                            <span data-toggle="modal" data-target="#itemDeleteModal" class="w-100 h-100 d-inline-block"><i class="la la-trash"></i></span>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card --> --}}
    </div><!-- end col-lg-12 -->
    {{-- <div class="text-center py-3">
        <nav aria-label="Page navigation example" class="pagination-box">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        <p class="fs-14 pt-2">Showing 1-4 of 16 results</p>
    </div> --}}


</div><!-- end container-fluid -->


@endsection
