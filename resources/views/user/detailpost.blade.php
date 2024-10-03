@extends('user.layout')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> --}}

<link rel="stylesheet" href="{{ asset('detail.css') }}">
@section('content')
    <div class="container">
        <div class="detail">
            <div class="content">
                <button class="btn" style="background-color: #eba845">{{ $post->category->name }}</button>
                <h1>
                    <a href="{{ route('post.detail', $post->id) }}">
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
                            @foreach ($category->posts as $post_relate)
                                <div class="picture">
                                    <img src="{{ url('storage/' . $post_relate->image) }}" alt="">
                                </div>
                                <div class="content-blog">
                                    <button class="btn"
                                        style="background-color: #eba845">{{ $post_relate->category->name }}</button><br>
                                    <h2>
                                        <a href="{{ route('post.detail', $post_relate->id) }}">
                                            {{ $post_relate->title }}
                                        </a>
                                    </h2>
                                    <div class="note">
                                        <p><i class="fa fa-user"></i>{{ $post_relate->view }}</p>
                                        <p><i class="fa-solid fa-pen"></i>{{ $post_relate->created_at }}</p>
                                        <p><i class="fa-regular fa-clock"></i>{{ $post_relate->updated_at }}</p>
                                    </div>
                                    <p>{{ $post_relate->description }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                </div>


                <div class="comment">
                    <h3 style="margin-top: 40px">Please leave a comment
                    </h3>
                    <p>Please leave your comments about this article here <span style="color: red">*</span>
                    </p>

                    @if (auth()->check())
                        <form action="{{ route('comment_post', $post->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea name="content" cols="30" rows="10" class="text-note" placeholder=" Enter content (*)"></textarea>
                            {{-- <input type="file" name="image"> <br> --}}
                            <button class="btnsave" type="submit">Post Comment</button>
                        </form>
                    @else
                        <a href="{{ route('login')}}" class="error-comment">Log in to comment click to login</a>
                    @endif

                    <h3>Comments ({{ $comments ->count()}})</h3>
                    <div class="list-comment">
                        <div class="media-comment">
                            @foreach ($comments as $cmt)
                            <div class="comment-parent">
                                <a href="" class="pull-left">
                                    <img src="{{ url('/storage/images/8TQiZiKflGgyajQYuVjVANgMjH2vBAvxZTNn2vGX.jpg') }}"
                                        alt="" class="avatar" width="60px">
                                </a>

                                <div class="media-comment-body">
                                    <h4 name="fullname"> {{ $cmt->user->fullname}} </h4>
                                    <p name="content">
                                        {{ $cmt->content}}
                                    </p>
                                    <p name="created_at">{{ $cmt->created_at}}</p>
                                    {{-- <img src="{{ $cmt->image}}" alt="{{ $cmt->image}}" width="100px">  --}}
                                    <p class="btn-reply">
                                        <a href="">Reply</a>
                                    </p>

                                    <form action="" method="POST" style="display:none">
                                        <input type="button" value="{{ $post->id }}" hidden name="post_id">
                                        <textarea name="comment" id="" cols="70" rows="6" placeholder="Enter content (*)"
                                            class="text-note" required="required"></textarea>

                                        <button class="btnsave" type="submit"> Send reply content</button>
                                    </form>
                                    {{-- Các bình luận con --}}
                                    {{-- <div class="comment-child">
                                        <div class="comment-parent">
                                            <a href="" class="pull-left">
                                                <img src="{{ url('/storage/images/8TQiZiKflGgyajQYuVjVANgMjH2vBAvxZTNn2vGX.jpg') }}"
                                                    alt="" class="avatar" width="60px">
                                            </a>

                                            <div class="media-comment-body">
                                                <h4 name="fullname"> Nguyễn Thị Hoài </h4>
                                                <p name="content">
                                                    Maiores et saepe cupiditate voluptatem. Odit aut id qui. Dolorum dolore
                                                    iusto corrupti
                                                    corrupti vitae.
                                                </p>
                                                <p class="btn-reply">
                                                    <a href="">Reply</a>
                                                </p>

                                                <form action="" method="POST" style="display:none">
                                                    <input type="button" value="{{ $post->id }}" hidden
                                                        name="post_id">
                                                    <textarea name="comment" id="" cols="70" rows="6" placeholder="Enter content (*)"
                                                        class="text-note" required="required"></textarea>

                                                    <button class="btnsave" type="submit"> Send reply content</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
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
                                        <a href="{{ route('post.detail', $postOther->id) }}">
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
