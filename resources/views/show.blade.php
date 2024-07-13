@extends('layouts.master')
@section('title')
    Thông tin bài Post: {{ $post->id }}
@endsection
@section('content')
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('post.index') }}" class="btn btn-primary">Danh sách</a>
    </div>
    <div class="border p-5 rounded bg-light bg-gradient">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="title" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="body" class="form-control" id="body" name="body" value="{{ $post->body }}">
        </div>
        <div class="d-flex justify-content-center">
            <a href="{{ route('post.edit', $post) }}" class="btn btn-success">Sửa</a>
        </div>
    </div>
@endsection
