@extends('user.search')

@section('result')
<div class="results">
    @foreach ($search_post as $result)
            <div class="result-search">
                <div class="info-post">
                    <h3 class="title">
                        <a href="{{ route('post.detail', $result->id) }}">
                            {{ $result->title }}
                        </a>
                    </h3>

                    <a href="{{ route('category', $result->category->id) }}">
                        <button style="background-color:#91bd3a" class="btn">{{ $result->category->name }}
                        </button>
                    </a>

                    <p class="description">
                        {{ $result->description }}
                    </p>

                    <div class="note">
                        <p class="view"><i class="fa fa-user"></i>{{ $result->view }}</p>
                        <p class="updated-at"> <i class="fa-solid fa-pen"></i>{{ $result->updated_at }}</p>
                    </div>
                </div>

                <div class="image-post">
                    <img src="{{ url('storage/' . $result->image) }}" alt="{{ $result->image }}">
                </div>
            </div>
            <hr>

        @endforeach
    </div>
@endsection
