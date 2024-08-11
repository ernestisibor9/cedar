<style>
    .my-img{
        width: 100%;
        height: 230px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
</style>
@php
$testimonials = App\Models\Testimonial::latest()->get();
@endphp
<section class="testimonial-area section-padding">
    <div class="container">
        <div class="section-heading text-center">
            <h5 class="ribbon ribbon-lg mb-2">Testimonials</h5>
            <h2 class="section__title">Student's Feedback</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
    </div><!-- end container -->
    <div class="container-fluid">
        <div class="testimonial-carousel owl-action-styled">
            @foreach ($testimonials as $testimonial)
            <div class="card card-item">
                <div class="card-body">
                    <div class="media media-card align-items-center pb-3">
                        <div class="media-img avatar-md">
                            <img src="{{ asset($testimonial->photo) }}" alt="Testimonial avatar" class="rounded-full">
                        </div>
                        <div class="media-body">
                            <h5>{{$testimonial->name}}</h5>
                            <div class="d-flex align-items-center pt-1">
                                <span class="lh-18 pr-2">Student</span>
                                {{-- <div class="review-stars">
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                </div> --}}
                            </div>
                        </div>
                    </div><!-- end media -->
                    <p class="card-text">
                        {{$testimonial->message}}
                    </p>
                </div><!-- end card-body -->
            </div>
            @endforeach<!-- end card --><!-- end card -->
        </div><!-- end testimonial-carousel -->
    </div><!-- container-fluid -->
</section>
