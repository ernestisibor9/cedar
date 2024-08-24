<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    // AllInstructor
    public function AllInstructor()
    {
        // Fetch all instructors from the database
        $instructors = Instructor::latest()->get();
        return view('admin.backend.instructor.all_instructor', compact('instructors'));
    }
    // AddInstructor
    public function AddInstructor()
    {
        return view('admin.backend.instructor.add_instructor');
    }
    // StoreInstructor
    public function StoreInstructor(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:instructors',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        $image = $request->file('photo');
        $filename = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('upload/instructor_images/'), $filename);
        $save_url = 'upload/instructor_images/' . $filename;

        Instructor::insert([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'instagram_url' => $request->instagram_url,
            'photo' => $save_url,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Instructor Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.instructor')->with($notification);
    }
    // EditInstructor
    public function EditInstructor($id){
        $instructor = Instructor::find($id);
        return view('admin.backend.instructor.edit_instructor',compact('instructor'));
    }
    // UpdateInstructor
    public function UpdateInstructor(Request $request){
        $instructor_id = $request->id;

        if ($request->file('photo')) {

        $image = $request->file('photo');
        $filename = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('upload/instructor_images/'), $filename);
        $save_url = 'upload/instructor_images/' . $filename;

        Instructor::find($instructor_id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'instagram_url' => $request->instagram_url,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Instructor Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.instructor')->with($notification);

    } else {

        Instructor::find($instructor_id)->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'instagram_url' => $request->instagram_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Instructor Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.instructor')->with($notification);
    }
    }
    // DeleteInstructor
    public function DeleteInstructor($id){
        $item = Instructor::find($id);
        $img = $item->photo;
        unlink($img);

        Instructor::find($id)->delete();

            $notification = array(
                'message' => 'Instructor Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
    }
}
