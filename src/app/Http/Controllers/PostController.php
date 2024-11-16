<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posting;

class PostController extends Controller
{
    public function timeline()
    {

        $posts = Posting::with('user')->latest()->get();
        return view('timeline', compact('posts'));

    }

    public function mypost()
    {
        return view('mypost');
    }
}
