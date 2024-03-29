<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCategoryRequest;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = PostCategory::all();
        return view('admin.post-categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post-categories-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request)
    {
        PostCategory::create($request->validated());

        return redirect()->route('admin.post-categories.index')->with('success', 'Категория постов добавлена');
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
     * @param  PostCategory $post_category
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategory $post_category)
    {
        return view('admin.post-categories-edit', ['category' => $post_category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  PostCategory $post_category
     * @return \Illuminate\Http\Response
     */
    public function update(PostCategoryRequest $request, PostCategory $post_category)
    {
        $post_category->update($request->validated());

        return redirect()->route('admin.post-categories.index')->with('success', 'Категория постов обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = PostCategory::doesntHave('posts')->find($id);

        if ($category) {
            $category->delete();

            return redirect()->route('admin.post-categories.index')->with('success', 'Категория постов удалена');
        } else {
            return redirect()->route('admin.post-categories.index')
                ->with('error', 'Нельзя удалить данную категорию, так как у нее есть посты');
        }
    }
}
