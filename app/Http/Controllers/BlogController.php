<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('category')) {
            $postCategory = PostCategory::with(['posts'])->where('slug', $request->query('category'))->firstOrFail();
            $posts = $postCategory->posts()->paginate();
        } elseif($request->has('tag')) {
            $postTag = PostTag::with(['posts'])->where('slug', $request->query('tag'))->firstOrFail();
            $posts = $postTag->posts()->paginate();
        } else {
            $posts = Post::with(['postCategory', 'postTags'])->paginate();
        }

        $categories = PostCategory::all();
        $tags = PostTag::all();

        return view('blog.posts', compact('posts', 'categories', 'tags'));
    }

    public function show($post)
    {
        $postData = Post::with(['postCategory', 'postTags', 'user'])->findOrFail($post);

        $postData->views += 1;

        $postData->update();

        return view('blog.posts-show', compact('postData'));
    }
}
