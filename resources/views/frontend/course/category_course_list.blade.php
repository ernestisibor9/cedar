@extends('frontend.master')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

@section('home')

@section('title')
    Cedar - Category Course List
@endsection

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
            <div class="section-heading">
                <h2 class="section__title text-white">{{ $breadCat->category_name }}</h2>
            </div>
            <ul
                class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Courses</li>
                <li>Course Grid</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!--======================================
        START COURSE AREA
======================================-->
<section class="course-area section-padding">
    <div class="container">
        <div class="filter-bar mb-4">
            <div class="filter-bar-inner d-flex flex-wrap align-items-center justify-content-between">
                <p class="fs-14">We found <span
                        class="text-black">{{ count($courses) === 0 ? 'no course' : count($courses) }}</span> courses
                    available for you</p>

            </div><!-- end filter-bar-inner -->
            <!-- end collapse -->
        </div><!-- end filter-bar -->
        <div class="row">
            @foreach ($courses as $course)
                <div class="col-lg-4 responsive-column-half">
                    <div class="card card-item card-preview" data-tooltip-content="">
                        <div class="card-image">
                            <a href="{{ url('course/details/' . $course->id . '/' . $course->course_name_slug) }}"
                                class="d-block">
                                <img class="card-img-top lazy my-img" src="{{ asset($course->course_image) }}"
                                    data-src="{{ asset($course->course_image) }}" alt="Card image cap">
                            </a>
                            @php
                                $reviewcount = App\Models\Review::where('course_id', $course->id)
                                    ->where('status', 1)
                                    ->latest()
                                    ->get();
                                $avarage = App\Models\Review::where('course_id', $course->id)
                                    ->where('status', 1)
                                    ->avg('rating');

                            @endphp
                        </div><!-- end card-image -->
                        <div class="card-body">
                            <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{ $course->level }}</h6>
                            <h5 class="card-title"><a
                                    href="{{ url('course/details/' . $course->id . '/' . $course->course_name_slug) }}">{{ $course->course_name }}</a>
                            </h5>
                            <p class="card-text"><a href="teacher-detail.html">Duration {{ $course->duration }}</a></p>
                            <div class="rating-wrap d-flex align-items-center py-2">
                                <div class="review-stars">
                                    <span class="rating-number">{{ round($avarage, 1) }}</span>
                                    @if ($avarage == 0)
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                    @elseif ($avarage == 1 || $avarage < 2)
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                    @elseif ($avarage == 2 || $avarage < 3)
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                    @elseif ($avarage == 3 || $avarage < 4)
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                        <span class="la la-star-o"></span>
                                    @elseif ($avarage == 4 || $avarage < 5)
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star-o"></span>
                                    @elseif ($avarage == 5 || $avarage < 5)
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                        <span class="la la-star"></span>
                                    @endif
                                </div>
                                <span class="rating-total pl-1">({{ count($reviewcount) }})</span>
                            </div><!-- end rating-wrap -->
                            <div class="d-flex justify-content-between align-items-center">
                                <div>

                                </div>
                                {{-- @if ($course->discount_price === null)
                                <p class="card-price text-black font-weight-bold">
                                    &pound;{{ $course->selling_price }}</p>
                            @else
                                <p class="card-price text-black font-weight-bold">
                                    &pound;{{ $course->discount_price }} <span
                                        class="before-price font-weight-medium">	&pound;{{ $course->selling_price }}</span>
                            @endif --}}
                                {{-- <p class="card-price text-black font-weight-bold">12.99 <span class="before-price font-weight-medium">129.99</span></p> --}}
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                    title="Add to Wishlist" id="{{ $course->id }}" onclick="addToWishList(this.id)">
                                    <i class="la la-heart-o"></i></div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
            @endforeach
            <!-- end col-lg-4 -->
            {{-- <div class="col-lg-4 responsive-column-half">
                <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                    <div class="card-image">
                        <a href="course-details.html" class="d-block">
                            <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img9.jpg" alt="Card image cap">
                        </a>
                        <div class="course-badge-labels">
                            <div class="course-badge red">Featured</div>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-price text-black font-weight-bold">129.99</p>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column-half">
                <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                    <div class="card-image">
                        <a href="course-details.html" class="d-block">
                            <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img10.jpg" alt="Card image cap">
                        </a>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-price text-black font-weight-bold">129.99</p>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column-half">
                <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                    <div class="card-image">
                        <a href="course-details.html" class="d-block">
                            <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img11.jpg" alt="Card image cap">
                        </a>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-price text-black font-weight-bold">129.99</p>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column-half">
                <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                    <div class="card-image">
                        <a href="course-details.html" class="d-block">
                            <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img12.jpg" alt="Card image cap">
                        </a>
                        <div class="course-badge-labels">
                            <div class="course-badge green">Free</div>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-price text-black font-weight-bold">Free</p>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 responsive-column-half">
                <div class="card card-item card-preview" data-tooltip-content="#tooltip_content_1">
                    <div class="card-image">
                        <a href="course-details.html" class="d-block">
                            <img class="card-img-top lazy" src="images/img-loading.png" data-src="images/img13.jpg" alt="Card image cap">
                        </a>
                        <div class="course-badge-labels">
                            <div class="course-badge sky-blue">Highest rated</div>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-price text-black font-weight-bold">129.99</p>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer" title="Add to Wishlist"><i class="la la-heart-o"></i></div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-4 --> --}}
        </div><!-- end row -->
        <div class="text-center pt-3">
            <nav aria-label="Page navigation example" class="pagination-box">
                <div class="pagination justify-content-center">
                    {!! $courses->links('pagination::bootstrap-5') !!}
                </div>
            </nav>
        </div>
    </div><!-- end container -->
</section>

@endsection
