<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostTagRequest;
use App\Models\PostTag;
use Illuminate\Http\Request;

class PostTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = PostTag::all();
        return view('admin.post-tags', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post-tags-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostTagRequest $request)
    {
        PostTag::create($request->validated());

        return redirect()->route('admin.post-tags.index')->with('success', 'Тег постов добавлен');
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
     * @param  PostTag $post_tag
     * @return \Illuminate\Http\Response
     */
    public function edit(PostTag $post_tag)
    {
        return view('admin.post-tags-edit', ['tag' => $post_tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PostTag $post_tag
     * @return \Illuminate\Http\Response
     */
    public function update(PostTagRequest $request, PostTag $post_tag)
    {
        $post_tag->update($request->validated());

        return redirect()->route('admin.post-tags.index')->with('success', 'Тег постов обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = PostTag::doesntHave('posts')->find($id);

        if ($tag) {
            $tag->delete();

            return redirect()->route('admin.post-tags.index')->with('success', 'Тег постов удален');
        } else {
            return redirect()->route('admin.post-tags.index')
                ->with('error', 'Нельзя удалить данный тег, так как у него есть посты');
        }
    }
}
