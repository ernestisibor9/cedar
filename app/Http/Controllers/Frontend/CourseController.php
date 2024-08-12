<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\DownloadCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // CourseDetails
    public function CourseDetails($id, $slug){
        $course = Course::find($id);
        $cat_id = $course->category_id;

        $relatedCourses = Course::where('category_id', $cat_id)->where('id', '!=', $id)->
        orderBy('id', 'DESC')->limit(3)->get();
        ;
        return view('frontend.course.course_details', compact('course', 'relatedCourses'));
    }
    // DownloadBronchure
    public function DownloadBronchure($id)
    {
        $download = DownloadCourse::find($id);
        $pdfPath = public_path('upload/bronchure/'. $download->pdf_file);
        return response()->download($pdfPath, $download->pdf_file);
    }
    // BrowseAllCourse
    public function BrowseAllCourse(){
        $courses = Course::latest()->paginate(6);
        return view('frontend.course.browse_all_course', compact('courses'));
    }
    // Search Course
    public function SearchCourse(Request $request){
        $search = $request->search;
        $courses = Course::where('course_title', 'LIKE', '%'.$search.'%')->orWhere('course_name', 'LIKE', '%'.$search.'%')->paginate(6);
        return view('frontend.course.search_course', compact('courses'));
    }
}
