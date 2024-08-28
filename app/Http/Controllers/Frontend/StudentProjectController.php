<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\StudentProject;
use Illuminate\Http\Request;

class StudentProjectController extends Controller
{
    // ViewAllProject
    public function ViewAllProject()
    {
        $studentProjects = StudentProject::latest()->paginate(4);
        return view('frontend.project.student_project', compact('studentProjects'));
    }
}
