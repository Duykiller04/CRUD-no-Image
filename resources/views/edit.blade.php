@extends('layouts.master')
@section('title')
    Sửa bài Post: {{ $post->id }}
@endsection
@section('content')
    <div class="d-flex justify-content-start mb-3">
        <a href="{{ route('post.index') }}" class="btn btn-primary">Danh sách</a>
    </div>
    <div class="border p-5 rounded bg-light bg-gradient">
        <form action="{{ route('post.update', $post) }}" method="POST">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="title" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" value="{{ $post->title }}">
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input type="body" class="form-control @error('body') is-invalid @enderror" id="body" name="body"
                    value="{{ $post->body }}">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-success">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection
