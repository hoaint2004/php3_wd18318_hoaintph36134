@extends('user.search')

@section('result')
<div class="">
    @foreach ($search_post as $result)
            <div class="result-search">
                <div class="info-post">
                    <h3 class="title">
                        <a href="#">
                            {{ $result->title }}
                        </a>
                    </h3>

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
