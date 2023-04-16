<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Tour;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $categories = Category::all();
        $count_categories = $categories->count();

        $tour = Tour::all();
        $count_tour = $tour->count();

        $post = Post::all();
        $count_post = $post->count();

        $user = User::all();
        $count_user = $user->count();

        return view('admin.dashboard.index', compact('count_categories','count_tour', 'count_post', 'count_user'));
    }
}
