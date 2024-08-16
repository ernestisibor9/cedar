@extends('admin.admin_dashboard')

@section('admin')

@php
    $registeredStudents = App\Models\User::where('role', 'user')->get();
    $enrollStudents = App\Models\Payment::latest()->get();
    $totalCourses = App\Models\Course::latest()->get();
    $blogPost = App\Models\BlogPost::latest()->get();
@endphp


<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
       <div class="col">
         <div class="card radius-10 border-start border-0 border-4 border-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Registered Students</p>
                        <h4 class="my-1 text-info">{{count($registeredStudents )}}</h4>
                        <p class="mb-0 font-13">Total registered students</p>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-user-plus'></i>
                    </div>
                </div>
            </div>
         </div>
       </div>
       <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-danger">
           <div class="card-body">
               <div class="d-flex align-items-center">
                   <div>
                       <p class="mb-0 text-secondary">Enrolled Students</p>
                       <h4 class="my-1 text-danger">{{count($enrollStudents)}}</h4>
                       <p class="mb-0 font-13">Total enrolled students</p>
                   </div>
                   <div class="widgets-icons-2 rounded-circle bg-gradient-burning text-white ms-auto"><i class='bx bxs-user-plus'></i>
                   </div>
               </div>
           </div>
        </div>
      </div>
      <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-success">
           <div class="card-body">
               <div class="d-flex align-items-center">
                   <div>
                       <p class="mb-0 text-secondary">Total Course</p>
                       <h4 class="my-1 text-success">{{count($totalCourses)}}</h4>
                       <p class="mb-0 font-13">Total number of courses</p>
                   </div>
                   <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bxs-book' ></i>
                   </div>
               </div>
           </div>
        </div>
      </div>
      <div class="col">
        <div class="card radius-10 border-start border-0 border-4 border-warning">
           <div class="card-body">
               <div class="d-flex align-items-center">
                   <div>
                       <p class="mb-0 text-secondary">Total Blog Post</p>
                       <h4 class="my-1 text-warning">{{count($blogPost)}}</h4>
                       <p class="mb-0 font-13">Total Blog Post</p>
                   </div>
                   <div class="widgets-icons-2 rounded-circle bg-gradient-orange text-white ms-auto"><i class='bx bxs-comment'></i>
                   </div>
               </div>
           </div>
        </div>
      </div>
    </div><!--end row-->

<!--end row-->
{{--
     <div class="card radius-10">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Recent Orders</h6>
                </div>

            </div>
        </div>
             <div class="card-body">
             <div class="table-responsive">
               <table class="table align-middle mb-0">
                <thead class="table-light">
                 <tr>
                   <th>Product</th>
                   <th>Photo</th>
                   <th>Product ID</th>
                   <th>Status</th>
                   <th>Amount</th>
                   <th>Date</th>
                   <th>Shipping</th>
                 </tr>
                 </thead>
                 <tbody><tr>
                  <td>Iphone 5</td>
                  <td><img src="{{asset('backend/assets/images/products/01.png')}}" class="product-img-2" alt="product img"></td>
                  <td>#9405822</td>
                  <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
                  <td>$1250.00</td>
                  <td>03 Feb 2020</td>
                  <td><div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
                      </div></td>
                 </tr>

                 <tr>
                  <td>Earphone GL</td>
                  <td><img src="assets/images/products/02.png" class="product-img-2" alt="product img"></td>
                  <td>#8304620</td>
                  <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
                  <td>$1500.00</td>
                  <td>05 Feb 2020</td>
                  <td><div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
                      </div></td>
                 </tr>

                 <tr>
                  <td>HD Hand Camera</td>
                  <td><img src="{{asset('backend/assets/images/products/03.png')}}" class="product-img-2" alt="product img"></td>
                  <td>#4736890</td>
                  <td><span class="badge bg-gradient-bloody text-white shadow-sm w-100">Failed</span></td>
                  <td>$1400.00</td>
                  <td>06 Feb 2020</td>
                  <td><div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 70%"></div>
                      </div></td>
                 </tr>

                 <tr>
                  <td>Clasic Shoes</td>
                  <td><img src="{{asset('backend/assets/images/products/04.png')}}" class="product-img-2" alt="product img"></td>
                  <td>#8543765</td>
                  <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">Paid</span></td>
                  <td>$1200.00</td>
                  <td>14 Feb 2020</td>
                  <td><div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-gradient-quepal" role="progressbar" style="width: 100%"></div>
                      </div></td>
                 </tr>
                 <tr>
                  <td>Sitting Chair</td>
                  <td><img src="{{asset('backend/assets/images/products/06.png')}}" class="product-img-2" alt="product img"></td>
                  <td>#9629240</td>
                  <td><span class="badge bg-gradient-blooker text-white shadow-sm w-100">Pending</span></td>
                  <td>$1500.00</td>
                  <td>18 Feb 2020</td>
                  <td><div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-gradient-blooker" role="progressbar" style="width: 60%"></div>
                      </div></td>
                 </tr>
                 <tr>
                  <td>Hand Watch</td>
                  <td><img src="{{asset('backend/assets/images/products/05.png')}}" class="product-img-2" alt="product img"></td>
                  <td>#8506790</td>
                  <td><span class="badge bg-gradient-bloody text-white shadow-sm w-100">Failed</span></td>
                  <td>$1800.00</td>
                  <td>21 Feb 2020</td>
                  <td><div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-gradient-bloody" role="progressbar" style="width: 40%"></div>
                      </div></td>
                 </tr>
                </tbody>
              </table>
              </div>
             </div>
        </div> --}}

<!--end row-->
<!--end row-->

</div>

@endsection
