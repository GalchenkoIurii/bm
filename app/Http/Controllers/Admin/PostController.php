<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['postCategory', 'postTags'])->get();

        return view('admin.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PostCategory::all();
        $tags = PostTag::all();

        return view('admin.posts-create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $request_data = $request->validated();

        if ($request->hasFile('image')) {
            $folder = date('Y-m-d');
            $request_data['image'] = $request->file('image')->store('posts/' . $folder, 'public');
        }

        $post = $request->user()->posts()->create($request_data);

        if (isset($request_data['post_tags_id'])) {
            $post->postTags()->sync($request_data['post_tags_id']);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Пост сохранен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        $tags = PostTag::all();

        return view('admin.posts-edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, Post $post)
    {
        $requestData = $request->validated();

//        $post = Post::findOrFail($id);

        // TODO: refactor post updating - change http method from put to patch
        if ($request->hasFile('image')) {
            $folder = date('Y-m-d');
            $requestData['image'] = $request->file('image')->store('posts/' . $folder, 'public');
            $oldImagePath = $post->image;
        }

        if (isset($requestData['confirmed']) && $post->need_confirmation) {
            $requestData['confirmed'] = 1;
            $requestData['need_confirmation'] = 0;
        } elseif (!isset($requestData['confirmed']) && $post->confirmed) {
            $requestData['confirmed'] = 0;
            $requestData['need_confirmation'] = 1;
        } elseif (isset($requestData['confirmed']) && $post->confirmed) {
            $requestData['confirmed'] = 1;
        }

        $post->update($requestData);

        if (isset($requestData['post_tags_id'])) {
            $post->postTags()->sync($requestData['post_tags_id']);
        } else {
            $post->postTags()->sync(null);
        }

        if (isset($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Пост "' . $post->title . '" обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->postTags()->sync(null);

        if (isset($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Пост удален');
    }
}
