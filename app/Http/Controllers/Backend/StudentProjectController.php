<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StudentProject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentProjectController extends Controller
{
    // AllStudentPoject
    public function AllStudentPoject(){
        $studentProjects = StudentProject::latest()->get();
        return view('admin.backend.student_project.all_student_project', compact('studentProjects'));
    }
    // AddStudentProject
    public function AddStudentProject(){
        return view('admin.backend.student_project.add_student_project');
    }
    // StoreStudentProject
    public function StoreStudentProject(Request $request){
        $request->validate([
            'student_name' => 'required',
            'project_url' => 'required',
        ]);
            StudentProject::insert([
                'student_name' => $request->student_name,
                'project_url' => $request->project_url,
                'created_at' => Carbon::now(),
            ]);

        $notification = array(
            'message' => 'Student Project Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.student.project')->with($notification);
    }
    // EditStudentProject
    public function EditStudentProject($id){
        $studentProject = StudentProject::find($id);
        return view('admin.backend.student_project.edit_student_project', compact('studentProject'));
    }
        // UpdateCourseOutline
    public function UpdateStudentProject(Request $request)
    {
        $sid = $request->id;

        StudentProject::find($sid)->update([
            'student_name' => $request->student_name,
            'project_url' => $request->project_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Student Project Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.student.project')->with($notification);
    }
    // DeleteCourseOutline
    public function DeleteStudentProject($id)
    {
        StudentProject::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Student Project Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
