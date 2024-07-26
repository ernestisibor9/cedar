<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryCategory extends Controller
{
    // All Category
    public function AllCategory()
    {
        $categories = Category::latest()->get();
        return view('admin.backend.category.all_category', compact('categories'));
    }
    // AddCategory
    public function AddCategory()
    {
        return view('admin.backend.category.add_category');
    }
    // StoreCategory
    public function StoreCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required | min:3',
            'image' => 'required',
        ]);

        if ($request->file('image')) {
            // read image from file system
            // Without Imagick
            $image = $request->file('image');
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('upload/category/'), $filename);

            $save_url = 'upload/category/' . $filename;

            Category::insert([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name),
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }
    // EditCategory
    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.backend.category.edit_category', compact('category'));
    }
    // UpdateCategory
    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->id;

        if ($request->file('image')) {
            // create image manager with desired driver
            $image = $request->file('image');
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('upload/category/'), $filename);

            $save_url = 'upload/category/' . $filename;

            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name),
                'image' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        } else {
            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name),
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }
    // DeleteCategory
    public function DeleteCategory($id)
    {
        $deleteId = Category::findOrFail($id);
        unlink($deleteId->image);

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
