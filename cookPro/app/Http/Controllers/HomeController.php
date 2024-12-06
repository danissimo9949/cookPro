<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $posts = Post::latest()->take(3)->get();
        return view('index', compact('posts'));
    }
}
