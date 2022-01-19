<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with(['postCategory', 'postTags'])->paginate();

        return view('blog.posts', compact('posts'));
    }

    public function show($post)
    {
        $postData = Post::with(['postCategory', 'postTags', 'user'])->findOrFail($post);

        return view('blog.posts-show', compact('postData'));
    }
}
