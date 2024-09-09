<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('home.css') }}">
    <title>Danh mục</title>
</head>

<body>
    <div class="container">

        <h1 style="text-align: center">Health & Fitness</h1>
        <p style="text-align: center">This is an optional subtitle for post section</p>
        @foreach ($category as $cate)
            <div class="content5">
                @foreach ($cate->posts as $post)
                    <div class="blog-end">
                        <div class="picture">
                            <img src="{{ url('storage/' . $post->image) }}" alt="{{ $post->image }}">
                            <span class="btn-image">
                                <a href="" style="background-color:#379e63"
                                    class="btn">{{ $post->category->name }}</a>
                            </span>
                        </div>
                        <h3>{{ $post->title }}</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>{{ $post->view }}</p>
                            <p> <i class="fa-solid fa-pen"></i>{{ $post->updated_at }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

</body>

</html>
