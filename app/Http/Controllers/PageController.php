<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Models\Tour;
use App\Models\User;
use App\Mail\StoreContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreEmailRequest;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\TourReview;

class PageController extends Controller
{
    // public function index() : View
    // {
        

    //     return view('/tour', compact('tour'));
    // }
    public function home() : View
    {
        
        $categories = Category::get();
        $posts = Post::get();

        return view('home', compact('categories','posts'));
    }

    public function detail(Tour $tour): View
    {
        $reviews  = TourReview::get();
        return view('detail', compact('tour', 'reviews'));
    }

    public function tour(Request $request){

        $tours = Tour::when($request->date_start != null, function ($q) use ($request) {
                return $q->whereDate('date_start', $request['date_start']);
        })
            ->when($request->location_start != null, function ($q) use ($request) {
                return $q->where('location_start',$request->location_start);
            })  
            ->when($request->name != null, function ($q) use ($request) {
                return $q->where('name','LIKE','%'.$request->name.'%');
            })         
            ->paginate(10);

        return view('package', compact('tours'));
    }

    public function posts(){
        $posts = Post::get();

        return view('posts', compact('posts'));
    }

    public function detailPost(Post $post){
        return view('posts-detail',compact('post'));
    }

    public function contact(){
        return view('contact');
    }

    public function getEmail(StoreEmailRequest $request){
        $detail = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('anhb1910032@gmail.com')->send(new StoreContactMail($detail));
        return back()->with('message', 'Thanks for your feedback! We will read it as soon as possible');
    }


    
}
