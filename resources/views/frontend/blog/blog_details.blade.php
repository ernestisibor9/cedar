@extends('frontend.master')
@section('home')

@section('title')
    Cedar - Blog Details
@endsection
<!-- ================================
        START BREADCRUMB AREA
    ================================= -->
<section class="breadcrumb-area pt-80px pb-80px pattern-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <div class="section-heading pb-3">
                <h2 class="section__title"> {{ $blog->post_title }}</h2>
            </div>
            <ul class="generic-list-item generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="blog-no-sidebar.html">Blog</a></li>
                <li>{{ $blog->post_title }}</li>
            </ul>
            <ul
                class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center flex-wrap fs-14 pt-2">
                <li class="d-flex align-items-center">By<a href="#">Admin</a></li>
                <li class="d-flex align-items-center"> {{ $blog->created_at->format('M d Y') }} </li>
                <li class="d-flex align-items-center"><a href="#comments" class="page-scroll">4 Comments</a></li>
                <li class="d-flex align-items-center">130 Shares</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
        END BREADCRUMB AREA
    ================================= -->

<!-- ================================
           START BLOG AREA
    ================================= -->
<section class="blog-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5">
                <div class="card card-item">
                    <div class="card-body">
                        <img src={{ asset($blog->post_image) }} alt="" class="img-fluid">
                        <p class="card-text pb-3"> {!! $blog->long_descp !!} </p>



                        <div class="section-block"></div>
                        <h3 class="fs-18 font-weight-semi-bold pt-3">Tags</h3>
                        <div class="d-flex flex-wrap justify-content-between align-items-center pt-3">
                            <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">
                                @foreach ($tags_all as $tag)
                                    <li class="mr-2"><a href="#">{{ ucwords($tag) }}</a></li>
                                @endforeach
                            </ul>

                            <div class="share-wrap">
                                <ul class="social-icons social-icons-styled">
                                    <li class="mr-0"><a href="#" class="facebook-bg"><i
                                                class="la la-facebook facebook-share"></i></a></li>
                                    <li class="mr-0"><a href="#" class="twitter-bg"><i
                                                class="la la-twitter twitter-share"></i></a></li>
                                    {{-- <li class="mr-0"><a href="#" class="instagram-bg"><i
                                                    class="la la-instagram instagram-share"></i> --}}
                                    <li class="mr-0"><a href="#" class="whatsapp-bg"><i
                                                class="la la-whatsapp whatsapp-share"></i></a></li>
                                </ul>
                                <div class="icon-element icon-element-sm shadow-sm cursor-pointer share-toggle"
                                    title="Toggle to expand social icons"><i class="la la-share-alt"></i></div>
                            </div>
                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
                {{-- <div class="instructor-wrap py-5">
                        <h3 class="fs-22 font-weight-semi-bold pb-4">About the author</h3>
                        <div class="media media-card">
                            <div class="media-img rounded-full avatar-lg mr-4">
                                <img src="images/img-loading.png" data-src="images/small-avatar-1.jpg" alt="Avatar image"
                                    class="rounded-full lazy">
                            </div>
                            <div class="media-body">
                                <h5>Alex Smith</h5>
                                <span class="d-block lh-18 pt-2 pb-2">www.techydevs.com</span>
                                <p class="pb-3">I'm a growth-oriented digital marketer with a passion for content
                                    marketing, social media marketing wonders, conversion rate optimization, and keyword
                                    research. I strongly support permission marketing and earned media. More than anything
                                </p>
                                <ul class="social-icons social-icons-styled social--icons-styled">
                                    <li><a href="#"><i class="la la-facebook"></i></a></li>
                                    <li><a href="#"><i class="la la-twitter"></i></a></li>
                                    <li><a href="#"><i class="la la-instagram"></i></a></li>
                                    <li><a href="#"><i class="la la-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- end instructor-wrap --> --}}
                @php
                    $comment = App\Models\Comment::where('post_id', $blog->id)
                        ->where('parent_id', null)
                        ->limit(5)
                        ->get();
                @endphp
                <div class="section-block"></div>
                <div class="comments-wrap pt-5" id="comments">
                    <div class="d-flex align-items-center justify-content-between pb-4">
                        <h3 class="fs-22 font-weight-semi-bold">Comments</h3>
                        <span class="ribbon ribbon-lg">4</span>
                    </div>
                    @foreach ($comment as $com)
                        <div class="comment-list">
                            <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                <div class="media-img mr-4 rounded-full">
                                    <img class="rounded-full lazy"
                                        src="{{ !empty($com->user->photo) ? url('upload/user_images/' . $com->user->photo) : url('upload/no_image2.jpeg') }}"
                                        data-src="images/small-avatar-1.jpg" alt="User image">
                                </div>
                                <div class="media-body">
                                    <h5 class="pb-2">{{ $com->user->name }}</h5>
                                    <span class="d-block lh-18 pb-2">{{ $com->created_at->format('M d Y') }}</span>
                                    <p class="pb-3">{{ $com->message }}</p>
                                    <div class="helpful-action d-flex align-items-center justify-content-between">
                                        <a class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30" href="#"
                                            data-toggle="modal" data-target="#replyModal"><i
                                                class="la la-reply mr-1"></i> Reply</a>
                                        <div class="pl-2">
                                            <span class="fs-13">Was this review helpful?</span>
                                            <button class="btn">Yes</button>
                                            <button class="btn">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $reply = App\Models\Comment::where('parent_id', $com->id)->get();
                            @endphp
                            @foreach ($reply as $rep)
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4 review-reply">
                                    <div class="media-img mr-4 rounded-full">
                                        <img class="rounded-full lazy" src="{{ url('upload/no_image2.jpeg') }}"
                                            data-src="{{ url('upload/no_image2.jpeg') }}" alt="User image">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="pb-2">Jitesh Shaw</h5>
                                        <span class="d-block lh-18 pb-2">{{ $rep->created_at->format('M d Y') }}</span>
                                        <p class="pb-3">{{ $rep->message }}</p>
                                        <div class="helpful-action d-flex align-items-center justify-content-between">
                                            <a class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30"
                                                href="#" data-toggle="modal" data-target="#replyModal"><i
                                                    class="la la-reply mr-1"></i> Reply</a>
                                            <div class="pl-2">
                                                <span class="fs-13">Was this review helpful?</span>
                                                <button class="btn">Yes</button>
                                                <button class="btn">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- end media -->
                            {{-- <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                            <div class="media-img mr-4 rounded-full">
                                <img class="rounded-full lazy" src="images/img-loading.png" data-src="images/small-avatar-3.jpg" alt="User image">
                            </div>
                            <div class="media-body">
                                <h5 class="pb-2">Miguel Sanches</h5>
                                <span class="d-block lh-18 pb-2">2 month ago</span>
                                <p class="pb-3">This is one of the best courses I have taken in Udemy. It is very complete, and it has made continue learning about Java and SQL databases as well.</p>
                                <div class="helpful-action d-flex align-items-center justify-content-between">
                                    <a class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30" href="#" data-toggle="modal" data-target="#replyModal"><i class="la la-reply mr-1"></i> Reply</a>
                                    <div class="pl-2">
                                        <span class="fs-13">Was this review helpful?</span>
                                        <button class="btn">Yes</button>
                                        <button class="btn">No</button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end media --> --}}
                        </div>
                    @endforeach
                    {{-- <div class="load-more-btn-box text-center pt-3 pb-5">
                            <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30"><i
                                    class="la la-refresh mr-1"></i> Load More Comment</button>
                        </div> --}}
                </div>
                <div class="section-block"></div>
                <div class="add-comment-wrap pt-5">
                    <h3 class="fs-22 font-weight-semi-bold pb-4">Add a Comment</h3>
                    @auth
                        <form method="post" action="{{ route('store.comment') }}" class="row">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $blog->id }}">
                            <div class="input-box col-lg-12">
                                <label class="label-text">Subject</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="subject"
                                        placeholder="Subject">
                                    <span class="la la-pen input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <!-- end input-box -->
                            <div class="input-box col-lg-12">
                                <label class="label-text">Message</label>
                                <div class="form-group">
                                    <textarea class="form-control form--control pl-3" name="message" placeholder="Write Message" rows="5"></textarea>
                                </div>
                            </div><!-- end input-box -->
                            <div class="btn-box col-lg-12"><!-- end custom-control -->
                                <button class="btn theme-btn" type="submit">Submit Comment</button>
                            </div><!-- end btn-box -->
                        </form>
                    @else
                        <p>
                        <p>Please <a href="{{ route('login') }}" class="font-weight-bold">Login</a> to add a comment.</p>
                        <p>Don't have an account? <a href="{{ route('register') }}" class="font-weight-bold">Register</a>
                            for free.</p>
                        </p>
                    @endauth
                </div><!-- end add-comment-wrap -->
            </div><!-- end col-lg-8 -->
            <div class="col-lg-4">
                <div class="sidebar">

                    <!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">Blog Category</h3>
                            <div class="divider"><span></span></div>
                            <ul class="generic-list-item">
                                @foreach ($bcategory as $cat)
                                    <li><a
                                            href="{{ url('blog/cat/list/' . $cat->id) }}">{{ $cat->category_name }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div><!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">Recent Posts</h3>
                            <div class="divider"><span></span></div>
                            @foreach ($post as $dpost)
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <a href="{{ url('blog/details/' . $dpost->post_slug) }}" class="media-img">
                                        <img class="mr-3" src="{{ asset($dpost->post_image) }}"
                                            alt="Related course image">
                                    </a>
                                    <div class="media-body">
                                        <h5 class="fs-15"><a
                                                href="{{ url('blog/details/' . $dpost->post_slug) }}">{{ $dpost->post_title }}</a>
                                        </h5>
                                        <span class="d-block lh-18 py-1 fs-14">Cedar</span>
                                        <p class="text-black font-weight-semi-bold lh-18 fs-15">$12.99 <span
                                                class="before-price fs-14">$129.99</span></p>
                                    </div>
                                </div>
                            @endforeach
                            <!-- end media -->
                            <!-- end media -->
                            <div class="view-all-course-btn-box">
                                <a href="blog-no-sidebar.html" class="btn theme-btn w-100">View All Posts <i
                                        class="la la-arrow-right icon ml-1"></i></a>
                            </div>
                        </div>
                    </div><!-- end card -->
                    <!-- end card -->
                    {{-- <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Post Tags</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15">
                                    <li class="mr-2"><a href="#">Business</a></li>
                                    <li class="mr-2"><a href="#">Event</a></li>
                                    <li class="mr-2"><a href="#">Video</a></li>
                                    <li class="mr-2"><a href="#">Audio</a></li>
                                    <li class="mr-2"><a href="#">Software</a></li>
                                    <li class="mr-2"><a href="#">Conference</a></li>
                                    <li class="mr-2"><a href="#">Marketing</a></li>
                                    <li class="mr-2"><a href="#">Freelance</a></li>
                                    <li class="mr-2"><a href="#">Tips</a></li>
                                    <li class="mr-2"><a href="#">Technology</a></li>
                                    <li class="mr-2"><a href="#">Entrepreneur</a></li>
                                </ul>
                            </div>
                        </div><!-- end card --> --}}
                    <!-- end card -->
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="card-title fs-18 pb-2">Connect & Follow</h3>
                            <div class="divider"><span></span></div>
                            <ul class="social-icons social-icons-styled social--icons-styled">
                                <li><a href="#"><i class="la la-facebook"></i></a></li>
                                <li><a href="#"><i class="la la-twitter"></i></a></li>
                                <li><a href="#"><i class="la la-instagram"></i></a></li>
                                <li><a href="#"><i class="la la-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div><!-- end card -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
           START BLOG AREA
    ================================= -->


<script>
    // script.js
    document.addEventListener("DOMContentLoaded", function() {
        const facebookShareBtn = document.querySelector(".facebook-share");
        const twitterShareBtn = document.querySelector(".twitter-share");
        const whatsappShareBtn = document.querySelector(".whatsapp-share");
        // const instagramShareBtn = document.querySelector(".instagram-share");

        // Facebook share functionality
        facebookShareBtn.addEventListener("click", function(event) {
            event.preventDefault();
            // Replace URL and other parameters with your actual content
            window.open(
                "https://www.facebook.com/sharer/sharer.php?u=http://localhost:8000/blog/details/{{ $blog->post_slug }}",
                "_blank");
        });

        // Twitter share functionality
        twitterShareBtn.addEventListener("click", function(event) {
            event.preventDefault();
            // Replace URL and other parameters with your actual content
            window.open(
                "https://twitter.com/intent/tweet?url=http://localhost:8000/blog/details/{{ $blog->post_slug }}&text=",
                "_blank");
        });

        // WhatsApp share functionality
        whatsappShareBtn.addEventListener("click", function(event) {
            event.preventDefault();
            // Replace URL and other parameters with your actual content
            window.open(
                "https://api.whatsapp.com/send?text=%20-%20http://localhost:8000/blog/details/{{ $blog->post_slug }}",
                "_blank");
        });
    })
</script>
@endsection
