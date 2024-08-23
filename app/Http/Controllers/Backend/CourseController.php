<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\CourseOutline;
use App\Models\DownloadCourse;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    // AllCourse
    public function AllCourse()
    {
        $courses = Course::latest()->get();
        return view('admin.backend.course.all_courses', compact('courses'));
    }
    // AddCourse
    public function AddCourse()
    {
        $categories = Category::latest()->get();
        return view('admin.backend.course.add_course', compact('categories'));
    }
    // Store Course
    public function StoreCourse(Request $request)
    {

        $request->validate([
            'course_name' => 'required | min:3',
            'course_title' => 'required | min:3',
            'video' => 'required|mimes:mp4,mpeg',
            'course_image' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:2048', // PDF files, maximum 2MB
        ]);

        $image = $request->file('course_image');
        $filename = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('upload/courses/thumbnail/'), $filename);
        $save_url = 'upload/courses/thumbnail/' . $filename;

        $video = $request->file('video');
        $filename = time() . '.' . $video->getClientOriginalName();
        $video->move(public_path('upload/courses/video/'), $filename);
        $save_video = 'upload/courses/video/' . $filename;

        $pdfPath = $request->file('pdf_file');
        $filename = date('YmdHi') . $pdfPath->getClientOriginalName();
        $pdfPath->move(public_path('upload/bronchure'), $filename);

        $course_id = Course::insertGetId([
            'category_id' => $request->category_id,
            'course_title' => $request->course_title,
            'course_name' => $request->course_name,
            'course_name_slug' => Str::slug($request->course_name),
            'description' => $request->description,
            'video' => $save_video,
            'duration' => $request->duration,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'language' => $request->language,
            'level' => $request->level,
            'course_outlines' => $request->course_outlines,
            'course_benefits' => $request->course_benefits,
            'start_date' => $request->start_date,
            'course_image' => $save_url,
            'created_at' => Carbon::now()
        ]);
        // Insert Data into Download Bronchure table
        DownloadCourse::insert([
            'course_id' => $course_id,
            'pdf_file' => $filename,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Course Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.courses')->with($notification);
    }
    public function EditCourse($id)
    {
        $course = Course::find($id);
        $categories = Category::latest()->get();
        return view('admin.backend.course.edit_course', compact('categories', 'course'));
    }
    // UpdateCourseImage
    public function UpdateCourse(Request $request)
    {
        $course_id = $request->course_id;
        $oldImage = $request->old_img;
        $oldVideo = $request->old_vid;

        if($request->file('course_image')){
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            $image = $request->file('course_image');
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('upload/courses/thumbnail/'), $filename);
            $save_url = 'upload/courses/thumbnail/' . $filename;

            if (file_exists($oldImage)) {
                unlink($oldImage);
            }

            Course::find($course_id)->update([
                'category_id' => $request->category_id,
                'course_title' => $request->course_title,
                'course_name' => $request->course_name,
                'course_name_slug' => Str::slug($request->course_name),
                'description' => $request->description,
                // 'video' => $save_video,
                'duration' => $request->duration,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'language' => $request->language,
                'level' => $request->level,
                'course_outlines' => $request->course_outlines,
                'course_benefits' => $request->course_benefits,
                'start_date' => $request->start_date,
                'course_image' => $save_url,
                'updated_at' => Carbon::now()
            ]);
        }
        else if($request->file('video')){
            if (file_exists($oldVideo)) {
                unlink($oldVideo);
            }

            $video = $request->file('video');
            $filename = time() . '.' . $video->getClientOriginalName();
            $video->move(public_path('upload/courses/video/'), $filename);
            $save_video = 'upload/courses/video/' . $filename;

            if (file_exists($oldVideo)) {
                unlink($oldVideo);
            }

            Course::find($course_id)->update([
                'category_id' => $request->category_id,
                'course_title' => $request->course_title,
                'course_name' => $request->course_name,
                'course_name_slug' => Str::slug($request->course_name),
                'description' => $request->description,
                'video' => $save_video,
                'duration' => $request->duration,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'language' => $request->language,
                'level' => $request->level,
                'course_outlines' => $request->course_outlines,
                'course_benefits' => $request->course_benefits,
                'start_date' => $request->start_date,
                'updated_at' => Carbon::now()
            ]);
        }
        else{
            Course::find($course_id)->update([
                'category_id' => $request->category_id,
                'course_title' => $request->course_title,
                'course_name' => $request->course_name,
                'course_name_slug' => Str::slug($request->course_name),
                'description' => $request->description,
                'duration' => $request->duration,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'language' => $request->language,
                'level' => $request->level,
                'course_outlines' => $request->course_outlines,
                'course_benefits' => $request->course_benefits,
                'start_date' => $request->start_date,
                'updated_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Course Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.courses')->with($notification);
    }
    // DeleteCourse
    public function DeleteCourse($id){
        $course = Course::find($id);
        $oldImage = $course->old_img;
        $oldVideo = $course->old_vid;

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        if (file_exists($oldVideo)) {
            unlink($oldVideo);
        }

        Course::find($id)->delete();
        $notification = array(
           'message' => 'Course deleted Successfully',
            'alert-type' => 'error'
        );
        return redirect()->route('all.courses')->with($notification);
    }
    // AddCourseBronchure
    public function AddCourseBronchure()
    {
        $courses = Course::latest()->get();
        return view('admin.backend.course.add_course_bronchure', compact('courses'));
    }
    // StoreCourseBronchure
    public function StoreCourseBronchure(Request $request){
        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:2048', // PDF files, maximum 2MB
            'course_id' => 'required',
            ]);

            $pdfPath = $request->file('pdf_file');
            $filename = date('YmdHi') . $pdfPath->getClientOriginalName();
            $pdfPath->move(public_path('upload/bronchure'), $filename);
            // You can store the $pdfPath in your database if needed
            // $dateOfUpload = date('Y-m-d', strtotime($request->date_upload));

            DownloadCourse::insert([
                'course_id' => $request->course_id,
                'pdf_file' => $filename,
                'created_at' => Carbon::now()
            ]);
            $notification = array(
                'message'=> 'Course Bronchure uploaded successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
    }
    // StudentCourse
    public function StudentCourse(){
        $courses = Payment::latest()->get();
        return view('admin.backend.course.student_course', compact('courses'));
    }
    // DownloadBronchure
    // public function DownloadBronchure($id)
    // {
    //     $download = DownloadCourse::find($id);
    //     $pdfPath = public_path('upload/bronchure/'. $download->pdf_file);
    //     return response()->download($pdfPath, $download->pdf_file);
    // }
    // DeleteCourseBronchure
    // public function DeleteCourseBronchure($id)
    // {
    //     $download = DownloadCourse::find($id);
    //     $filePath = public_path('upload/bronchure/'. $download->pdf_file);
    //     if (file_exists($filePath)) {
    //         unlink($filePath);
    //     }
    //     DownloadCourse::find($id)->delete();
    //     $notification = array(
    //        'message' => 'Course Bronchure deleted Successfully',
    //         'alert-type' => 'error'
    //     );
    //     return redirect()->route('all.course.bronchure')->with($notification);
    // }
    // AddCourseOutline
    // public function AddCourseOutline()
    // {
    //     return view('admin.backend.course_outline.add_course_outlines');
    // }
    // // StoreCourseOutline
    // public function StoreCourseOutline(Request $request)
    // {
    //     $request->validate([
    //         'course_outlines' => 'required | min:3',
    //     ]);
    //     CourseOutline::insert([
    //         'course_outlines' => $request->course_outlines,
    //         'created_at' => Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message' => 'Course Outline Inserted Successfully',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('all.course.outline')->with($notification);
    // }
    // //EditCourseOutline
    // public function EditCourseOutline($id)
    // {
    //     $courseOutline = CourseOutline::find($id);
    //     return view('admin.backend.course_outline.edit_course_outline', compact('courseOutline'));
    // }
    // // UpdateCourseOutline
    // public function UpdateCourseOutline(Request $request)
    // {
    //     $cid = $request->id;

    //     CourseOutline::find($cid)->update([
    //         'course_outlines' => $request->course_outlines,
    //         'updated_at' => Carbon::now(),
    //     ]);

    //     $notification = array(
    //         'message' => 'Course Outline Updated Successfully',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('all.course.outline')->with($notification);
    // }
    // // DeleteCourseOutline
    // public function DeleteCourseOutline($id)
    // {
    //     $deleteId = CourseOutline::findOrFail($id);
    //     CourseOutline::findOrFail($id)->delete();

    //     $notification = array(
    //         'message' => 'CourseOutline Deleted Successfully',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->back()->with($notification);
    // }
    // //c AllCourseBenefits
    // public function AllCourseBenefits()
    // {
    //     return view('admin.backend.course_benefit.all_course_benefits');
    // }
}
