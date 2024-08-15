<!-- ================================
       START BLOG AREA
================================= -->

@php
    $blog = App\Models\BlogPost::latest()->limit(3)->get();
@endphp

<style>
    .my-img{
        width: 100%;
        height: 230px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
</style>

<section class="blog-area section--padding bg-gray overflow-hidden">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">News feeds</h5>
            <h2 class="section__title">Latest News & Articles</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->

        <div class="blog-post-carousel owl-action-styled half-shape mt-30px">
            @foreach ($blog as $item)
            @php
            $comments = App\Models\Comment::where('post_id', $item->id)->get();
            @endphp
            <div class="card card-item">
                <div class="card-image">
                    <a href="{{url('blog/details/'.$item->post_slug)}}" class="d-block">
                        <img class="card-img-top my-img" src="{{asset($item->post_image)}}" alt="Card image cap">
                    </a>
                    <div class="course-badge-labels">
                        <div class="course-badge">{{$item->created_at->format('M d Y')}}</div>
                    </div>
                </div><!-- end card-image -->
                <div class="card-body">
                    <h5 class="card-title"><a href="{{url('blog/details/'.$item->post_slug)}}">{{$item->post_title}}</a></h5>
                    <ul class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center flex-wrap fs-14 pt-2">
                        <li class="d-flex align-items-center">By &nbsp; <a href="#">Cedar</a></li>
                        <li class="d-flex align-items-center"><a href="#">{{count($comments)}} Comments</a></li>
                        {{-- <li class="d-flex align-items-center"><a href="#">130 Likes</a></li> --}}
                    </ul>
                    <div class="d-flex justify-content-between align-items-center pt-3">
                        <a href="{{url('blog/details/'.$item->post_slug)}}" class="btn theme-btn theme-btn-sm theme-btn-white">Read More <i class="la la-arrow-right icon ml-1"></i></a>
                        <div class="share-wrap">
                            <ul class="social-icons social-icons-styled">
                                <li class="mr-0"><a href="#" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                                <li class="mr-0"><a href="#" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                                <li class="mr-0"><a href="#" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                            </ul>
                            <div class="icon-element icon-element-sm shadow-sm cursor-pointer share-toggle" title="Toggle to expand social icons"><i class="la la-share-alt"></i></div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div>
            @endforeach<!-- end card --><!-- end card -->
        </div><!-- end blog-post-carousel -->
    </div><!-- end container -->
</section><!-- end blog-area -->
<!-- ================================
       START BLOG AREA
================================= -->
