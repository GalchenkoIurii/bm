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

        $request_data['user_id'] = Auth::id();

        $post = Post::create($request_data);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::with('postTags')->findOrFail($id);

        $categories = PostCategory::all();
        $tags = PostTag::all();

        return view('admin.posts-edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostStoreRequest $request, $id)
    {
        $request_data = $request->validated();

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $folder = date('Y-m-d');
            $request_data['image'] = $request->file('image')->store('posts/' . $folder, 'public');
            $old_image_path = $post->image;
        }

        $post->update($request_data);

        if (isset($request_data['post_tags_id'])) {
            $post->postTags()->sync($request_data['post_tags_id']);
        } else {
            $post->postTags()->sync(null);
        }

        if (isset($old_image_path)) {
            Storage::disk('public')->delete($old_image_path);
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
