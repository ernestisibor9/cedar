<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Aduca - Education HTML Template</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('frontend/images/favicon.png') }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/tooltipster.bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- end inject -->
</head>

<body>

    @php
        $courses = App\Models\Course::latest()->limit(6)->get();
    @endphp

    <!-- start cssload-loader -->
    {{-- <div class="preloader">
        <div class="loader">
            <svg class="spinner" viewBox="0 0 50 50">
                <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
            </svg>
        </div>
    </div> --}}
    <!-- end cssload-loader -->

    <!--======================================
        START HEADER AREA
    ======================================-->
    <header class="header-menu-area bg-white">
        <div class="header-top pr-150px pl-150px border-bottom border-bottom-gray py-1">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="header-widget">
                            <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14">
                                <li class="d-flex align-items-center pr-3 mr-3 border-right border-right-gray"><i class="la la-phone mr-1"></i><a href="tel:+447771222476"> +44 777 1222 476, +234 7072 485 480</a></li>
                                <li class="d-flex align-items-center"><i class="la la-envelope-o mr-1"></i><a href="mailto:info@cedargrowthconsult.com"> info@cedargrowthconsult.com</a></li>
                            </ul>
                        </div><!-- end header-widget -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="header-widget d-flex flex-wrap align-items-center justify-content-end">
                            <div class="theme-picker d-flex align-items-center">
                                <button class="theme-picker-btn dark-mode-btn" title="Dark mode">
                                    <svg id="moon" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
                                    </svg>
                                </button>
                                <button class="theme-picker-btn light-mode-btn" title="Light mode">
                                    <svg id="sun" viewBox="0 0 24 24" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="5"></circle>
                                        <line x1="12" y1="1" x2="12" y2="3"></line>
                                        <line x1="12" y1="21" x2="12" y2="23"></line>
                                        <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                                        <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                                        <line x1="1" y1="12" x2="3" y2="12"></line>
                                        <line x1="21" y1="12" x2="23" y2="12"></line>
                                        <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
                                        <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
                                    </svg>
                                </button>
                            </div>
                            @auth
                                <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14 border-left border-left-gray pl-3 ml-3">
                                    <li class="d-flex align-items-center pr-3 mr-3 border-right border-right-gray"><i class="la la-sign-in mr-1"></i><a href="{{route('user.logout')}}"> Logout</a></li>
                                     <li class="d-flex align-items-center"><i class="la la-user mr-1"></i><a href="{{url('dasboard')}}"> Dashboard</a></li>
                                </ul>
                            @else
                                <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14 border-left border-left-gray pl-3 ml-3">
                                    <li class="d-flex align-items-center pr-3 mr-3 border-right border-right-gray"><i class="la la-sign-in mr-1"></i><a href="{{route('login')}}"> Login</a></li>
                                    <li class="d-flex align-items-center"><i class="la la-user mr-1"></i><a href="{{route('register')}}"> Register</a></li>
                                </ul>
                            @endauth
                        </div><!-- end header-widget -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div><!-- end container-fluid -->
        </div><!-- end header-top -->
        <div class="header-menu-content pr-150px pl-150px bg-white">
            <div class="container-fluid">
                <div class="main-menu-content">
                    <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                    <div class="row align-items-center">
                        <div class="col-lg-2">
                            <div class="logo-box">
                                <a href="{{url('/')}}" class="logo"><img src="{{asset('frontend/images/logo.png')}}" alt="logo"></a>
                                <div class="user-btn-action">
                                    <div class="search-menu-toggle icon-element icon-element-sm shadow-sm mr-2" data-toggle="tooltip" data-placement="top" title="Search">
                                        <i class="la la-search"></i>
                                    </div>
                                    <div class="off-canvas-menu-toggle cat-menu-toggle icon-element icon-element-sm shadow-sm mr-2" data-toggle="tooltip" data-placement="top" title="Category menu">
                                        <i class="la la-th-large"></i>
                                    </div>
                                    <div class="off-canvas-menu-toggle main-menu-toggle icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="top" title="Main menu">
                                        <i class="la la-bars"></i>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col-lg-2 -->
                        <div class="col-lg-10">
                            <div class="menu-wrapper">
                                <form method="post" action="{{route('search.course')}}">
                                    @csrf
                                    <div class="form-group mb-0">
                                        <input class="form-control form--control pl-3 " type="text" name="search" placeholder="Search Course">
                                        <span><button type="submit" class="la la-search search-icon"></button></span>
                                    </div>
                                </form><!-- end menu-category -->

                                <nav class="main-menu">
                                    <ul>
                                        <li>
                                            <a href="{{url('/')}}">Home</a>
                                        </li>
                                    </ul><!-- end ul -->
                                </nav>
                                <nav class="main-menu">
                                    <ul>
                                        <li>
                                            <a href="{{route('about')}}">About </a>
                                        </li>
                                    </ul><!-- end ul -->
                                </nav>
                                <nav class="main-menu">
                                    <ul>
                                        <li>
                                            <a href="{{route('blog')}}">Blog </a>
                                        </li>
                                    </ul><!-- end ul -->
                                </nav>

                                <div class="menu-category" style="margin-right: 20px">
                                    <ul>
                                        <li>
                                            <a href="{{route('browse.all.course')}}">Course <i class="la la-angle-down fs-12"></i></a>
                                            <ul class="cat-dropdown-menu">
                                                <li>
                                                    <a href="{{route('view.all.project')}}">Recorded Classes</a>
                                                    {{-- <i class="la la-angle-right"></i> --}}
                                                    {{-- <ul class="sub-menu">
                                                        <li><a href="#">All Development</a></li>
                                                        <li><a href="#">Web Development</a></li>
                                                        <li><a href="#">Mobile Apps</a></li>
                                                        <li><a href="#">Game Development</a></li>
                                                        <li><a href="#">Databases</a></li>
                                                        <li><a href="#">Programming Languages</a></li>
                                                        <li><a href="#">Software Testing</a></li>
                                                        <li><a href="#">Software Engineering</a></li>
                                                        <li><a href="#">E-Commerce</a></li>
                                                    </ul> --}}
                                                </li>
                                                {{-- <li>
                                                    <a href="course-grid.html">business <i class="la la-angle-right"></i></a>
                                                    <ul class="sub-menu">
                                                        <li><a href="#">All Business</a></li>
                                                        <li><a href="#">Finance</a></li>
                                                        <li><a href="#">Entrepreneurship</a></li>
                                                        <li><a href="#">Strategy</a></li>
                                                        <li><a href="#">Real Estate</a></li>
                                                        <li><a href="#">Home Business</a></li>
                                                        <li><a href="#">Communications</a></li>
                                                        <li><a href="#">Industry</a></li>
                                                        <li><a href="#">Other</a></li>
                                                    </ul>
                                                </li> --}}

                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <nav class="main-menu">
                                    <ul>
                                        <li>
                                            <a href="{{route('contact')}}">Contact </a>
                                        </li>
                                    </ul><!-- end ul -->
                                </nav><!-- end main-menu -->
                                <div class="shop-cart mr-4">
                                    <ul>
                                        <li>
                                            <p class="shop-cart-btn d-flex align-items-center">
                                                <i class="la la-shopping-cart"></i>
                                                <span class="product-count" id="cartQty">0</span>
                                            </p>
                                            <ul class="cart-dropdown-menu">
                                                <div id="miniCart">

                                                </div>
                                                <li class="media media-card">
                                                    <div class="media-body fs-16">
                                                        <p class="text-black font-weight-semi-bold lh-18">Total: &#8358; <span class="cart-total" id="cartSubTotal"></span></p>
                                                    </div>
                                                <li>
                                                    <a href="" class="btn btn-danger theme-btn w-100">Go to Cart <i class="la la-arrow-right icon ml-1"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div><!-- end shop-cart -->
                                <div class="nav-right-button">
                                    <a href="#" class="btn theme-btn d-none d-lg-inline-block" id="datetime">Admission</a>
                                </div><!-- end nav-right-button -->
                            </div><!-- end menu-wrapper -->
                        </div><!-- end col-lg-10 -->
                    </div><!-- end row -->
                </div>
            </div><!-- end container-fluid -->
        </div><!-- end header-menu-content -->
        <div class="off-canvas-menu custom-scrollbar-styled main-off-canvas-menu">
            <div class="off-canvas-menu-close main-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="left" title="Close menu">
                <i class="la la-times"></i>
            </div><!-- end off-canvas-menu-close -->
            <ul class="generic-list-item off-canvas-menu-list pt-90px">
                <li>
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li>
                    <a href="#">courses</a>
                    <ul class="sub-menu">
                        <li><a href="course-grid.html">course grid</a></li>
                        <li><a href="course-list.html">course list</a></li>
                        <li><a href="course-grid-left-sidebar.html">grid left sidebar</a></li>
                        <li><a href="course-grid-right-sidebar.html">grid right sidebar</a></li>
                        <li><a href="course-list-left-sidebar.html">list left sidebar <span class="ribbon ribbon-blue-bg">New</span></a></li>
                        <li><a href="course-list-right-sidebar.html">list right sidebar <span class="ribbon ribbon-blue-bg">New</span></a></li>
                        <li><a href="course-details.html">course details</a></li>
                        <li><a href="lesson-details.html">lesson details</a></li>
                        <li><a href="my-courses.html">My courses</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Student</a>
                    <ul class="sub-menu">
                        <li><a href="student-detail.html">student detail</a></li>
                        <li><a href="student-quiz.html">take quiz</a></li>
                        <li><a href="student-quiz-results.html">quiz results</a></li>
                        <li><a href="student-quiz-result-details.html">quiz details</a></li>
                        <li><a href="student-quiz-result-details-2.html">quiz details 2</a></li>
                        <li><a href="student-path.html">path details</a></li>
                        <li><a href="student-path-assessment.html">Skill Assessment</a></li>
                        <li><a href="student-path-assessment-result.html">Skill result</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">blog</a>
                    <ul class="sub-menu">
                        <li><a href="blog-full-width.html">blog full width </a></li>
                        <li><a href="blog-no-sidebar.html">blog no sidebar</a></li>
                        <li><a href="blog-left-sidebar.html">blog left sidebar</a></li>
                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                        <li><a href="blog-single.html">blog detail</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- end off-canvas-menu -->
        <div class="off-canvas-menu custom-scrollbar-styled category-off-canvas-menu">
            <div class="off-canvas-menu-close cat-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip" data-placement="left" title="Close menu">
                <i class="la la-times"></i>
            </div>
            @php
                $categories = App\Models\Category::latest()->get();
                $courses = App\Models\Course::latest()->get();
            @endphp<!-- end off-canvas-menu-close -->
            <ul class="generic-list-item off-canvas-menu-list pt-90px">
                <li>
                    <a href="course-grid.html">Category</a>
                    <ul class="sub-menu">
                        @foreach ($categories as $item)
                            <li><a href="#">{{$item->category_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="course-grid.html">Course</a>
                    <ul class="sub-menu">
                        @foreach ($courses as $item)
                            <li><a href="#">{{$item->course_name}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

        </div><!-- end off-canvas-menu -->
        <div class="mobile-search-form">
            <div class="d-flex align-items-center">
                <form method="post" class="flex-grow-1 mr-3" action="{{route('search.course')}}">
                    <div class="form-group mb-0">
                       <form method="POST" action="{{route('search.course')}}">
                        @csrf
                        <input class="form-control form--control pl-3" type="text" name="search" placeholder="Search Courses">
                        <span><button type="submit" class="la la-search search-icon"></button></span>
                       </form>
                    </div>
                </form>
                <div class="search-bar-close icon-element icon-element-sm shadow-sm">
                    <i class="la la-times"></i>
                </div><!-- end off-canvas-menu-close -->
            </div>
        </div><!-- end mobile-search-form -->
        <div class="body-overlay"></div>
        <script>
            function updateDateTime() {
                const now = new Date();
                const date = now.toLocaleDateString();
                const time = now.toLocaleTimeString();

                document.getElementById('datetime').innerHTML = `${date} ${time}`;
            }

            setInterval(updateDateTime, 1000);
            updateDateTime();
        </script>
    </header>
    <!-- end header-menu-area -->
    <!--======================================
        END HEADER AREA
======================================-->

    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area section-padding img-bg-2">
        <div class="overlay"></div>
        <div class="container">
            <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
                <div class="section-heading">
                    <h2 class="section__title text-white">Sign Up</h2>
                </div>
                <ul
                    class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                    <li><a href="index.html">Home</a></li>
                    <li>Pages</li>
                    <li>Register</li>
                </ul>
            </div><!-- end breadcrumb-content -->
        </div><!-- end container -->
    </section><!-- end breadcrumb-area -->
    <!-- ================================
    END BREADCRUMB AREA
================================= -->

    <!-- ================================
       START CONTACT AREA
================================= -->
    <section class="contact-area section--padding position-relative">
        <span class="ring-shape ring-shape-1"></span>
        <span class="ring-shape ring-shape-2"></span>
        <span class="ring-shape ring-shape-3"></span>
        <span class="ring-shape ring-shape-4"></span>
        <span class="ring-shape ring-shape-5"></span>
        <span class="ring-shape ring-shape-6"></span>
        <span class="ring-shape ring-shape-7"></span>
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title text-center fs-24 lh-35 pb-4">Register Your Account!</h3>
                            <div class="section-block"></div>
                            <form method="post" class="pt-4" action="{{ route('register') }}">
                                @csrf
                                {{-- <div class="text-center pt-3 pb-4">
                                    <div class="icon-element icon-element-md fs-25 shadow-sm">Or</div>
                                </div> --}}
                                <div class="input-box">
                                    <label class="label-text">Name</label>
                                    <div class="form-group">
                                        <input class="form-control form--control @error('name')is-invalid @enderror"
                                            type="text" name="name" placeholder="Name">
                                        <span class="la la-user input-icon"></span>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-box">
                                    <label class="label-text">Email</label>
                                    <div class="form-group">
                                        <input class="form-control form--control @error('email')is-invalid @enderror"
                                            type="email" name="email" placeholder="Email">
                                        <span class="la la-user input-icon"></span>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div><!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Password</label>
                                    <div class="input-group mb-3">
                                        <span class="la la-lock input-icon"></span>
                                        <input
                                            class="form-control form--control @error('password')is-invalid @enderror password-field"
                                            type="password" name="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <button class="btn theme-btn theme-btn-transparent toggle-password"
                                                type="button">
                                                <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                    viewBox="0 0 24 24" width="22px" fill="#7f8897">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z" />
                                                </svg>
                                                <svg class="eye-off" xmlns="http://www.w3.org/2000/svg"
                                                    height="22px" viewBox="0 0 24 24" width="22px"
                                                    fill="#7f8897">
                                                    <path
                                                        d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z"
                                                        fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <!-- end input-box -->
                                <div class="input-box">
                                    <label class="label-text">Confirm Password</label>
                                    <div class="input-group mb-3">
                                        <span class="la la-lock input-icon"></span>
                                        <input
                                            class="form-control form--control @error('password_confirmation')is-invalid @enderror password-field"
                                            type="password" name="password_confirmation" placeholder="Password">
                                        <div class="input-group-append">
                                            <button class="btn theme-btn theme-btn-transparent toggle-password"
                                                type="button">
                                                <svg class="eye-on" xmlns="http://www.w3.org/2000/svg" height="22px"
                                                    viewBox="0 0 24 24" width="22px" fill="#7f8897">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5C19.17 14.87 15.79 17 12 17s-7.17-2.13-8.82-5.5C4.83 8.13 8.21 6 12 6m0-2C7 4 2.73 7.11 1 11.5 2.73 15.89 7 19 12 19s9.27-3.11 11-7.5C21.27 7.11 17 4 12 4zm0 5c1.38 0 2.5 1.12 2.5 2.5S13.38 14 12 14s-2.5-1.12-2.5-2.5S10.62 9 12 9m0-2c-2.48 0-4.5 2.02-4.5 4.5S9.52 16 12 16s4.5-2.02 4.5-4.5S14.48 7 12 7z" />
                                                </svg>
                                                <svg class="eye-off" xmlns="http://www.w3.org/2000/svg"
                                                    height="22px" viewBox="0 0 24 24" width="22px"
                                                    fill="#7f8897">
                                                    <path
                                                        d="M0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0zm0 0h24v24H0V0z"
                                                        fill="none" />
                                                    <path
                                                        d="M12 6c3.79 0 7.17 2.13 8.82 5.5-.59 1.22-1.42 2.27-2.41 3.12l1.41 1.41c1.39-1.23 2.49-2.77 3.18-4.53C21.27 7.11 17 4 12 4c-1.27 0-2.49.2-3.64.57l1.65 1.65C10.66 6.09 11.32 6 12 6zm-1.07 1.14L13 9.21c.57.25 1.03.71 1.28 1.28l2.07 2.07c.08-.34.14-.7.14-1.07C16.5 9.01 14.48 7 12 7c-.37 0-.72.05-1.07.14zM2.01 3.87l2.68 2.68C3.06 7.83 1.77 9.53 1 11.5 2.73 15.89 7 19 12 19c1.52 0 2.98-.29 4.32-.82l3.42 3.42 1.41-1.41L3.42 2.45 2.01 3.87zm7.5 7.5l2.61 2.61c-.04.01-.08.02-.12.02-1.38 0-2.5-1.12-2.5-2.5 0-.05.01-.08.01-.13zm-3.4-3.4l1.75 1.75c-.23.55-.36 1.15-.36 1.78 0 2.48 2.02 4.5 4.5 4.5.63 0 1.23-.13 1.77-.36l.98.98c-.88.24-1.8.38-2.75.38-3.79 0-7.17-2.13-8.82-5.5.7-1.43 1.72-2.61 2.93-3.53z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="btn-box">
                                    <div class="d-flex align-items-center justify-content-between pb-4">
                                        <div class="custom-control custom-checkbox fs-15">
                                            <input type="checkbox" class="custom-control-input"
                                                id="rememberMeCheckbox" required>
                                            <label class="custom-control-label custom--control-label"
                                                for="rememberMeCheckbox">Remember Me</label>
                                        </div><!-- end custom-control -->
                                        {{-- <a href="recover.html" class="btn-text">Forgot my password?</a> --}}
                                    </div>
                                    <button class="btn theme-btn" type="submit">Register Account <i
                                            class="la la-arrow-right icon ml-1"></i></button>
                                    <p class="fs-14 pt-2">Already have an account? <a href="{{route('login')}}"
                                            class="text-color hover-underline">Login</a></p>
                        </div><!-- end btn-box -->
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-7 -->
        </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end contact-area -->
    <!-- ================================
       END CONTACT AREA
================================= -->

    <!-- ================================
         END FOOTER AREA
================================= -->
<section class="footer-area pt-100px bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold pb-2">Company</h3>
                    <div class="divider border-bottom-0"><span></span></div>
                    <ul class="generic-list-item">
                        <li><a href="{{route('about')}}">About us</a></li>
                        <li><a href="{{route('contact')}}">Contact us</a></li>
                        <li><a href="#">Become an Instructor</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="{{route('blog')}}">Blog</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold pb-2">Courses</h3>
                    <div class="divider border-bottom-0"><span></span></div>
                    <ul class="generic-list-item">
                        @foreach ($courses as $item)
                        <li><a href="{{ url('course/details/' . $item->id . '/' . $item->course_name_slug) }}">{{$item->course_name}}</a></li>
                        @endforeach

                        {{-- <li><a href="#">Hacking</a></li>
                        <li><a href="#">PHP Learning</a></li>
                        <li><a href="#">Spoken English</a></li>
                        <li><a href="#">Self-Driving Car</a></li>
                        <li><a href="#">Garbage Collectors</a></li> --}}
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold pb-2">Download App</h3>
                    <div class="divider border-bottom-0"><span></span></div>
                    <div class="mobile-app">
                        <p class="pb-3 lh-24">Download our mobile app and learn on the go.</p>
                        <a href="#" class="d-block mb-2 hover-s"><img src="{{asset('frontend/images/appstore.png')}}"
                                alt="App store" class="img-fluid"></a>
                        <a href="#" class="d-block hover-s"><img src="{{asset('frontend/images/googleplay.png')}}"
                                alt="Google play store" class="img-fluid"></a>
                    </div>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold pb-2">Newsletter</h3>
                    <div class="divider border-bottom-0"><span></span></div>
                    <form method="post" class="subscriber-form">
                        <p class="pb-3 lh-24">Want us to email you about special offers & updates?</p>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form--control pl-3"
                                placeholder="Enter email address">
                            <button class="btn theme-btn w-100 mt-3" type="button">Subscribe <i
                                    class="la la-arrow-right icon ml-1"></i></button>
                        </div>
                    </form>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block"></div>
    <div class="copyright-content py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="d-flex flex-wrap align-items-center">
                        <a href="index.html" class="pr-4">
                            <img src="{{asset('frontend/images/logo.png')}}" alt="footer logo" class="footer__logo">
                        </a>
                        <p class="copy-desc">Copyright &copy; <?= date('Y') ?> <a href="https://techydevs.com/">TechyDevs</a>
                            Inc.</p>
                    </div>
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="d-flex flex-wrap align-items-center justify-content-end">
                        <ul class="generic-list-item d-flex flex-wrap align-items-center fs-14">
                            <li class="mr-3"><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                            <li class="mr-3"><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>
                        <div class="select-container select-container-sm">
                            <select class="select-container-select">
                                <option value="1">English</option>
                                <option value="2">Deutsch</option>
                                <option value="3">Español</option>
                                <option value="4">Français</option>
                                <option value="5">Bahasa Indonesia</option>
                                <option value="6">Bangla</option>
                                <option value="7">日本語</option>
                                <option value="8">한국어</option>
                                <option value="9">Nederlands</option>
                                <option value="10">Polski</option>
                                <option value="11">Português</option>
                                <option value="12">Română</option>
                                <option value="13">Русский</option>
                                <option value="14">ภาษาไทย</option>
                                <option value="15">Türkçe</option>
                                <option value="16">中文(简体)</option>
                                <option value="17">中文(繁體)</option>
                                <option value="17">Hindi</option>
                            </select>
                        </div>
                    </div>
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end copyright-content -->
</section><!-- end footer-area -->
    <!-- ================================
          END FOOTER AREA
================================= -->

    <!-- start scroll top -->
    <div id="scroll-top">
        <i class="la la-arrow-up" title="Go top"></i>
    </div>
    <!-- end scroll top -->

    <!-- template js files -->
    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/waypoint.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
