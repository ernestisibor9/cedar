<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
     </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.dashboard')}}" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class='bx bx-radio-circle'></i>Default</a>
                </li>
                <li> <a href="index2.html"><i class='bx bx-radio-circle'></i>Alternate</a>
                </li>
                <li> <a href="index3.html"><i class='bx bx-radio-circle'></i>Graphical</a>
                </li>
            </ul>
        </li>

        <li class="menu-label">UI Elements</li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manage Course</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.courses') }}"><i class='bx bx-radio-circle'></i>All Courses</a>
                </li>
                <li> <a href="{{route('add.courses')}}"><i class='bx bx-radio-circle'></i>Add Course</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Course Outline</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.course.outline') }}"><i class='bx bx-radio-circle'></i>All Course Outline</a>
                </li>
                <li> <a href="{{route('add.course.outline')}}"><i class='bx bx-radio-circle'></i>Add Course Outline</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Student's Project</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.student.project') }}"><i class='bx bx-radio-circle'></i>All Student Projects</a>
                </li>
                <li> <a href="{{route('add.student.project')}}"><i class='bx bx-radio-circle'></i>Add Student Project</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Course Benefits</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.course.benefits') }}"><i class='bx bx-radio-circle'></i>All Course Benefits</a>
                </li>
                {{-- <li> <a href="{{route('add.course.outline')}}"><i class='bx bx-radio-circle'></i>Add Course Outline</a>
                </li> --}}
            </ul>
        </li>
                <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manage Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.category') }}"><i class='bx bx-radio-circle'></i>All Category</a>
                </li>
                <li> <a href="{{route('add.category')}}"><i class='bx bx-radio-circle'></i>Add Category</a>
                </li>
                </li>
            </ul>
        </li>
        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manage Course</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.course') }}"><i class='bx bx-radio-circle'></i>All Courses</a>
                </li>
                <li> <a href="{{route('add.courses')}}"><i class='bx bx-radio-circle'></i>Add Course</a>
                </li>
            </ul>
        </li>  --}}

        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manage Course</div>
            </a>
            <ul>
                <li> <a href="{{ route('all.course') }}"><i class='bx bx-radio-circle'></i>All Courses</a>
                </li>
                <li> <a href="{{route('add.courses')}}"><i class='bx bx-radio-circle'></i>Add Course</a>
                </li>
            </ul>
        </li> --}}

        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manage Orders</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.pending.order') }}"><i class='bx bx-radio-circle'></i>Pending Orders</a>
                </li>
                <li> <a href="{{route('admin.confirm.order')}}"><i class='bx bx-radio-circle'></i>Confirm Orders</a>
                </li>
            </ul>
        </li> --}}

        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manage Report</div>
            </a>
            <ul>
                <li> <a href="{{ route('report.view') }}"><i class='bx bx-radio-circle'></i>Report View</a>
                </li>
            </ul>
        </li> --}}

        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Manage Blog</div>
            </a>
            <ul>
                <li> <a href="{{ route('blog.category') }}"><i class='bx bx-radio-circle'></i>Blog Category</a>
                </li>
                <li> <a href="{{ route('blog.post') }}"><i class='bx bx-radio-circle'></i>Blog Post</a>
                </li>
            </ul>
        </li> --}}

        {{-- <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Bought Courses</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.all.course') }}"><i class='bx bx-radio-circle'></i>All Courses</a>
                </li>
                <li> <a href="{{route('add.courses')}}"><i class='bx bx-radio-circle'></i>Add Course</a>
                </li>
            </ul>
        </li> --}}

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Content</div>
            </a>
            <ul>
                <li> <a href="content-grid-system.html"><i class='bx bx-radio-circle'></i>Grid System</a>
                </li>
                <li> <a href="content-typography.html"><i class='bx bx-radio-circle'></i>Typography</a>
                </li>
                <li> <a href="content-text-utilities.html"><i class='bx bx-radio-circle'></i>Text Utilities</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{route('all.users')}}">
                <div class="parent-icon"><i class='bx bx-code-alt'></i>
                </div>
                <div class="menu-title">All Users</div>
            </a>
        </li>

        {{-- <li>
            <a href="form-froala-editor.html">
                <div class="parent-icon"><i class='bx bx-code-alt'></i>
                </div>
                <div class="menu-title">Froala Editor</div>
            </a>
        </li> --}}
        <li class="menu-label">Forms & Tables</li>

        <li class="menu-label">Pages</li>

        <li>
            <a href="faq.html">
                <div class="parent-icon"><i class="bx bx-help-circle"></i>
                </div>
                <div class="menu-title">FAQ</div>
            </a>
        </li>
        <li>
            <a href="pricing-table.html">
                <div class="parent-icon"><i class="bx bx-diamond"></i>
                </div>
                <div class="menu-title">Pricing</div>
            </a>
        </li>
        <li class="menu-label">Charts & Maps</li>

        <li class="menu-label">Others</li>

        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
