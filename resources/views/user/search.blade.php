@extends('user.layout')
@section('title', 'Kết quả tìm kiếm')
@section('content')
<div class="container">
    <div class="form-search">
        <div class="search">
            <form action="{{ route('search-form') }}" method="POST" id="search-form">
                {{ csrf_field() }}
                <div class="search-top">
                    <h1>Kết Quả Tìm Kiếm</h1>
                    <div class="input-search">
                        <input type="text" name="keyword" value="{{$keyw}}">
                        <button type="submit" class="btn-submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>

                    <div class="filter">
                        <div class="time">
                            <h3>Time</h3>
                            <select name="time" id="time">
                                <option value="all">Tất cả</option>
                                <option value="1day" {{ $date == '1day' ? 'selected' : '' }}>1 ngày qua</option>
                                <option value="1week" {{ $date == '1week' ? 'selected' : '' }}>1 tuần qua</option>
                                <option value="1month" {{ $date == '1month' ? 'selected' : '' }}>1 tháng qua</option>
                                <option value="1year" {{ $date == '1year' ? 'selected' : '' }}>1 năm qua</option>
                            </select>
                        </div>

                        <div class="category">
                            <h3>Category</h3>
                            <select name="category" id="category">
                                <option value="Tất cả">Tất cả</option>
                                <option value="Văn Hóa" {{ $category == 'Văn Hóa' ? 'selected' : '' }}>Văn Hóa</option>
                                <option value="Thể Thao" {{ $category == 'Thể Thao' ? 'selected' : '' }}>Thể thao</option>
                                <option value="Du Lịch" {{ $category == 'Du Lịch' ? 'selected' : '' }}>Du lịch</option>
                                <option value="Bất Động Sản" {{ $category == 'Bất Động Sản' ? 'selected' : '' }}>Bất động sản</option>
                                <option value="Chính Trị"{{ $category == 'Chính Trị' ? 'selected' : '' }}>Chính Trị</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="search-bottom">
                    <ul class="list-post">
                        <li class="post-new">
                            <a href="#" id="post-new">Mới nhất</a>
                        </li>
                        <li class="post-related">
                            <a href="#" id="post-related">Liên quan</a>
                        </li>
                    </ul>
                </div>
            </form>

            
            <div class="result">
                @yield('result')
            </div>
        </div>
        
        <hr class="hr">

        <div class="sidebar">
            <img src="{{ url('storage\images\warning.png') }}" alt="image-sidebar">
        </div>
    </div>

    {{ $search_post->appends(request()->all())->links() }}    
    <hr>

    {{-- except('page') --}}
</div>
@endsection
{{-- <ul class="pagination">
        <li class="page-item">
            <a href="#" class="page-link">
                <i class="page-item-icon fas fa-angle-left"></i>
            </a>
        </li>

        <li class="page-item active">
            <a href="#" class="page-link">1</a>
        </li>

        <li class="page-item">
            <a href="#" class="page-link">2</a>
        </li>

        <li class="page-item">
            <a href="#" class="page-link">3</a>
        </li>

        <li class="page-item">
            <a href="#" class="page-link">
                <i class="page-item-icon fas fa-angle-right"></i>
            </a>
        </li>
    </ul> --}}
