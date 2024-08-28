@extends('frontend.master')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('home')

@section('title')
    Cedar - Enroll Course
@endsection

<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between">
            <div class="section-heading">
                <h2 class="section__title text-white">{{ $eid->course_name }}</h2>
            </div>
            <ul
                class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Courses</li>
                <li>Course Grid</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section>

<section class="cart-area section--padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="card-title fs-22 pb-3 text-center">Pay With PayPal</h3>
                        <div class="divider"><span></span></div>
                        <form method="post" action="{{ route('paypal') }}" class="row">
                            @csrf
                            <div>
                                <input type="hidden" name="course_id" value="{{ $eid->id }}">
                            </div>
                            <div class="input-box col-lg-12">
                                <label class="label-text">Course Name</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="course_name"
                                        value="{{ $eid->course_name }}">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-12">
                                <label class="label-text">Price</label>
                                <div class="form-group">
                                    <h5>${{ number_format($eid->selling_price, 2) }}</h5>
                                    <input class="form-control form--control" type="text" name="price"
                                        value="{{ $eid->selling_price }}" hidden>
                                    {{-- <span class="la la-money input-icon"></span> --}}
                                </div>
                            </div>
                            <div class="input-box col-lg-12">
                                <label class="label-text">Course Image</label>
                                <div class="form-group">
                                    <img src="{{ asset($eid->course_image) }}" alt="" width="100px"
                                        height="80px" name='course_image'>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-12">
                                <div class="form-group">
                                    <input class="form-control form--control" type="hidden" name="quantity">
                                </div>
                            </div>
                            <!-- end input-box --><!-- end input-box --><!-- end input-box --><!-- end input-box -->
                            <div class="input-box col-lg-12">
                                <button type="submit" class="btn theme-btn w-100">Pay With PayPal <i
                                        class="la la-arrow-right icon ml-1"></i></button>
                            </div><!-- end btn-box -->
                        </form>
                    </div><!-- end card-body -->
                </div><!-- end card --><!-- end card -->
            </div><!-- end col-lg-7 --><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection
