<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('home.css') }}">
    <title>Trang chủ</title>
</head>

<body>
    <div class="container">
        <div class="content1">
            <div class="blog1" style="">
                <div class="image">
                    <img src="{{ url('storage/' . $postNew->image) }}" alt="{{ $postNew->image }}">
                    <div class="descript">
                        <button style="background-color:#eba845" class="btn">{{ $postNew->category->name }}</button>
                        <h1 style="color: #fff;"><a href="{{ route('post.detail', $postNew->id) }}">
                                {{ $postNew->title }}
                            </a>
                        </h1>
                        <div class="note1" style="color: #fff">
                            <p class="icon1"><i class="fa fa-user"></i>{{ $postNew->view }}</p>
                            <p> <i class="fa-solid fa-pen"></i>{{ $postNew->created_at }}</p>
                            <p><i class="fa-regular fa-clock"></i>{{ $postNew->update_at }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="blog2">
                @foreach ($postUpdate as $postUp)
                    <div class="box">
                        <div class="picture">
                            <img src="{{ url('storage/' . $postUp->image) }}" alt="{{ $postUp->image }}">
                        </div>
                        <div class="desc">
                            <button style="background-color:#91bd3a"
                                class="btn">{{ $postUp->category->name }}</button>
                            <h3><a href="{{ route('post.detail', $postUp->id) }}">
                                    {{ $postUp->title }}</h3>
                            </a>
                            <div class="note">
                                <p class="icon1"><i class="fa fa-user"></i>{{ $postUp->view }}</p>
                                <p> <i class="fa-solid fa-pen"></i>{{ $postUp->updated_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        @foreach ($categories as $category)
            <h2>{{ $category->name }}</h2>
            <div class="content2">
                @foreach ($category->posts as $post)
                    <div class="box2">
                        <div class="picture">
                            <span class="icon-image">
                                <i class="fa-regular fa-image"></i>
                            </span>
                            <img src="{{ url('storage/' . $post->image) }}" alt="" style="max-width:100%">
                            <span class="btn-image">
                                <a href="" style="background-color: #62ce5c"
                                    class="btn">{{ $post->category->name }}</a>
                            </span>
                        </div>
                        <h3>
                            <a href="{{ route('post.detail', $post->id) }}">
                                {{ $post->title }}
                            </a>
                        </h3>

                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>{{ $post->view }}</p>
                            <p> <i class="fa-solid fa-p en"></i>{{ $post->created_at }}</p>
                            <p><i class="fa-regular fa-clock"></i>{{ $post->updated_at }}</p>
                        </div>
                        <p>{{ $post->description }}</p>
                    </div>
                @endforeach
            </div>
            <div class="button">
                <button class="btn1">Load More</button>
            </div>
        @endforeach

        <div class="text">
            <h2>Lifestyle News</h2>
            <p>This is an optional subtitle for post section</p>
            <div class="content4">
                <div class="blog4">
                    <div class="picture">
                        <img src="{{ url('storage\images\a10.jpg') }}" alt="" width="700px" height="500px">
                        <span class="btn-image">
                            <a href="" style="background-color:#4dcf8f" class="btn">Active</a>
                        </span>
                    </div>
                    <h3>Your phone can take the best quality photo & Style</h3>
                    <div class="note">
                        <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                        <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        <p><i class="fa-regular fa-clock"></i>2 Mins read</p>
                    </div>
                    <p>Mauris mattis auctor cursus. Phasellus tellus tellus, imperdiet ut imperdiet eu, iaculis a sem.
                        Donec
                        vehicula luctus nunc in laoreet. Aliquam erat volutpat. Suspendisse vulputate porttitor
                        condimentum.
                        Proin viverra orci...</p>
                </div>

                <div class="blog5">
                    <div class="blog5-blog">
                        <div class="picture">
                            <img src="{{ url('storage\images\a10.jpg') }}" alt="" width="200px"
                                height="200px">
                            <span class="btn-image">
                                <a href="" style="background-color:#91bd3a" class="btn">Inspiration</a>
                            </span>
                        </div>
                        <h3>The dress style influencers are wearing right now</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>

                    <div class="blog5-blog">
                        <div class="picture">
                            <img src="{{ url('storage\images\a11.jpg') }}" alt="" width="200px"
                                height="200px">
                            <span class="btn-image">
                                <a href="" style="background-color:#d66300" class="btn">Science</a>
                            </span>
                        </div>
                        <h3>It really great holiday and enjoy with the sea</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>

                    <div class="blog5-blog">
                        <div class="picture">
                            <img src="{{ url('storage\images\a1.jpg') }}" alt="" width="200px"
                                height="200px">
                            <span class="btn-image">
                                <a href="" style="background-color:#d63447;" class="btn">Health</a>
                            </span>
                        </div>
                        <h3>This is the best camera for short minimal style</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>

                    <div class="blog5-blog">
                        <div class="picture">
                            <img src="{{ url('storage\images\a12.jpg') }}" alt="" width="200px"
                                height="200px">
                            <span class="btn-image">
                                <a href="" style="background-color:#4dcf8f" class="btn">Active</a>
                            </span>
                        </div>
                        <h3>This is my favourite fashion that i watching</h3>
                        <div class="note">
                            <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                            <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- </div> --}}
        {{-- <div class="container2"> --}}
        <h2>Health & Fitness</h2>
        <p>This is an optional subtitle for post section</p>
        <div class="content5">
            <div class="blog-end">
                <div class="picture">
                    <img src="{{ url('storage\images\a10.jpg') }}" alt="">
                    <span class="btn-image">
                        <a href="" style="background-color:#379e63" class="btn">Techno</a>
                    </span>
                </div>
                <h3>This is an optional subtitle for post section</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                </div>
            </div>
            <div class="blog-end">
                <div class="picture">
                    <img src="{{ url('storage\images\a11.jpg') }}" alt="">
                    <span class="btn-image">
                        <a href="" style="background-color:#379e63" class="btn">Techno</a>
                    </span>
                </div>
                <h3>Relaxing with nice view after enjoy with your food</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                </div>
            </div>
            <div class="blog-end">
                <div class="picture">
                    <img src="{{ url('storage\images\a12.jpg') }}" alt="">
                    <span class="btn-image">
                        <a href="" style="background-color:#eba845" class="btn">Business</a>
                    </span>
                </div>
                <h3>Best Lighting For Outdoor Photo Shoot Style</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                </div>
            </div>
            <div class="blog-end">
                <div class="picture">
                    <img src="{{ url('storage\images\a1.jpg') }}" alt="">
                    <span class="btn-image">
                        <a href="" style="background-color:#d63447;" class="btn">Health</a>
                    </span>
                </div>
                <h3>New skill with the height quality camera lens</h3>
                <div class="note">
                    <p class="icon1"><i class="fa fa-user"></i>Spraya</p>
                    <p> <i class="fa-solid fa-pen"></i>July 24, 2019</p>
                </div>
            </div>
        </div>
    </div>

    </div>
</body>

</html>
