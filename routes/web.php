<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoryCategory;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\InstructorController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\StudentProjectController as BackendStudentProjectController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\CourseController as FrontendCourseController;
use App\Http\Controllers\Frontend\EnrollCourseController;
use App\Http\Controllers\Frontend\PayPalController;
use App\Http\Controllers\Frontend\StudentProjectController;
use App\Http\Controllers\Frontend\WishListController;
use App\Http\Controllers\Frontend\SubcriberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserController::class, 'Index'])->name('index');

// Route::get('/', function () {
//     return view('welcome');
// });

// Admin Route
Route::middleware(['auth', 'roles:user', 'verified'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
});

// Route::get('/dashboard', function () {
//     return view('frontend.dashboard.user_dashboard');
// })->middleware(['auth', 'roles:user', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/user/profile/update', [UserController::class, 'UserProfileUpdate'])->name('user.profile.update');
    Route::get('/user/logout', [UserController::class, 'UserLogout2'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/user/password/update', [UserController::class, 'UserPasswordUpdate'])->name('user.password.update');

    // User WishList Routes
    Route::controller(WishListController::class)->group(function () {
        Route::get('/user/wishlist', 'AllWishlist')->name('user.wishlist');
        Route::get('/get-wishlist-course/', 'GetWishlistCourse');
        Route::get('/wishlist-remove/{id}', 'RemoveWishlist');
    });
    // User Enroll Routes
    Route::controller(EnrollCourseController::class)->group(function () {
        Route::get('/user/enroll/course', 'UserEnrollCourse')->name('user.enroll.courses');
        Route::get('/user/purchase/history', 'UserPurchaseHistory')->name('user.purchase.history');
        // Route::get('/wishlist-remove/{id}','RemoveWishlist');
    });
});

require __DIR__ . '/auth.php';

// Admin Route
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/change/password', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    // Category All Routes
    Route::controller(CategoryCategory::class)->group(function () {
        Route::get('/admin/all/category', 'AllCategory')->name('all.category');
        Route::get('/admin/add/category', 'AddCategory')->name('add.category');
        Route::post('/admin/store/category', 'StoreCategory')->name('store.category');
        Route::get('/admin/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/admin/update/category', 'UpdateCategory')->name('update.category');
        Route::get('/admin/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    // Courses All Routes
    Route::controller(CourseController::class)->group(function () {
        Route::get('/admin/all/courses', 'AllCourse')->name('all.courses');
        Route::get('/admin/add/courses', 'AddCourse')->name('add.courses');
        Route::post('/admin/store/course', 'StoreCourse')->name('store.course');
        Route::get('/admin/edit/course/{id}', 'EditCourse')->name('edit.course');
        Route::post('/admin/update/course', 'UpdateCourse')->name('update.course');
        Route::get('/admin/delete/course/{id}', 'DeleteCourse')->name('delete.course');
        Route::get('/admin/add/course/bronchure', 'AddCourseBronchure')->name('add.bronchure');
        Route::post('/admin/store/course/bronchure', 'StoreCourseBronchure')->name('store.bronchure');
        Route::get('/admin/student/course', 'StudentCourse')->name('student.course');
        // Route::get('/admin/course/download_bronchure/{id}', 'DownloadBronchure')->name('download_bronchure');
    });
    // Admin Dasboard routes statistics
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/registered/students', 'RegisterStudent')->name('register.students');
        Route::get('/admin/enrolled/students', 'EnrolledStudent')->name('enrolled.students');
        Route::get('/admin/total/course', 'TotalCourse')->name('total.course');
        Route::get('/admin/total/blog', 'TotalBlog')->name('total.blog');
    });
    //// Admin Review All Route
    Route::controller(ReviewController::class)->group(function () {
        Route::get('/admin/pending/review', 'AdminPendingReview')->name('admin.pending.review');
        Route::post('/update/review/status', 'UpdateReviewStatus')->name('update.review.status');
        Route::get('/admin/active/review', 'AdminActiveReview')->name('admin.active.review');
    });
    // Admin Testimonial Route
    Route::controller(TestimonialController::class)->group(function () {
        Route::get('/admin/all/testimonial', 'AllTestimonial')->name('all.testimonial');
        Route::get('/admin/add/testimonial', 'AddTestimonial')->name('add.testimonial');
        Route::post('/store/testimonial', 'StoreTestimonial')->name('store.testimonial');
        Route::get('/edit/testimonial/{id}', 'EditTestimonial')->name('edit.testimonial');
        Route::post('/update/testimonial', 'UpdateTestimonial')->name('update.testimonial');
        Route::get('/delete/testimonial/{id}', 'DeleteTestimonial')->name('delete.testimonial');
    });

    // Admin Instructor Route
    Route::controller(InstructorController::class)->group(function () {
        Route::get('/admin/all/instructor', 'AllInstructor')->name('all.instructor');
        Route::get('/admin/add/instructor', 'AddInstructor')->name('add.instructor');
        Route::post('/store/instructor', 'StoreInstructor')->name('store.instructor');
        Route::get('/edit/instructor/{id}', 'EditInstructor')->name('edit.instructor');
        Route::post('/update/instructor', 'UpdateInstructor')->name('update.instructor');
        Route::get('/delete/instructor/{id}', 'DeleteInstructor')->name('delete.instructor');
    });

    // Admin Blog Category Route
    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog/category', 'AllBlogCategory')->name('blog.category');
        Route::post('/blog/category/store', 'StoreBlogCategory')->name('blog.category.store');
        Route::get('/edit/blog/category/{id}', 'EditBlogCategory');
        Route::post('/blog/category/update', 'UpdateBlogCategory')->name('blog.category.update');
        Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
        Route::get('/blog/post', 'BlogPost')->name('blog.post');
        Route::get('/add/blog/post', 'AddBlogPost')->name('add.blog.post');
        Route::post('/store/blog/post', 'StoreBlogPost')->name('store.blog.post');
        Route::get('/edit/post/{id}', 'EditBlogPost')->name('edit.post');
        Route::post('/update/blog/post', 'UpdateBlogPost')->name('update.blog.post');
        Route::get('/delete/post/{id}', 'DeleteBlogPost')->name('delete.post');
        Route::get('/admin/blog/comment', 'AdminBlogComment')->name('admin.blog.comment');
        Route::get('/admin/comment/reply/{id}', [BlogController::class, 'AdminCommentReply'])->name('admin.comment.reply');
        Route::post('/reply/message', [BlogController::class, 'ReplyMessage'])->name('reply.message');
    });
    // Student Project routes  ----  view.all.project
    Route::controller(BackendStudentProjectController::class)->group(function () {
        Route::get('/admin/all/student/projects', 'AllStudentPoject')->name('all.student.project');
        Route::get('/admin/add/student/project', 'AddStudentProject')->name('add.student.project');
        Route::post('/admin/store/student/project', 'StoreStudentProject')->name('store.student.project');
        Route::get('/admin/edit/student/project/{id}', 'EditStudentProject')->name('edit.student.project');
        Route::post('/admin/update/student/project', 'UpdateStudentProject')->name('update.student.project');
        Route::get('//admin/delete/student/project/{id}', 'DeleteStudentProject')->name('delete.student.project');
        // Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory')->name('add.course');
    });

    // Course Outlines All Routes
    Route::controller(CourseController::class)->group(function () {
        Route::get('/admin/all/course/outlines', 'AllCourseOutlines')->name('all.course.outline');
        Route::get('/admin/add/course/outlines', 'AddCourseOutline')->name('add.course.outline');
        Route::post('/admin/store/course/outlines', 'StoreCourseOutline')->name('store.course.outline');
        Route::get('/admin/edit/course/outlines/{id}', 'EditCourseOutline')->name('edit.course.outline');
        Route::post('/admin/update/course/outlines', 'UpdateCourseOutline')->name('update.course.outline');
        Route::get('//admin/delete/course/outlines/{id}', 'DeleteCourseOutline')->name('delete.course.outline');
        // Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory')->name('add.course');
    });
    // Course Benefits Routes
    Route::controller(CourseController::class)->group(function () {
        Route::get('/admin/all/course/benefits', 'AllCourseBenefits')->name('all.course.benefits');
        // Route::get('/admin/add/course/outlines', 'AddCourseOutline')->name('add.course.outline');
    });

    // All Users Routes
    Route::controller(BackendUserController::class)->group(function () {
        Route::get('/admin/all/users', 'AllUsers')->name('all.users');
        Route::get('/admin/all/enrolled/users', 'AllEnrolledUsers')->name('all.enrolled.users');
        // Route::get('/admin/edit/user/{id}', 'EditUser')->name('edit.user');
    });
});

// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// General User Route
Route::get('/view/all/project', [StudentProjectController::class, 'ViewAllProject'])->name('view.all.project');

// Course Route
Route::get('/course/details/{id}/{slug}', [FrontendCourseController::class, 'CourseDetails']);

// WishList Route
Route::post('/add-to-wishlist/{course_id}', [WishListController::class, 'AddToWishList']);

// Review Route
Route::post('/store/review', [ReviewController::class, 'StoreReview'])->name('store.review');

// Blog Details Route
Route::get('/blog/details/{slug}', [BlogController::class, 'BlogDetails']);

// Blog Category List Route
Route::get('/blog/cat/list/{id}', [BlogController::class, 'BlogCatList']);

// Blog Route
Route::get('/blog', [BlogController::class, 'BlogList'])->name('blog');

// Download Bronchure Route
Route::get('/course/download_bronchure/{id}', [FrontendCourseController::class, 'DownloadBronchure'])->name('download_bronchure');

Route::post('/store/comment', [CommentController::class, 'StoreComment'])->name('store.comment');

// browse.all.course
Route::get('/browse/all/courses', [FrontendCourseController::class, 'BrowseAllCourse'])->name('browse.all.course');

// Search route
Route::post('/search/courses', [FrontendCourseController::class, 'SearchCourse'])->name('search.course');

// Category Course routes
Route::get('/category/course/list/{id}', [FrontendCourseController::class, 'CategoryCourses']);

// Enroll course routes
Route::get('/enroll/course/{course_id}', [FrontendCourseController::class, 'EnrollCourse'])->name('enroll.course');

// Contact routes
Route::get('/contact', [UserController::class, 'ContactUs'])->name('contact');

// About routes
Route::get('/about', [UserController::class, 'AboutUs'])->name('about');

// PayPal Payment routes
Route::post('/buy/course/paypal', [PayPalController::class, 'PayPal'])->name('paypal');
Route::get('/success', [PayPalController::class, 'Success'])->name('success');
Route::get('/cancel', [PayPalController::class, 'Cancel'])->name('cancel');

// Subscriber route
Route::post('/subscribe', [SubcriberController::class, 'Subscribe'])->name('store.subscriber');
