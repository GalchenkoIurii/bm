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
            $posts = $postCategory->posts()->where('confirmed', 1)->paginate();
        } elseif($request->has('tag')) {
            $postTag = PostTag::with(['posts'])->where('slug', $request->query('tag'))->firstOrFail();
            $posts = $postTag->posts()->where('confirmed', 1)->paginate();
        } else {
            $posts = Post::with(['postCategory', 'postTags'])->where('confirmed', 1)->paginate();
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

        $post = $request->user()->posts()->create($requestData);

        if(isset($requestData['post_tags_id'])) {
            $post->postTags()->sync($requestData['post_tags_id']);
        }

        return redirect()->route('blog.index')->with('success', 'Ваш пост отправлен на модерацию. После модерации пост будет опубликован.');
    }

    public function show(Post $post)
    {
        $post->views += 1;
        $post->update();

        return view('blog.posts-show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = PostCategory::all();
        $tags = PostTag::all();

        if ($post->user_id == Auth::id()) {
            return view('blog.posts-edit', compact('post', 'categories', 'tags'));
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

    public function destroy($post)
    {
        $postData = Post::findOrFail($post);

        if ($postData->user_id == Auth::id()) {
            $title = $postData->title;

            $postData->postTags()->sync(null);

            if (isset($postData->image)) {
                Storage::disk('public')->delete($postData->image);
            }

            $postData->delete();

            return redirect()->route('blog.index')->with('success', 'Пост "' . $title . '" удален');
        } else {
            return back()->with('error', 'У Вас недостаточно прав для удаления этого поста');
        }
    }
}
