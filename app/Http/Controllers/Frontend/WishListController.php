<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
      //
      public function AddToWishList(Request $request, $course_id){

        if (Auth::check()) {
           $exists = Wishlist::where('user_id',Auth::id())->where('course_id',$course_id)->first();

           if (!$exists) {
            Wishlist::insert([
                'user_id' => Auth::id(),
                'course_id' => $course_id,
                'created_at' => Carbon::now(),
            ]);
            return response()->json(['success' => 'Successfully Added on your Wishlist']);
           }else {
            return response()->json(['error' => 'This Course is already in your withlist']);
           }

        }else{
            return response()->json(['error' => 'You have to login your account first']);
        }

    } // End Method
    // AllWishlist
    public function AllWishlist(){
        return view('frontend.wishlist.all_wishlist');
    }
    // Get Wishlist
    public function GetWishlistCourse(){
        $id = Auth::user()->id;
        $wishlist = Wishlist::with('course')->where('user_id', $id)->latest()->get();
        $wishQty = Wishlist::where('user_id', $id)->count();

        return response()->json(['wishlist' => $wishlist, 'wishQty' => $wishQty]);

    }// End Method
    // Remove Wishlist
    public function RemoveWishlist($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Successfully Course Remove']);

    }// End Method
}
