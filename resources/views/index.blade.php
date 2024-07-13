@extends('layouts.master')
@section('title')
    Danh sách bài Post
@endsection
@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('post.create') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Thêm mới</a>
    </div>
    <table class="table table-hover table-light table-striped align-middle">
        <thead>
            <tr class="text-center">
                <th scope="col">STT</th>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col" width="200px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
                <tr>
                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                    <td class="text-center">{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->body }}</td>
                    <td colspan="3" class="d-flex justify-content-between">
                        <a href="{{ route('post.show', $item) }}" class="btn btn-info"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('post.edit', $item) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="{{ route('post.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa không')" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
