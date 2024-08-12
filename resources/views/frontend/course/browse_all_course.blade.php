@extends('frontend.master')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
</script>

@section('home')


<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
            <div class="section-heading">
                <h2 class="section__title text-white">Our Courses</h2>
            </div>
            <ul class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="index.html">Home</a></li>
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
                <p class="fs-14">We found <span class="text-black">56</span> courses available for you</p>
                <div class="d-flex flex-wrap align-items-center">

                    <div class="select-container select--container mr-3">
                        <select class="select-container-select">
                            <option value="all-category">All Category</option>
                            <option value="newest">Newest courses</option>
                            <option value="oldest">Oldest courses</option>
                            <option value="high-rated">Highest rated</option>
                            <option value="popular-courses">Popular courses</option>
                            <option value="high-to-low">Price: high to low</option>
                            <option value="low-to-high">Price: low to high</option>
                        </select>
                    </div>

                </div>
            </div><!-- end filter-bar-inner -->
            <div class="collapse pt-4" id="collapseFilter">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="widget-panel">
                            <h3 class="fs-18 font-weight-semi-bold pb-3">Ratings</h3>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="fiveStarRating" name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label" for="fiveStarRating">
                                          <span class="rating-wrap d-flex align-items-center">
                                              <span class="review-stars">
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                              </span>
                                              <span class="rating-total pl-1"><span class="mr-1 text-black">5.0</span>(20,230)</span>
                                          </span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="fourStarRating" name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label" for="fourStarRating">
                                          <span class="rating-wrap d-flex align-items-center">
                                              <span class="review-stars">
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                              </span>
                                              <span class="rating-total pl-1"><span class="mr-1 text-black">4.5 & up</span>(10,230)</span>
                                          </span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="threeStarRating" name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label" for="threeStarRating">
                                          <span class="rating-wrap d-flex align-items-center">
                                              <span class="review-stars">
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                              </span>
                                              <span class="rating-total pl-1"><span class="mr-1 text-black">3.0 & up</span>(7,230)</span>
                                          </span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="twoStarRating" name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label" for="twoStarRating">
                                          <span class="rating-wrap d-flex align-items-center">
                                              <span class="review-stars">
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                              </span>
                                              <span class="rating-total pl-1"><span class="mr-1 text-black">2.0 & up</span>(5,230)</span>
                                          </span>
                                </label>
                            </div>
                            <div class="custom-control custom-radio mb-1 fs-15">
                                <input type="radio" class="custom-control-input" id="oneStarRating" name="radio-stacked" required>
                                <label class="custom-control-label custom--control-label" for="oneStarRating">
                                          <span class="rating-wrap d-flex align-items-center">
                                              <span class="review-stars">
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                                  <span class="la la-star"></span>
                                              </span>
                                              <span class="rating-total pl-1"><span class="mr-1 text-black">1.0 & up</span>(3,230)</span>
                                          </span>
                                </label>
                            </div>
                        </div><!-- end widget-panel -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="widget-panel">
                            <h3 class="fs-18 font-weight-semi-bold pb-3">Categories</h3>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="catCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black" for="catCheckbox">
                                    Business<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="catCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black" for="catCheckbox2">
                                    UI & UX<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="catCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black" for="catCheckbox3">
                                    Animation<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="catCheckbox4" required>
                                <label class="custom-control-label custom--control-label text-black" for="catCheckbox4">
                                    Game Design<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="collapse" id="collapseMore">
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox5" required>
                                    <label class="custom-control-label custom--control-label text-black" for="catCheckbox5">
                                        Graphic Design<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox6" required>
                                    <label class="custom-control-label custom--control-label text-black" for="catCheckbox6">
                                        Typography<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox7" required>
                                    <label class="custom-control-label custom--control-label text-black" for="catCheckbox7">
                                        Web Development<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox8" required>
                                    <label class="custom-control-label custom--control-label text-black" for="catCheckbox8">
                                        Photography<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="catCheckbox9" required>
                                    <label class="custom-control-label custom--control-label text-black" for="catCheckbox9">
                                        Finance<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                            </div><!-- end collapse -->
                            <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMore" role="button" aria-expanded="false" aria-controls="collapseMore">
                                <span class="collapse-btn-hide">Show more<i class="la la-angle-down ml-1 fs-14"></i></span>
                                <span class="collapse-btn-show">Show less<i class="la la-angle-up ml-1 fs-14"></i></span>
                            </a>
                        </div><!-- end widget-panel -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="widget-panel">
                            <h3 class="fs-18 font-weight-semi-bold pb-3">Video Duration</h3>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="videoDurationCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black" for="videoDurationCheckbox">
                                    0-2 Hours<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="videoDurationCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black" for="videoDurationCheckbox2">
                                    3-6 Hours<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="videoDurationCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black" for="videoDurationCheckbox3">
                                    7-14 Hours<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="videoDurationCheckbox4" required>
                                <label class="custom-control-label custom--control-label text-black" for="videoDurationCheckbox4">
                                    16+ Hours<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                        </div><!-- end widget-panel -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="widget-panel">
                            <h3 class="fs-18 font-weight-semi-bold pb-3">Level</h3>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox">
                                    All Levels<span class="ml-1 text-gray">(20,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox2">
                                    Beginner<span class="ml-1 text-gray">(5,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox3">
                                    Intermediate<span class="ml-1 text-gray">(3,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="levelCheckbox4" required>
                                <label class="custom-control-label custom--control-label text-black" for="levelCheckbox4">
                                    Expert<span class="ml-1 text-gray">(1,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                        </div><!-- end widget-panel -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="widget-panel">
                            <h3 class="fs-18 font-weight-semi-bold pb-3">Language</h3>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="lanCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black" for="lanCheckbox">
                                    English<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="laCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black" for="laCheckbox2">
                                    Português<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="lanCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black" for="lanCheckbox3">
                                    Español<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="lanCheckbox4" required>
                                <label class="custom-control-label custom--control-label text-black" for="lanCheckbox4">
                                    Türkçe<span class="ml-1 text-gray">(12,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="collapse" id="collapseMoreTwo">
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox5" required>
                                    <label class="custom-control-label custom--control-label text-black" for="lanCheckbox5">
                                        Français<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox6" required>
                                    <label class="custom-control-label custom--control-label text-black" for="lanCheckbox6">
                                        中文<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox7" required>
                                    <label class="custom-control-label custom--control-label text-black" for="lanCheckbox7">
                                        Deutsch<span class="ml-1 text-gray">(12,300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox8" required>
                                    <label class="custom-control-label custom--control-label text-black" for="lanCheckbox8">
                                        日本語<span class="ml-1 text-gray">(300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="lanCheckbox9" required>
                                    <label class="custom-control-label custom--control-label text-black" for="lanCheckbox9">
                                        Polski<span class="ml-1 text-gray">(300)</span>
                                    </label>
                                </div><!-- end custom-control -->
                            </div><!-- end collapse -->
                            <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMoreTwo" role="button" aria-expanded="false" aria-controls="collapseMoreTwo">
                                <span class="collapse-btn-hide">Show more<i class="la la-angle-down ml-1 fs-14"></i></span>
                                <span class="collapse-btn-show">Show less<i class="la la-angle-up ml-1 fs-14"></i></span>
                            </a>
                        </div><!-- end widget-panel -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="widget-panel">
                            <h3 class="fs-18 font-weight-semi-bold pb-3">By Cost</h3>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="priceCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black" for="priceCheckbox">
                                    Paid<span class="ml-1 text-gray">(19,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="priceCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black" for="priceCheckbox2">
                                    Free<span class="ml-1 text-gray">(1,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="priceCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black" for="priceCheckbox3">
                                    All<span class="ml-1 text-gray">(20,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                        </div><!-- end widget-panel -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="widget-panel">
                            <h3 class="fs-18 font-weight-semi-bold pb-3">Instructors</h3>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="instructorCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox">
                                    All Instructor
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="instructorCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox2">
                                    Aatef Jaberi
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="instructorCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox3">
                                    Emilee Logan
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="instructorCheckbox4" required>
                                <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox4">
                                    Harley Ferrell
                                </label>
                            </div><!-- end custom-control -->
                            <div class="collapse" id="collapseMoreThree">
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="instructorCheckbox5" required>
                                    <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox5">
                                        Nahla Jones
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="instructorCheckbox6" required>
                                    <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox6">
                                        Tomi Hensley
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="instructorCheckbox7" required>
                                    <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox7">
                                        Foley Patrik
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="instructorCheckbox8" required>
                                    <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox8">
                                        Oliver Porter
                                    </label>
                                </div><!-- end custom-control -->
                                <div class="custom-control custom-checkbox mb-1 fs-15">
                                    <input type="checkbox" class="custom-control-input" id="instructorCheckbox9" required>
                                    <label class="custom-control-label custom--control-label text-black" for="instructorCheckbox9">
                                        Fahad Chaudhry
                                    </label>
                                </div><!-- end custom-control -->
                            </div><!-- end collapse -->
                            <a class="collapse-btn collapse--btn fs-15" data-toggle="collapse" href="#collapseMoreThree" role="button" aria-expanded="false" aria-controls="collapseMoreThree">
                                <span class="collapse-btn-hide">Show more<i class="la la-angle-down ml-1 fs-14"></i></span>
                                <span class="collapse-btn-show">Show less<i class="la la-angle-up ml-1 fs-14"></i></span>
                            </a>
                        </div><!-- end widget-panel -->
                    </div><!-- end col-lg-3 -->
                    <div class="col-lg-3">
                        <div class="widget-panel">
                            <h3 class="fs-18 font-weight-semi-bold pb-3">Features</h3>
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="featureCheckbox" required>
                                <label class="custom-control-label custom--control-label text-black" for="featureCheckbox">
                                    Captions<span class="ml-1 text-gray">(20,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="featureCheckbox2" required>
                                <label class="custom-control-label custom--control-label text-black" for="featureCheckbox2">
                                    Quizzes<span class="ml-1 text-gray">(5,300)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="featureCheckbox3" required>
                                <label class="custom-control-label custom--control-label text-black" for="featureCheckbox3">
                                    Coding Exercises<span class="ml-1 text-gray">(12)</span>
                                </label>
                            </div><!-- end custom-control -->
                            <div class="custom-control custom-checkbox mb-1 fs-15">
                                <input type="checkbox" class="custom-control-input" id="featureCheckbox4" required>
                                <label class="custom-control-label custom--control-label text-black" for="featureCheckbox4">
                                    Practice Tests<span class="ml-1 text-gray">(200)</span>
                                </label>
                            </div><!-- end custom-control -->
                        </div><!-- end widget-panel -->
                    </div><!-- end col-lg-3 -->
                </div><!-- end row -->
            </div><!-- end collapse -->
        </div><!-- end filter-bar -->
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
                                @if ($course->discount_price === null)
                                    <p class="card-price text-black font-weight-bold">
                                        &pound;{{ $course->selling_price }}</p>
                                @else
                                    <p class="card-price text-black font-weight-bold">
                                        &pound;{{ $course->discount_price }} <span
                                            class="before-price font-weight-medium">	&pound;{{ $course->selling_price }}</span>
                                @endif
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
        <div class="text-center pt-3">
            <nav aria-label="Page navigation example" class="pagination-box">
                <div class="pagination justify-content-center">
                    {!!$courses->links('pagination::bootstrap-5')!!}
                </div>
            </nav>

        </div>
    </div><!-- end container -->
</section><!-- end courses-area -->
<!--======================================
        END COURSE AREA
======================================-->


@endsection
