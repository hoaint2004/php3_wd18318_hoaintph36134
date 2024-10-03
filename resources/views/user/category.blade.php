@extends('user.layout')
@section('content')
    @foreach ($category as $cate)
        <h1 style="text-align: center">{{ $cate->name }}</h1>
        <p style="text-align: center">This is an optional subtitle for post section</p>
        <div class="content5">
            @foreach ($cate->posts as $post)
                <div class="blog-end">
                    <div class="picture">
                        <img src="{{ url('storage/' . $post->image) }}" alt="{{ $post->image }}">
                        <span class="btn-image">
                            <a href="" style="background-color:#379e63" class="btn">{{ $post->category->name }}</a>
                        </span>
                    </div>
                    <h3>
                        <a href="{{ route('post.detail', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <div class="note">
                        <p class="icon1"><i class="fa fa-user"></i>{{ $post->view }}</p>
                        <p> <i class="fa-solid fa-pen"></i>{{ $post->updated_at }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
