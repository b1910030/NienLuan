<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourReview;
use App\Models\Tour;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TourReviewController extends Controller
{
    public function index(){
        $reviews = TourReview::get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function edit(TourReview $review){
       
        return view('admin.reviews.edit', compact('review'));
    }
    public function update(Request $request,TourReview $review) 
    {
        DB::table('tour_reviews')->where('id', $review->id)->update(['status'=>$request['status']]);

        return redirect()->route('admin.reviews.index')->with('message', 'Updated Successfully !');
    }
    public function user_store_review(Request $request, Tour $tour){
        $user = auth()->user();
        $review = new TourReview();

        $review->tour_id = $tour->id;
        $review->user_id = $user->id;
        $review->rate = $request['rate'];
        $review->review = $request['review'];
        $review['status']='active';
        $review->review = $request['review'];
        $review->created_at = Carbon::now();
        $review->save();

        $reviews  = TourReview::get();
        $users = User::get();
        return redirect()->route('detail', compact('tour', 'reviews','users'));
    }


    public function destroy(TourReview $review)
    {
        $review->delete();

        return redirect()->route('admin.reviews.index')->with('message', 'Deleted Successfully !');
    }
}
