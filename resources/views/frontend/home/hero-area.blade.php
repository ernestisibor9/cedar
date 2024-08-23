<style>
    .hero-area {
        height: 600px !important;
    }

    .slide.active {
        opacity: 1;
    }
</style>

<section class="hero-area">
    <div class="hero-slider owl-action-styled">
        <div class="hero-slider-item hero-bg-1 slide">

            <div class="container">
                <div class="hero-content">
                    <div class="section-heading">
                        <h2 class="section__title text-white fs-65 lh-80 pb-3">Start Learning Coding <br> From Home With
                            Expert <br>Instructors</b></h2>
                        <p class="section__desc text-white pb-4">We are providing high-quality online courses to
                            improve your skills.
                            <br>Our instructors are highly experienced and experts.
                        </p>
                    </div><!-- end section-heading -->
                    <div class="hero-btn-box d-flex flex-wrap align-items-center pt-1">
                        <a href="admission.html" class="btn theme-btn mr-4 mb-4">Join with Us <i
                                class="la la-arrow-right icon ml-1"></i></a>
                        <a href="#" class="btn-text video-play-btn mb-4" data-fancybox
                            data-src="https://www.youtube.com/watch?v=cRXm1p-CNyk">
                            Watch Preview<i class="la la-play icon-btn ml-2"></i>
                        </a>
                    </div><!-- end hero-btn-box -->
                </div><!-- end hero-content -->
            </div><!-- end container -->
        </div><!-- end hero-slider-item -->
        <div class="hero-slider-item hero-bg-2 slide">
            <div class="container">
                <div class="hero-content text-center">
                    <div class="section-heading">
                        <h2 class="section__title text-white fs-65 lh-80 pb-3">Join Cedar & Get <br> Your Free Courses!
                        </h2>
                        <p class="section__desc text-white pb-4">Join us at Cedar to get free and premium courses
                            <br>
                        </p>
                    </div><!-- end section-heading -->
                    <div class="hero-btn-box d-flex flex-wrap align-items-center pt-1 justify-content-center">
                        <a href="admission.html" class="btn theme-btn mr-4 mb-4">Get Started <i
                                class="la la-arrow-right icon ml-1"></i></a>
                        <a href="#" class="btn-text video-play-btn mb-4" data-fancybox
                            data-src="https://www.youtube.com/watch?v=cRXm1p-CNyk">
                            Watch Preview<i class="la la-play icon-btn ml-2"></i>
                        </a>
                    </div><!-- end hero-btn-box -->
                </div><!-- end hero-content -->
            </div><!-- container -->
        </div><!-- end hero-slider-item -->
        <div class="hero-slider-item hero-bg-3 slide">
            <div class="container">
                <div class="hero-content text-right">
                    <div class="section-heading">
                        <h2 class="section__title text-white fs-65 lh-80 pb-3">Our Classes Are Weekends Only <br> Except
                            Holidays
                        </h2>
                        <p class="section__desc text-white pb-4">Our learning days will never affect your chil's school
                            work, rather it
                            <br>will boost their confidence in problem-solving ability.
                        </p>
                    </div>
                    <div class="hero-btn-box d-flex flex-wrap align-items-center pt-1 justify-content-end">
                        <a href="#" class="btn-text video-play-btn mr-4 mb-4" data-fancybox
                            data-src="https://www.youtube.com/watch?v=cRXm1p-CNyk">
                            <i class="la la-play icon-btn mr-2"></i>Watch Preview
                        </a>
                        <a href="admission.html" class="btn theme-btn mb-4"><i
                                class="la la-arrow-left icon mr-1"></i>Get Enrolled </a>
                    </div><!-- end hero-btn-box -->
                </div><!-- end hero-content -->
            </div><!-- container -->
        </div><!-- end hero-slider-item -->
    </div><!-- end hero-slide -->
</section>

<script>
    // script.js
    document.addEventListener("DOMContentLoaded", function() {
        const slides = document.querySelectorAll(".slide");
        let currentIndex = 0;
        const slideInterval = 2000; // 5 seconds

        function showNextSlide() {
            slides[currentIndex].classList.remove("active");
            currentIndex = (currentIndex + 1) % slides.length;
            slides[currentIndex].classList.add("active");
        }

        // Start the slideshow
        slides[currentIndex].classList.add("active");
        setInterval(showNextSlide, slideInterval);
    });
</script>
