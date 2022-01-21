<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('category')) {
            $postCategory = PostCategory::with(['posts'])->where('slug', $request->query('category'))->firstOrFail();
            $posts = $postCategory->posts()->paginate();
        } else {
            $posts = Post::with(['postCategory', 'postTags'])->paginate();
        }

        $categories = PostCategory::all();

        return view('blog.posts', compact('posts', 'categories'));
    }

    public function show($post)
    {
        $postData = Post::with(['postCategory', 'postTags', 'user'])->findOrFail($post);

        return view('blog.posts-show', compact('postData'));
    }
}
