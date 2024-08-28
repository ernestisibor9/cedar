<section class="footer-area pt-100px" style="background-color: #374F71">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <a href="index.html">
                        <img src="{{asset('frontend/images/logo.png')}}" alt="footer logo" class="footer__logo">
                    </a>
                    <ul class="generic-list-item pt-4">
                        <li><a href="tel:+447771222476" class="text-white">+44 777 1222 476
                        </a></li>
                        <li><a href="tel:+447771222476" class="text-white">+234 707 2485 480
                        </a></li>
                        <li><a href="mailto:info@cedargrowthconsult.com" class="text-white">info@cedargrowthconsult.com</a></li>
                        <li class="text-white">Cedargrowthconsult</li>
                    </ul>
                    <h3 class="fs-20 font-weight-semi-bold pt-4 pb-2 text-white">We are on</h3>
                    <ul class="social-icons social-icons-styled">
                        <li class="mr-1"><a href="#" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                        <li class="mr-1"><a href="#" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                        <li class="mr-1"><a href="#" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                        <li class="mr-1"><a href="#" class="linkedin-bg"><i class="la la-linkedin"></i></a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold text-white">Company</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="generic-list-item">
                        <li><a href="{{route('about')}}" class="text-white">About us</a></li>
                        <li><a href="{{route('contact')}}" class="text-white">Contact us</a></li>
                        <li><a href="{{route('blog')}}" class="text-white">Blog</a></li>
                        <li><a href="#" class="text-white">Support</a></li>
                        <li><a href="#" class="text-white">FAQs</a></li>
                        <li><a href="{{route('browse.all.course')}}" class="text-white">Course</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div>
            @php
                $courses = App\Models\Course::latest()->get();
            @endphp<!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold text-white">Courses</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="generic-list-item">
                        @foreach ($courses as $course)
                        <li><a href="{{ url('course/details/' . $course->id . '/' . $course->course_name_slug) }}" class="text-white">{{  substr($course->course_name, 0, 20) }}</a></li>
                        @endforeach
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold text-white">Download App</h3>
                    <span class="section-divider section--divider"></span>
                    <div class="mobile-app">
                        <p class="pb-3 lh-24 text-white">Download our mobile app and learn on the go.</p>
                        <a href="#" class="d-block mb-2 hover-s"><img src="{{asset('frontend/images/appstore.png')}}" alt="App store" class="img-fluid"></a>
                        <a href="#" class="d-block hover-s"><img src="{{asset('frontend/images/googleplay.png')}}" alt="Google play store" class="img-fluid"></a>
                    </div>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block"></div>
    <div class="copyright-content py-4 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="copy-desc text-white">&copy; @php
                        echo date('Y')
                    @endphp Cedar Growth Consult. All Rights Reserved. Powered by <a href="https://www.justimagin.com.ng" class="text-white">JUSTIMAGIN</a></p>
                </div><!-- end col-lg-6 -->
                {{-- <div class="col-lg-6">
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
                </div><!-- end col-lg-6 --> --}}
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end copyright-content -->
</section>
