@extends('frontend.dashboard.user_dashboard')
@section('userdashboard')
    @php
        $id = Auth::user()->id;
        $purchaseHistory = App\Models\Payment::where('user_id', $id)
            ->latest()
            ->get();
    @endphp

    <div class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between mb-5">
        <div class="media media-card align-items-center">
            <div class="media-img media--img media-img-md rounded-full">
                <img class="rounded-full"
                    src="{{ !empty($profileData->photo) ? url('upload/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                    alt="Student thumbnail image">
            </div>
            <div class="media-body">
                <h2 class="section__title fs-30">Hello, {{ $profileData->name }}</h2>

            </div><!-- end media-body -->
        </div><!-- end media -->

    </div><!-- end breadcrumb-content -->

    <div class="section-block mb-5"></div>
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">Purchase History</h3>
    </div>
    <div class="table-responsive mb-5">
        <table class="table generic-table">
            <thead>
                <tr>
                    <th scope="col">Payment ID</th>
                    <th scope="col">Course Image</th>
                    <th scope="col">Course Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Payment Method</th>
                    <th scope="col">Date</th>
                    <th scope="col">Payment Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($purchaseHistory as $key => $item)
                @if ($item->course)
                <tr>
                    <td>{{$item->payment_id}}</td>
                    <td><img src="{{asset($item->course->course_image) }}" class="product-img-2"
                        alt="product img" width="80px" height="60px">
                    </td>
                    <td>{{$item->course->course_title}}</td>
                    <td>${{$item->amount}}</td>
                    <td>{{$item->payment_method}}</td>
                    <td>{{ $item->created_at->format('M d Y') }} </td>
                    <td><span class="badge bg-success text-white">{{$item->payment_status}}</span></td>
                </tr>
                @else
                <p>Your purchase history is empty</p>
                @endif
                @endforeach
            </tbody>
        </table>
    </div><!-- end tab-pane -->
@endsection
