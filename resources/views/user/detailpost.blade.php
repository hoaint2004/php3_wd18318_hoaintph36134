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
                    <p><i class="fa-regular fa-comment"></i>{{ $comments->count() }} Comment</p>
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
                        <form action="{{ route('comment_post', $post->id) }}" method="POST" id="form-post-comment">
                            @csrf
                            @method('POST')
                            <textarea name="content" cols="30" rows="10" id="content" class="text-note"
                                placeholder=" Enter content (*)"></textarea>
                            @error('content')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                            <br>
                            <button class="btnsave" id="btnsave" type="submit">Post Comment</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="error-comment">Log in to comment click to login</a>
                    @endif

                    <h3>Comments ({{ $comments->count() }})</h3>
                    <div class="list-comment">
                        <div class="media-comment">

                            @foreach ($comments as $cmt)
                                <div class="comment-parent" id="comment-parent-{{ $cmt->id }}">
                                    <a href="" class="pull-left">
                                        <img src="{{ url('/storage/images/8TQiZiKflGgyajQYuVjVANgMjH2vBAvxZTNn2vGX.jpg') }}"
                                            alt="" class="avatar" width="60px">
                                    </a>

                                    <div class="media-comment-body">
                                        <h4 name="fullname"> {{ $cmt->user->fullname }}
                                            <small class="created_at" style="color: #5555558f">
                                                {{ $cmt->created_at->format('d/m/Y') }}
                                            </small>
                                        </h4>
                                        <p name="content" id="content-{{ $cmt->id }}">
                                            {{ $cmt->content }}
                                        </p>

                                        <div class="text-right">
                                            @can('my-comment', $cmt)
                                                <a href="" class="btn-edit" id="btn-edit-{{ $cmt->id}}" data-id_comment="{{ $cmt->id }}"
                                                    data-content="{{ $cmt->content }}">Edit</a>
                                                <form action="{{ route('comment.destroy', $cmt->id) }}" method="post"
                                                    class="delete-comment">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn-delete"
                                                        data-comment_id="{{ $cmt->id }}">Delete</button>
                                                </form>
                                                <a class="btn-reply" href=""
                                                    data-id_comment="{{ $cmt->id }}">Reply
                                                </a>
                                            @endcan
                                        </div>
                                        {{-- Form edit --}}
                                        <form action="" method="POST" style="display:none"
                                            class="form-edit-comment-parent" id="form-edit-{{ $cmt->id }}">
                                            @csrf
                                            @method('PUT')
                                            <textarea name="content-edit" id="text-edit-{{$cmt->id}}" cols="70" rows="6" placeholder="Enter content (*)"
                                                class="content-edit" required="required">
                                            </textarea>

                                            <button class="btnsave-update" type="submit"
                                                data-id_comment="{{ $cmt->id }}">Update Content</button>
                                        </form>

                                        {{-- Form reply --}}
                                        <form action="" method="POST" style="display:none"
                                            class="form-post-comment-child" id="form-reply-{{ $cmt->id }}">
                                            @csrf
                                            @method('POST')
                                            <input type="button" value="{{ $post->id }}" hidden name="post_id">
                                            <textarea name="content-reply" cols="70" rows="6" placeholder="Enter content (*)"
                                                class="text-note-{{ $cmt->id }}" required="required" id="content-reply"></textarea>

                                            <button class="btnsave-reply" type="submit"
                                                data-id_comment="{{ $cmt->id }}"> Send reply content</button>
                                        </form>

                                        {{-- Các bình luận con --}}
                                        <div class="list-comment-child" id="list-comment-child-{{ $cmt->parent_id }}">
                                            @foreach ($cmt->replies as $child)
                                                <div class="comment-child comment-child-{{$child->id}}">
                                                    <a href="" class="pull-left">
                                                        <img src="{{ url('/storage/images/8TQiZiKflGgyajQYuVjVANgMjH2vBAvxZTNn2vGX.jpg') }}"
                                                            alt="" class="avatar" width="60px">
                                                    </a>

                                                    <div class="media-comment-body">
                                                        <h4 name="fullname"> {{ $child->user->fullname }} <small
                                                                class="created_at" style="color: #5555558f">
                                                                {{ $child->created_at->format('d/m/Y') }}
                                                            </small>
                                                        </h4>
                                                        <p name="content" id="content-{{ $child->id }}">
                                                            {{ $child->content }}
                                                        </p>
    
                                                        <div class="text-right">
                                                            @can('my-comment', $child)
                                                            <a href="" class="btn-edit-child" id="btn-edit-child-{{ $child->id}}" data-id_comment="{{ $child->id }}"
                                                                data-content="{{ $child->content }}">Edit</a>                                                                <form action="{{ route('comment.destroy', $child->id) }}"
                                                                    method="post" class="delete-comment">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn-delete-reply"
                                                                        data-comment_id="{{ $child->id }}">Delete
                                                                    </button>
                                                                </form>
                                                                <a class="btn-reply" href=""
                                                                    data-id_comment="{{ $child->id }}">Reply
                                                                </a>
                                                            @endcan
                                                        </div>
                                                        {{-- Form edit --}}
                                                        <form action="" method="POST" style="display:none"
                                                            class="form-edit-comment-parent"
                                                             id="form-edit-{{ $child->id }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <textarea name="content-edit" id="text-edit-{{ $child->id }}" cols="70" rows="6" placeholder="Enter content (*)"
                                                                class="content-edit" required="required"></textarea>

                                                            <button class="btnsave-update" type="submit"
                                                                data-id_comment="{{ $child->id }}">Update
                                                                Content</button>
                                                        </form>

                                                        {{-- Form reply --}}
                                                        <form action="" method="POST" style="display:none"
                                                            class="form-post-comment-grandchildren"
                                                            id="form-reply-{{ $child->id }}">
                                                            @csrf
                                                            @method('POST')
                                                            <textarea name="content-reply" id="text-note-{{ $child->id }}" cols="70" rows="6" placeholder="Enter content (*)"
                                                                class="content-reply" required="required"></textarea>

                                                            <button class="btnsave-reply-p2" type="submit"
                                                                data-id_comment="{{ $child->id }}"> Send reply
                                                                content</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
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
