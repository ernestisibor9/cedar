<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
}
