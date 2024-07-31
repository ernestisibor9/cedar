<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryCategory;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\StudentProjectController as BackendStudentProjectController;
use App\Http\Controllers\Frontend\CourseController as FrontendCourseController;
use App\Http\Controllers\Frontend\StudentProjectController;
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
Route::middleware(['auth', 'roles:user', 'verified'])->group(function(){
    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
});

// Route::get('/dashboard', function () {
//     return view('frontend.dashboard.user_dashboard');
// })->middleware(['auth', 'roles:user', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Route
Route::middleware(['auth', 'roles:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/change/password', [AdminController::class, 'AdminPasswordUpdate'])->name('admin.password.update');

    // Category All Routes
    Route::controller(CategoryCategory::class)->group(function(){
        Route::get('/admin/all/category', 'AllCategory')->name('all.category');
        Route::get('/admin/add/category', 'AddCategory')->name('add.category');
        Route::post('/admin/store/category', 'StoreCategory')->name('store.category');
        Route::get('/admin/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/admin/update/category', 'UpdateCategory')->name('update.category');
        Route::get('/admin/delete/category/{id}', 'DeleteCategory')->name('delete.category');
    });

    // Courses All Routes
    Route::controller(CourseController::class)->group(function(){
        Route::get('/admin/all/courses', 'AllCourse')->name('all.courses');
        Route::get('/admin/add/courses', 'AddCourse')->name('add.courses');
        Route::post('/admin/store/course', 'StoreCourse')->name('store.course');
        Route::get('/admin/edit/course/{id}', 'EditCourse')->name('edit.course');
        Route::post('/admin/update/course', 'UpdateCourse')->name('update.course');
        Route::get('/admin/delete/course/{id}', 'DeleteCourse')->name('delete.course');
        // Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory')->name('add.course');
        // Route::post('/admin/store/course', 'StoreCourse')->name('store.course');
        // Route::get('/admin/edit/course/{id}', 'EditCourse')->name('edit.course');
        // Route::post('/admin/update/course', 'UpdateCourse')->name('update.course');
        // Route::post('/update/course/image', 'UpdateCourseImage')->name('update.course.image');
        // Route::post('/update/course/video', 'UpdateCourseVideo')->name('update.course.video');
        // Route::post('/update/course/goal', 'UpdateCourseGoal')->name('update.course.goal');
        // Route::get('//admin/delete/course/{id}', 'DeleteCourse')->name('delete.course');
    });
    // Student Project routes  ----  view.all.project
    Route::controller(BackendStudentProjectController::class)->group(function(){
        Route::get('/admin/all/student/projects', 'AllStudentPoject')->name('all.student.project');
        Route::get('/admin/add/student/project', 'AddStudentProject')->name('add.student.project');
        Route::post('/admin/store/student/project', 'StoreStudentProject')->name('store.student.project');
        Route::get('/admin/edit/student/project/{id}', 'EditStudentProject')->name('edit.student.project');
        Route::post('/admin/update/student/project', 'UpdateStudentProject')->name('update.student.project');
        Route::get('//admin/delete/student/project/{id}', 'DeleteStudentProject')->name('delete.student.project');
        // Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory')->name('add.course');
        // Route::post('/admin/store/course', 'StoreCourse')->name('store.course');
        // Route::get('/admin/edit/course/{id}', 'EditCourse')->name('edit.course');
        // Route::post('/admin/update/course', 'UpdateCourse')->name('update.course');
        // Route::post('/update/course/image', 'UpdateCourseImage')->name('update.course.image');
        // Route::post('/update/course/video', 'UpdateCourseVideo')->name('update.course.video');
        // Route::post('/update/course/goal', 'UpdateCourseGoal')->name('update.course.goal');
        // Route::get('//admin/delete/course/{id}', 'DeleteCourse')->name('delete.course');
    });

    // Course Outlines All Routes
    Route::controller(CourseController::class)->group(function(){
        Route::get('/admin/all/course/outlines', 'AllCourseOutlines')->name('all.course.outline');
        Route::get('/admin/add/course/outlines', 'AddCourseOutline')->name('add.course.outline');
        Route::post('/admin/store/course/outlines', 'StoreCourseOutline')->name('store.course.outline');
        Route::get('/admin/edit/course/outlines/{id}', 'EditCourseOutline')->name('edit.course.outline');
        Route::post('/admin/update/course/outlines', 'UpdateCourseOutline')->name('update.course.outline');
        Route::get('//admin/delete/course/outlines/{id}', 'DeleteCourseOutline')->name('delete.course.outline');
        // Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory')->name('add.course');
        // Route::post('/admin/store/course', 'StoreCourse')->name('store.course');
        // Route::get('/admin/edit/course/{id}', 'EditCourse')->name('edit.course');
        // Route::post('/admin/update/course', 'UpdateCourse')->name('update.course');
        // Route::post('/update/course/image', 'UpdateCourseImage')->name('update.course.image');
        // Route::post('/update/course/video', 'UpdateCourseVideo')->name('update.course.video');
        // Route::post('/update/course/goal', 'UpdateCourseGoal')->name('update.course.goal');
        // Route::get('//admin/delete/course/{id}', 'DeleteCourse')->name('delete.course');
    }); // all.course.benefits
    // Course Benefits Routes
    Route::controller(CourseController::class)->group(function(){
        Route::get('/admin/all/course/benefits', 'AllCourseBenefits')->name('all.course.benefits');
        // Route::get('/admin/add/course/outlines', 'AddCourseOutline')->name('add.course.outline');
        // Route::post('/admin/store/course/outlines', 'StoreCourseOutline')->name('store.course.outline');
        // Route::get('/admin/edit/course/outlines/{id}', 'EditCourseOutline')->name('edit.course.outline');
        // Route::post('/admin/update/course/outlines', 'UpdateCourseOutline')->name('update.course.outline');
        // Route::get('//admin/delete/course/outlines/{id}', 'DeleteCourseOutline')->name('delete.course.outline');
        // Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory')->name('add.course');
        // Route::post('/admin/store/course', 'StoreCourse')->name('store.course');
        // Route::get('/admin/edit/course/{id}', 'EditCourse')->name('edit.course');
        // Route::post('/admin/update/course', 'UpdateCourse')->name('update.course');
        // Route::post('/update/course/image', 'UpdateCourseImage')->name('update.course.image');
        // Route::post('/update/course/video', 'UpdateCourseVideo')->name('update.course.video');
        // Route::post('/update/course/goal', 'UpdateCourseGoal')->name('update.course.goal');
        // Route::get('//admin/delete/course/{id}', 'DeleteCourse')->name('delete.course');
    }); // all.course
});

// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

// General User Route
Route::get('/view/all/project', [StudentProjectController::class, 'ViewAllProject'])->name('view.all.project');

// Course Controller
Route::get('/course/details/{id}/{slug}', [FrontendCourseController::class, 'CourseDetails']);
