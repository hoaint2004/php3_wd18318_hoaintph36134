@extends('user.search')
@section('title', 'Kết quả tìm kiếm')
@section('result')
<div class="not-result">
    <h1>Kết quả tìm kiếm</h1>
    <div class="info-search">
        <img src="{{ url('storage\images\warning.png')}}" alt="image-error">
        <h2>Search No Result</h2>
        <p>We're sorry. We cannot find any matches for your search term.</p>  
        <span><i class="fa-solid fa-magnifying-glass"></i></span>      
    </div>        
</div>
@endsection
