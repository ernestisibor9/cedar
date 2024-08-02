<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // AllUsers
    public function AllUsers(){
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.backend.user.all_users', compact('users'));
    }
    // EditUser
    // public function EditUser($id){
    //     $user = User::find($id);
    //     return view('admin.backend.user.edit_user', compact('user'));
    // }
    // // UpdateUser
    // public function UpdateUser(Request $request){
    //     $uid = $request->id;

    //     if ($request->file('photo')) {
    //         $image = $request->file('photo');
    //         $filename = date('YmdHi') . $image->getClientOriginalName();
    //         $image->move(public_path('upload/user_images/'), $filename);

    //         $save_url = 'upload/user_images/' . $filename;

    //         User::findOrFail($uid)->update([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'address' => $request->address,
    //             'photo' => $save_url,
    //             'updated_at' => Carbon::now(),
    //         ]);
    //     } else {
    //         User::findOrFail($uid)->update([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'phone' => $request->phone,
    //             'address' => $request->address,
    //             'upated_at' => Carbon::now(),
    //         ]);
    //     }
    //     $notification = array(
    //         'message' => 'User Profile Updated Successfully',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('all.users')->with($notification);
    // }
}
