<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollCourseController extends Controller
{
    // UserEnrollCourse
    public function UserEnrollCourse(){
        return view('frontend.enrollcourse.enroll_course');
    }
    // UserPurchaseHistory
    public function UserPurchaseHistory(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('frontend.enrollcourse.purchase_history', compact('profileData'));
    }
}
