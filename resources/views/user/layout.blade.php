<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('header.css') }}">
    <link rel="stylesheet" href="{{ asset('home.css') }}">
    <link rel="stylesheet" href="{{ asset('footer.css') }}">
    <link rel="stylesheet" href="{{ asset('search.css') }}">
    <title>@yield('title')</title>

    <style>
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;

        }

        article {
            margin: 50px;
        }


        @media (max-width: 1200px) {
            body {
                max-width: 100vw;
                /* Đảm bảo không vượt quá chiều rộng của viewport */

            }

            article {
                margin: 40px;

            }

        }

        @media (max-width: 992px) {
            body {
                max-width: 100vw;
                /* Đảm bảo không vượt quá chiều rộng của viewport */

            }

            article {
                margin: 30px;
            }

        }

        @media (max-width: 768px) {
            article {
                margin: 20px;
            }

        }

        @media (max-width: 576px) {
            article {
                margin: 15px;
            }

        }
    </style>
</head>

<body>
    <header>
        @include('user.header')
    </header>

    <article>
        @yield('content')
    </article>

    <footer>
        @include('user.footer')
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var start = 6; //biến để lưu giá trị vị trí bắt đầu load

            $('.load-more-post').click(function() {
                var categoryId = $(this).data('category_id'); //Lấy dữ liệu category_id từ 'load-more-post'
                var postId = $(this).data('post_id');

                console.log({
                    start: start,
                    categoryId: categoryId,
                    postId: postId
                });

                $.ajax({
                    url: "{{ route('load.more') }}",
                    method: "GET",
                    data: {
                        start: start,
                        categoryId: categoryId,
                        postId: postId
                    },

                    dataType: "json",

                    beforeSend: function() {
                        $('#load-more-post' + categoryId).html('Loading...');
                        $('#load-more-post' + categoryId).attr('disabled', true);
                    },

                    success: function(response) {
                        console.log("Dữ liệu đã được gửi thành công", response.data);

                        console.log({
                            start: start,
                            categoryId: categoryId,
                            postId: postId
                        });

                        if (response.data.length > 0) {
                            var html = '';
                            for (var i = 0; i < response.data.length; i++) {
                                var imageUrl = '/storage/' + response.data[i].image;
                                var categoryUrl = '/category/' + response.data[i].cate_id;
                                var cate = response.data[i].category.name;

                                var postUrl = '/detailpost/' + response.data[i].id;

                                html += `
                              <div class="box2">
                                <div class="picture">
                                    <span class="icon-image">
                                        <i class="fa-regular fa-image"></i>
                                    </span>
                                <img src="` + imageUrl + `" alt="` + response.data[i]
                                    .image + `" style="max-width:100%">
                                    <span class="btn-image">
                                        <a href="` + categoryUrl + `"
                                            style="background-color: #62ce5c" class="btn">` + cate + `</a>
                                    </span>
                                </div>
                                <h3>
                                    <a href="` + postUrl + `">
                                        ` + response.data[i].title + `
                                    </a>
                                </h3>

                                <div class="note">
                                    <p class="icon1"><i class="fa fa-user"></i>` + response.data[i].view + `</p>
                                    <p> <i class="fa-solid fa-p en"></i>` + response.data[i].created_at + `</p>
                                    <p><i class="fa-regular fa-clock"></i>` + response.data[i].updated_at + `</p>
                                </div>
                                <p>` + response.data[i].description + `</p>
                            </div>  
                            `;
                            }
                            $('#content' + categoryId).append(html);
                            $('#load-more-post' + categoryId).html('Load More');
                            $('#load-more-post' + categoryId).attr('disabled', false);

                            postId = response.data[response.data.length - 1].id;
                            $('#load-more-post' + categoryId).data('post_id', postId);
                            
                        } else {
                            $('#load-more-post' + categoryId).html('No More Data Available');
                            $('#load-more-post' + categoryId).attr('disabled', true);
                        }

                        start = response.next;
                    },
                    error: function(xhr, status, error) {
                        console.log("Lỗi: ", error);
                    }
                });
            });
        });
    </script>
</body>

</html>
