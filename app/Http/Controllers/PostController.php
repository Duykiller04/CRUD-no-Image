<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->orderByDesc('id')->paginate(10);
        return view(__FUNCTION__, compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(__FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try {
            Post::create($request->all());
            return redirect()->route('post.index')->with('success', 'Thêm bài viết thành công');
        } catch (\Exception $e) {
            return back()->with('error', 'Thêm bài viết không thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view(__FUNCTION__, compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view(__FUNCTION__, compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            $post->update($request->all());
            return back()->with('success', 'Cập nhật bài viết thành công');
        } catch (\Exception $e) {
            return back()->with('error', 'Cập nhật bài viết không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return redirect()->route('post.index')->with('success', 'Xóa bài viết thành công');
        } catch (\Exception $e) {
            return redirect()->route('post.index')->with('error', 'Xóa bài viết không thành công');
        }
    }
}
