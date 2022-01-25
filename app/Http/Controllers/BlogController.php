<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function create()
    {
        $categories = PostCategory::all();
        $tags = PostTag::all();

        return view('blog.posts-create', compact('categories', 'tags'));
    }

    public function store(PostStoreRequest $request)
    {
        $requestData = $request->validated();

        if($request->hasFile('image')) {
            $folder = date('Y-m-d');
            $requestData['image'] = $request->file('image')->store('posts/' . $folder, 'public');
        }

        $requestData['user_id'] = Auth::id();

        $post = Post::create($requestData);

        if(isset($requestData['post_tags_id'])) {
            $post->postTags()->sync($requestData['post_tags_id']);
        }

        return redirect()->route('blog.index')->with('success', 'Ваш пост отправлен на модерацию. После модерации пост будет опубликован.');
    }

    public function show($post)
    {
        $postData = Post::with(['postCategory', 'postTags', 'user'])->findOrFail($post);

        $postData->views += 1;

        $postData->update();

        return view('blog.posts-show', compact('postData'));
    }

    public function edit($post)
    {
        $postData = Post::with(['postCategory', 'postTags', 'user'])->findOrFail($post);
        $categories = PostCategory::all();
        $tags = PostTag::all();

        if ($postData->user_id == Auth::id()) {
            return view('blog.posts-edit', compact('postData', 'categories', 'tags'));
        } else {
            return back()->with('error', 'У Вас недостаточно прав для редактирования этого поста');
        }
    }

    public function update(PostStoreRequest $request, $post)
    {
        $requestData = $request->validated();

        $postData = Post::findOrFail($post);

        if ($postData->user_id == Auth::id()) {
            if ($request->hasFile('image')) {
                $folder = date('Y-m-d');
                $requestData['image'] = $request->file('image')->store('posts/' . $folder, 'public');
                $oldImagePath = $postData->image;
            }

            $postData->update($requestData);

            if (isset($requestData['post_tags_id'])) {
                $postData->postTags()->sync($requestData['post_tags_id']);
            } else {
                $postData->postTags()->sync(null);
            }

            if (isset($oldImagePath)) {
                Storage::disk('public')->delete($oldImagePath);
            }

            return redirect()->route('blog.show', ['post' => $postData->id])->with('success', 'Пост "' . $postData->title . '" обновлен');
        } else {
            return back()->with('error', 'У Вас недостаточно прав для редактирования этого поста');
        }
    }
}
