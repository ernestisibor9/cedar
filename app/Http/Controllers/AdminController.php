<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Admin Dashboard
    public function AdminDashboard()
    {
        return view('admin.index');
    }
    // Admin Login
    public function AdminLogin()
    {
        return view('admin.admin_login');
    }
    // Admin Logout
    public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'info',
        );

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login')->with($notification);
    }
    // AdminProfile
    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile', compact('profileData'));
    }
    // AdminProfileStore
    // AdminProfileStore
    public function AdminProfileStore(Request $request)
    {

        $id = Auth::user()->id;
        $data = User::find($id);

        if ($request->file('photo')) {
            $file = $request->file('photo');
            // unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data['photo'] = $filename;
        }

        // Insert Data
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // Change Password
    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    }
    // Update password
    public function AdminPasswordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        // Match the old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password Does not Match',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        // Update the new password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    // Register Student
    public function RegisterStudent()
    {
        return view('admin.stats.register_student');
    }
    // Enrolled Student
    public function EnrolledStudent()
    {
        return view('admin.stats.enrolled_student');
    }
    // Total Course
    public function TotalCourse()
    {
        return view('admin.stats.total_course');
    }
    // Total Blog
    public function TotalBlog()
    {
        return view('admin.stats.total_blog');
    }
}
