@php
    $courses = App\Models\Course::where('status', '0')->orderBy('id', 'asc')->limit(6)->get();
    $categories = App\Models\Category::orderBy('category_name', 'asc')->get();
@endphp

<style>
    .my-img{
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
</style>
<!--======================================
        START COURSE AREA
======================================-->
<section class="course-area pb-120px">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Choose your desired courses</h5>
            <h2 class="section__title">The world's largest selection of courses</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
        {{-- <ul class="nav nav-tabs generic-tab justify-content-center pb-4" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="business-tab" data-toggle="tab" href="#business" role="tab" aria-controls="business" aria-selected="true">Business</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="design-tab" data-toggle="tab" href="#design" role="tab" aria-controls="design" aria-selected="false">Design</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="development-tab" data-toggle="tab" href="#development" role="tab" aria-controls="development" aria-selected="false">Development</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="drawing-tab" data-toggle="tab" href="#drawing" role="tab" aria-controls="drawing" aria-selected="false">Drawing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="marketing-tab" data-toggle="tab" href="#marketing" role="tab" aria-controls="marketing" aria-selected="false">Marketing</a>
            </li>
        </ul> --}}
    </div><!-- end container -->
    <div class="card-content-wrapper bg-gray pt-50px pb-120px">
        <div class="container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="business" role="tabpanel" aria-labelledby="business-tab">
                    <div class="row">
                        @foreach ($courses as $course)
                            <div class="col-lg-4 responsive-column-half">
                                <div class="card card-item card-preview" data-tooltip-content="">
                                    <div class="card-image">
                                        <a href="{{ url('course/details/' . $course->id . '/' . $course->course_name_slug) }}" class="d-block">
                                            <img class="card-img-top lazy my-img" src="{{ asset($course->course_image) }}"
                                                data-src="{{ asset($course->course_image) }}" alt="Card image cap">
                                        </a>
                                        @php
                                        $reviewcount = App\Models\Review::where('course_id',$course->id)->where('status',1)->latest()->get();
                                        $avarage = App\Models\Review::where('course_id',$course->id)->where('status',1)->avg('rating');
                                    @endphp

                                    </div><!-- end card-image -->
                                    <div class="card-body">
                                        <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{ $course->level }}</h6>
                                        <h5 class="card-title"><a
                                                href="{{ url('course/details/' . $course->id . '/' . $course->course_name_slug) }}">{{ $course->course_name }}</a></h5>
                                        <p class="card-text"><a href="teacher-detail.html">Duration {{$course->duration}}</a></p>
                                        <div class="rating-wrap d-flex align-items-center py-2">
                                            <div class="review-stars">
                                                <span class="rating-number">{{ round($avarage,1) }}</span>
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
                                                title="Add to Wishlist" id="{{ $course->id }}" onclick="addToWishList(this.id)"><i class="la la-heart-o"></i></div>
                                        </div>
                                    </div><!-- end card-body -->
                                </div><!-- end card -->
                            </div>
                        @endforeach
                        <!-- end col-lg-4 -->
                        <!-- end col-lg-4 -->
                    </div><!-- end row -->
                </div><!-- end tab-pane -->
                <!-- end tab-pane -->
            </div><!-- end tab-content -->
            <div class="more-btn-box mt-4 text-center">
                <a href="{{route('browse.all.course')}}" class="btn theme-btn">Browse all Courses <i
                        class="la la-arrow-right icon ml-1"></i></a>
            </div><!-- end more-btn-box -->
        </div><!-- end container -->
    </div><!-- end card-content-wrapper -->
</section><!-- end courses-area -->
<!--======================================
        END COURSE AREA
======================================-->
