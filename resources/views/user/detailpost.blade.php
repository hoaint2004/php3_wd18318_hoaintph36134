@extends('user.layout')
<link rel="stylesheet" href="{{ asset('detail.css')}}">
@section('content')

<div class="container">
    <div class="detail">
        <div class="content">
            <button class="btn" style="background-color: #eba845">{{ $post->category->name }}</button>
            <h1>
                <a href="{{route('post.detail', $post->id)}}">
                {{ $post->title }}
            </a>
            </h1>

                <p>{{ $post->description }}</p>
            <div class="note">
                <p><i class="fa fa-user"></i>{{ $post->view }}</p>
                <p><i class="fa-solid fa-pen"></i>{{ $post->created_at }}</p>
                <p><i class="fa-regular fa-clock"></i>{{ $post->updated_at }}</p>
                <p><i class="fa-regular fa-comment"></i>0 Comment</p>
            </div>
            <img src="{{ url('storage/' . $post->image) }}" alt="{{ $post->image }}" width="1200px">
            <div class="section1">
                <div class="media">
                    <div class="icon-media-facebook"><i class="fa-brands fa-facebook-f"></i>
                    </div>
                    <div class="icon-media-twitter"><i class="fa-brands fa-twitter"></i>
                    </div>
                    <div class="icon-media-pinterest"><i class="fa-brands fa-pinterest-p"></i>
                    </div>
                    <div class="icon-media-linkedin"><i class="fa-brands fa-linkedin-in"></i>
                    </div>
                    <div class="icon-media-heart">
                        <i class="fa-regular fa-heart"></i>
                        <span class="badge">3</span>

                    </div>
                    <div class="icon-media-eye">
                        <i class="fa-regular fa-eye"></i>
                        <span class="badge">5.5k</span>
                    </div>
                </div>
                <div class="text">
                    <p>{{ $post->content }}
                    </p>
                </div>
            </div>


            <div class="tag">
                @foreach ($category as $cate)
                    <button>
                        <a href="{{ route('category', $cate->id) }}">
                            {{ $cate->name }}
                        </a>
                    </button>
                @endforeach
            </div>
            <hr>
            <p class="previous">
                <i class="fa-solid fa-arrow-left"></i> Previous post
            </p>
            <h2 class="text-previous">It's time to look at the best structures of our society
            </h2>

            <div class="cus-rate">
                <div class="rate">
                    <div class="image-cus">
                        <img src="{{ url('storage\images\a12.jpg') }}" alt="" width="150px" height="150px">
                    </div>

                    <div class="content-cus">
                        <h5>Spraya</h5>
                        <div class="icon-rate">
                            <i class="fa-solid fa-link"></i>
                            <i class="fa-brands fa-linkedin-in"></i>
                            <i class="fa-solid fa-wifi"></i>
                        </div>
                        <p>Etiam vitae dapibus rhoncus eget etiam aenean nisi montes felis pretium donec veni pede vidi
                            condimentum et aenean hendrerit. Quis sem justo nisi varius Phasellus tellus tellus,
                            imperdiet
                            ut imperdiet eu, iaculis a sem
                        </p>
                    </div>
                </div>
            </div>

            <h3>Related Articles</h3>

            <div class="blog-related">
                @foreach ($categories as $category)
                    <div class="blog">
                        @foreach ($category->posts as $post)
                            <div class="picture">
                                <img src="{{ url('storage/' . $post->image) }}" alt="">
                            </div>
                            <div class="content-blog">
                                <button class="btn"
                                    style="background-color: #eba845">{{ $post->category->name }}</button><br>
                                <h2>
                                    <a href="{{route('post.detail', $post->id)}}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                                <div class="note">
                                    <p><i class="fa fa-user"></i>{{ $post->view }}</p>
                                    <p><i class="fa-solid fa-pen"></i>{{ $post->created_at }}</p>
                                    <p><i class="fa-regular fa-clock"></i>{{ $post->updated_at }}</p>
                                </div>
                                <p>{{ $post->description }}</p>
                            </div>
                        @endforeach
                    </div>
                @endforeach

            </div>

            <h3 style="margin-top: 40px">Leave a Reply
            </h3>
            <p>Your email address will not be published. Required fields are marked <span style="color: red">*</span>
            </p>
            <div class="contact-full">
                <textarea name="comment" id="" cols="70" rows="6" placeholder="Comment" class="text-note"></textarea>
                <div class="contact">
                    <input type="text" name="fullname" placeholder="Fullname" class="input">
                    <input type="text" name="email_address" placeholder="Email Address" class="input">
                    <input type="text" name="web_url" placeholder="Web URL" class="input">
                </div>
            </div>
            <input type="checkbox" name="save" class="save"> <label for=""> Save my name, email, and
                website in this browser for the next
                time
                I comment. </label>
            <br>
            <button class="btnsave" type="submit">Post Comment</button>
        </div>

        <div class="sidebar">
            <h3>Stay Connected</h3>
            <hr>

            <div class="media-slidebar">
                <div class="media1" id="facebook">
                    <div class="index">
                        <i class="fa-brands fa-facebook-f" id="icon-sidebar"></i> 228.8k
                    </div>

                    <div class="index-name">
                        Fans
                    </div>
                </div>
                <div class="media1" id="youtube">
                    <div class="index">
                        <i class="fa-brands fa-youtube" id="icon-sidebar"></i> 65.5k
                    </div>

                    <div class="index-name">
                        Subscribers
                    </div>
                </div>
                <div class="media1" id="vimeo">
                    <div class="index">
                        <i class="fa-brands fa-vimeo-v" id="icon-sidebar"></i> 240
                    </div>

                    <div class="index-name">
                        Subscribers
                    </div>
                </div>
                <div class="media1" id="pinterest">
                    <div class="index">
                        <i class="fa-brands fa-pinterest-p" id="icon-sidebar"></i> 9.87k
                    </div>

                    <div class="index-name">
                        Followers
                    </div>
                </div>
            </div>

            <h3>Other Category</h3>
            <hr>


            <div class="art-fashion">
                @foreach ($cateOther as $cate)
                    @foreach ($cate->posts as $postOther)
                        <div class="blog">
                            <div class="picture">
                                <img src="{{ url('storage/' . $postOther->image) }}" alt="{{ $postOther->image }}">
                            </div>
                            <div class="content-blog">
                                <h2>
                                    <a href="{{route('post.detail', $postOther->id)}}">
                                    {{ $postOther->title }}
                                </a>
                                </h2>
                                <button class="btn"
                                    style="background-color:#eba845">{{ $postOther->category->name }}</button>
                                <div class="note">
                                    <p><i class="fa fa-user"></i>{{ $postOther->view }}</p>
                                    <p><i class="fa-solid fa-pen"></i>{{ $postOther->updated_at }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endforeach
            </div>

            <h3>Advertisement</h3>
            <hr>
            <div class="image-sidebar">
                <img id="image-sidebar" src="{{ url('storage\images\a12.jpg') }}" alt="" width="350px">
            </div>
        </div>
    </div>
</div>
@endsection
