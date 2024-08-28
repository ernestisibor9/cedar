<div class="off-canvas-menu-close dashboard-menu-close icon-element icon-element-sm shadow-sm" data-toggle="tooltip"
    data-placement="left" title="Close menu">
    <i class="la la-times"></i>
</div><!-- end off-canvas-menu-close -->
<div class="logo-box px-4">
    <a href="index.html" class="logo"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"></a>
</div>
<ul class="generic-list-item off-canvas-menu-list off--canvas-menu-list pt-35px">
    <li class="page-active"><a href="{{ route('dashboard') }}"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg"
                height="18px" viewBox="0 0 24 24" width="18px">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                    d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z" />
            </svg> Dashboard</a></li>
    <li><a href="{{ route('user.profile') }}"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18px"
                viewBox="0 0 24 24" width="18px">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                    d="M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z" />
            </svg> My Profile</a></li>
    <li><a href="{{ route('user.enroll.courses') }}"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg"
                height="18px" viewBox="0 0 24 24" width="18px">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                    d="M8 16h8v2H8zm0-4h8v2H8zm6-10H6c-1.1 0-2 .9-2 2v16c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm4 18H6V4h7v5h5v11z" />
            </svg> My Courses</a></li>
    <li><a href="{{ route('user.wishlist') }}"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18px"
                viewBox="0 0 24 24" width="18px">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path d="M17 3H7c-1.1 0-2 .9-2 2v16l7-3 7 3V5c0-1.1-.9-2-2-2zm0 15l-5-2.18L7 18V5h10v13z" />
            </svg> Wishlist <span class="badge badge-info p-1 ml-2" id="wishQty">2</span> </a></li>

    {{-- <li><a href="{{route('user.change.password')}}"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg> Change Password</a></li> --}}
    <li>
        <a href="{{ route('user.change.password') }}">
            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                    d="M12 17a2 2 0 11-.001-3.999A2 2 0 0112 17zm6-7V7a6 6 0 10-12 0v3H4v10h16V10h-2zm-8-3a4 4 0 018 0v3H8V7zm10 10H6V10h12v7z" />
            </svg>
            Change Password
        </a>
    </li>
    <li><a href="{{ route('user.purchase.history') }}"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg"
                height="18px" viewBox="0 0 24 24" width="18px">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                    d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
            </svg> Purchase History</a></li>
    <li><a href="{{ route('user.logout') }}"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18px"
                viewBox="0 0 24 24" width="18px">
                <path d="M0 0h24v24H0V0z" fill="none" />
                <path
                    d="M13 3h-2v10h2V3zm4.83 2.17l-1.42 1.42C17.99 7.86 19 9.81 19 12c0 3.87-3.13 7-7 7s-7-3.13-7-7c0-2.19 1.01-4.14 2.58-5.42L6.17 5.17C4.23 6.82 3 9.26 3 12c0 4.97 4.03 9 9 9s9-4.03 9-9c0-2.74-1.23-5.18-3.17-6.83z" />
            </svg> Logout</a></li>
    {{-- <li><a href="javascript:void(0)" data-toggle="modal" data-target="#deleteModal"><svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 0 24 24" width="18px"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg> Delete Account</a></li> --}}
</ul>
