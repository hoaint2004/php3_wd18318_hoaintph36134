@extends('layout')

{{-- @section -> sủ dụng tiêu đề, sử dụng trong view --}}
@section('title', 'Trang danh sách bài viết')

{{-- Nhiều dữ liệu --}}

@section('content')
    <h1>Phần nội dung website</h1>
    <hr> {{-- Đường kẻ ngang --}}
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('post.detail', $post->id) }}">
                <h3>{{ $post->title }}</h3>
            </a>
            <div class="">
                <img src="{{$post->image}}" alt="" width="100">
            </div>
            <p>{{ $post->description }}</p>
            <p>View: {{ $post->view }}</p>
            <hr>
        </div>
    @endforeach
@endsection

