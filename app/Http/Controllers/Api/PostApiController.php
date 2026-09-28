<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    // Return all posts as raw JSON text
    public function index()
    {
        $posts = Post::latest()->get();
        return response()->json($posts);
    }
}