@php
    $category = App\Models\Category::latest()->limit(6)->get();
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
        START CATEGORY AREA
======================================-->
<section class="category-area pb-90px">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="category-content-wrap">
                    <div class="section-heading text-center">
                        <h5 class="ribbon ribbon-lg mb-2">Categories</h5>
                        <h2 class="section__title">Popular Categories</h2>
                        <span class="section-divider"></span>
                    </div><!-- end section-heading -->
                </div>
            </div><!-- end col-lg-9 -->
            <div class="col-lg-3">
                {{-- <div class="category-btn-box text-right">
                    <a href="categories.html" class="btn theme-btn">All Categories <i
                            class="la la-arrow-right icon ></ml-1"></i>
                </div><!-- end category-btn-box--> --}}
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        <div class="category-wrapper mt-30px">
            <div class="row">
                @foreach ($category as $cat)
                    @php
                        $course = App\Models\Course::where('category_id', $cat->id)->get();
                    @endphp
                    <div class="col-lg-4 responsive-column-half">
                        <div class="category-item">
                            <img class="cat__img lazy my-img" src="{{ asset($cat->image) }}"
                                data-src="{{ asset($cat->image) }}" alt="Category image">
                            <div class="category-content">
                                <div class="category-inner">
                                    <h3 class="cat__title"><a href="#">{{ $cat->category_name }}</a></h3>
                                    <p class="cat__meta">{{ count($course) }} courses</p>
                                    {{-- <a href="#" class="btn theme-btn theme-btn-sm theme-btn-white">Explore<i
                                            class="la la-arrow-right icon ml-1"></i></a> --}}
                                </div>

                            </div><!-- end category-content -->
                        </div><!-- end category-item -->
                    </div>
                @endforeach
                <!-- end col-lg-4 --><!-- end col-lg-4 -->
            </div><!-- end row -->
        </div><!-- end category-wrapper -->
    </div><!-- end container -->
</section><!-- end category-area -->
<!--======================================
        END CATEGORY AREA
======================================-->
