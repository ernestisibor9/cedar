<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StudentProject;
use Illuminate\Http\Request;

class StudentProjectController extends Controller
{
    // AllStudentPoject
    public function AllStudentPoject(){
        $studentProjects = StudentProject::latest()->get();
        return view('admin.backend.student_project.all_student_project', compact('studentProjects'));
    }
}
