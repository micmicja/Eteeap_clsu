<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get(); 
        $posts = Post::latest()->take(5)->get();
    
        return view('homepage', compact('sliders', 'posts'));
    }
    
    public function post()
    {
        return view("post");
    }
    public function showHomePage()
    {
       
        $posts = Post::orderBy('created_at', 'desc')->get(); 
        $sliders = Slider::latest()->get();
       
        return view('homepage', compact('posts', 'sliders'));  
    }

}
