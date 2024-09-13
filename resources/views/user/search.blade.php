{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
@extends('user.layout')
@section('content')
    <div class="form-search">
        <div class="search">
            <form action="" method="POST">
                {{ csrf_field() }}
                <div class="search-top">
                    <h1>Kết Quả Tìm Kiếm</h1>
                    <input type="text" value="{{ $keyw }}" name="keyword" placeholder="{{$keyw}}">

                    <div class="filter">
                        <div class="time">
                            <h3>Time</h3>
                            <select name="" id="">
                                <option value="">Tất cả</option>
                                <option value="">1 ngày qua</option>
                                <option value="">1 tuần qua</option>
                                <option value="">1 tháng qua</option>
                                <option value="">1 năm qua</option>
                            </select>
                        </div>

                        <div class="cate">
                            <h3>Category</h3>
                            <select name="" id="">
                                <option value="">Tất cả</option>
                                <option value="">Văn Hóa</option>
                                <option value="">Thể thao</option>
                                <option value="">Du lịch</option>
                                <option value="">Bất động sản</option>
                                <option value="">Chính Trị</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="search-bottom">
                    <ul class="list-post">
                        <li class="post-new">
                            <a href="#" id="post-new">
                                Mới nhất
                            </a>
                        </li>
                        <li class="post-related">
                            <a href="#" id="post-related">
                                Liên quan
                            </a>
                        </li>
                    </ul>

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
                                    <p class="updateda-at"> <i class="fa-solid fa-pen"></i>{{ $result->updated_at }}</p>
                                </div>
                            </div>

                            <div class="image-post">
                                <img src="{{ url('storage/' . $result->image) }}" alt="{{ $result->image }}">
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </form>
            {{-- <hr> --}}
        </div>
        <hr>
        
        <div class="sidebar">
            <img src="{{ url('storage\images\warning.png') }}" alt="image-sidebar">
        </div>
    </div>

    {{ $search_post->links()}}
    {{-- <ul class="pagination">
        <li class="pagination-item">
            <a href="#" class="pagination-item-link">
                <i class="pagination-item-icon fas fa-angle-left"></i>
            </a>
        </li>

        <li class="pagination-item pagination-item--active">
            <a href="#" class="pagination-item-link">1</a>
        </li>

        <li class="pagination-item">
            <a href="#" class="pagination-item-link">2</a>
        </li>

        <li class="pagination-item">
            <a href="#" class="pagination-item-link">3</a>
        </li>

        <li class="pagination-item">
            <a href="#" class="pagination-item-link">
                <i class="pagination-item-icon fas fa-angle-right"></i>
            </a>
        </li>
    </ul> --}}
    <hr>
@endsection
