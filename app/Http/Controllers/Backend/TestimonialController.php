<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    // AllTestimonial
    public function AllTestimonial()
    {
        $testimonial = Testimonial::latest()->get();
        return view("admin.backend.testimonial.all_testimonial", compact("testimonial"));
    }
    //
    // AddTestimonial
    public function AddTestimonial()
    {
        return view("admin.backend.testimonial.add_testimonial");
    }
    // StoreTestimonial
    public function StoreTestimonial(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2024|mimes:jpg,jpeg,png,gif',
        ]);
        // Without Imagick
        $image = $request->file('photo');
        $filename = date('YmdHi') . $image->getClientOriginalName();
        $image->move(public_path('upload/testimonial/'), $filename);

        $save_url = 'upload/testimonial/' . $filename;

        Testimonial::insert([
            'name' => $request->name,
            'message' => $request->message,
            'status' => $request->status,
            'photo' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Testimonial Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.testimonial')->with($notification);
    }
    //
    // Edit Testimonial
    public function EditTestimonial($id)
    {
        $editTestimonial = Testimonial::findOrFail($id);
        return view('admin.backend.testimonial.edit_testimonial', compact('editTestimonial'));
    }
    // Update Testimonial
    public function UpdateTestimonial(Request $request)
    {
        $pid = $request->id;

        if ($request->file('photo')) {
            $request->validate([
                'photo' => 'required|image|max:2024',
            ]);
            // Without Imagick 700 x 800
            $image = $request->file('photo');
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('upload/property/testimonial/'), $filename);

            $save_url = 'upload/property/testimonial/' . $filename;

            Testimonial::findOrFail($pid)->update([
                'name' => $request->name,
                'message' => $request->message,
                'photo' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        } else {
            Testimonial::findOrFail($pid)->update([
                'name' => $request->name,
                'message' => $request->message,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Testimonial Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.testimonial')->with($notification);
    }
    //
    // Delete Testimonial
    public function DeleteTestimonial($id)
    {
        $deleteId = Testimonial::findOrFail($id);
        unlink($deleteId->photo);

        Testimonial::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Testimonial Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
