<style>
    .main-menu{
        margin-right: 40px !important;
    }
</style>

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
                                 <li class="d-flex align-items-center"><i class="la la-user mr-1"></i><a href="{{route('dashboard')}}"> Dashboard</a></li>
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
