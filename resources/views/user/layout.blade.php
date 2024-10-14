<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

            $('.load-more-post').click(function() { // Gán sự kiện click cho class 'load-more-post'
                var categoryId = $(this).data('category_id'); //Lấy dữ liệu category_id từ 'load-more-post'
                var postId = $(this).data('post_id'); // lấy dữ liệu post_id từ 'load-more-post'

                $.ajax({
                    url: "{{ route('load.more') }}", // Đường dẫn mà yêu cầu Ajax gửi đến
                    method: "GET", //Phương thức yêu cầu sử dụng
                    data: { // Tất cả các dữ liệu cần gửi đi 
                        start: start,
                        categoryId: categoryId,
                        postId: postId
                    },

                    dataType: "json", // Kiểu dữ liệu muốn trả về

                    beforeSend: function() { //hàm chạy trước khi yêu cầu được gửi đi 
                        $('#load-more-post' + categoryId).html(
                            'Loading...'
                        ); //Thay đổi trạng thái button trong quá trình xử lý dữ liệu
                        $('#load-more-post' + categoryId).attr('disabled',
                            true); // Vô hiệu hóa button trong suốt quá trình xử lý dữ liệu
                    },

                    success: function(response) { //Hàm chạy nếu yêu cầu được gửi đi thành công
                        console.log("Dữ liệu đã được gửi thành công", response.data);

                        if (response.data.length >
                            0
                        ) { // Kiểm tra dữ liệu, nếu độ dài của mảng response.data >0 sẽ thực hiện in ra
                            var html = ''; // Khai báo biến html rỗng để nối chuỗi
                            for (var i = 0; i < response.data
                                .length; i++
                            ) { // Duyệt qua từng phần tử trong mảng response.data 

                                var imageUrl = '/storage/' + response.data[i]
                                    .image; // Ghép nối chuỗi URL với hình ảnh của đối tượng response.data[i]
                                var categoryUrl = '/category/' + response.data[i]
                                    .cate_id; //Tạo đường dẫn đến danh mục tương ứng 
                                var cate = response.data[i].category
                                    .name; // Lấy tên danh mục của đối tượng response.data[i] liên kết với bảng category
                                var postUrl = '/detailpost/' + response.data[i]
                                    .id; // Tạo đường dẫn đến trang chi tiết của bài viết

                                // Tiến hành nối chuỗi html 
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
                            $('#content' + categoryId).append(
                                html); // Gắn nội dung html vào phần tử có ID 'content' 
                            $('#load-more-post' + categoryId).html(
                                'Load More'); // Chuyển trạng thái button sau khi in ra dữ liệu
                            $('#load-more-post' + categoryId).attr('disabled',
                                false
                            ); // Chuyển trạng thái button về false, để có thể tiếp tục kích hoạt

                            postId = response.data[response.data.length - 1]
                                .id; // Lấy giá trị Id của đối tượng cuối cùng trong mảng response.data để tiếp tục gửi yêu cầu đi nếu click
                            $('#load-more-post' + categoryId).data('post_id',
                                postId
                            ); // Gán giá trị Id cuối cùng của mảng cho data-post_id để thực hiện yêu cầu tiếp theo nếu có

                        } else {
                            $('#load-more-post' + categoryId).html(
                                'No More Data Available'
                            ); // Cập nhật nội dung button khi không còn dữ liệu để tải thêm
                            $('#load-more-post' + categoryId).attr('disabled',
                                true
                            ); // Vô hiệu hóa button trong trạng thái không còn dữ liệu để tải thêm
                        }

                        start = response
                            .next; // Cập nhật giá trị start để lần yêu cầu tiếp theo sẽ bắt đầu từ vị trí mới
                    },
                    error: function(xhr, status, error) {
                        // xhr: Đối tượng XMLHttpRequest đại diện cho yêu cầu AJAX. 
                        // status: Trạng thái của yêu cầu
                        // error: Chuỗi mô tả lỗi  
                        console.log("Lỗi: ", error); // In ra thông báo lỗi
                    }
                });
            });
        });

        var _csrf = '{{ csrf_token() }}';
        var commentUrl = '{{ route('comment_post', $post->id) }}';

        // Hiển thị comment parent
        $('#btnsave').click(function(event) {
            event.preventDefault();
            var content = $('#content').val();
            // $('.media-comment').prepend('aaaaaaaa');
            // return false;
            $.ajax({
                url: commentUrl,
                method: 'POST',
                data: {
                    content: content,
                    _token: _csrf
                },

                dataType: "json",

                success: function(response) {
                    if (response.error) {
                        console.error("Có lỗi xảy ra:", error);
                    } else {
                        var commentDestroy = '/comment/destroy' + response.data.id;
                        var cmt = response.data.comment;
                        var htmlComment = `
                            <div class="comment-parent" id="comment-parent-` + response.data.comment.id + `">
                                    <a href="" class="pull-left">
                                        <img src="{{ url('/storage/images/8TQiZiKflGgyajQYuVjVANgMjH2vBAvxZTNn2vGX.jpg') }}"
                                            alt="" class="avatar" width="60px">
                                    </a>

                                    <div class="media-comment-body">
                                        <h4 name="fullname"> ` + response.data.user.fullname + `
                                            <small class="created_at" style="color: #5555558f">
                                               ` + response.data.comment.created_at + `
                                            </small>
                                        </h4>
                                        <p name="content" id="content-{{ `+ response.data.comment.id+` }}">
                                           ` + response.data.comment.content + `
                                        </p>

                                        <div class="text-right">
                                            <a href="" class="btn-edit">Edit</a>
                                                <form action="` + commentDestroy + `"
                                                    method="post" class="delete-comment">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button 
                                                        type="submit" class="btn-delete" data-comment_id="` + response
                            .data.comment.id + `">Delete</button>
                                                </form>
                                            <a class="btn-reply" href=""
                                                data-id_comment="` + response.data.comment.id + `">Reply
                                            </a>
                                        </div>
                                        <form action="" method="POST" style="display:none"
                                            class="formReply form-reply-` + response.data.comment.id + `">
                                            @csrf
                                            @method('POST')
                                            <textarea name="content-reply" id="" cols="70" rows="6" placeholder="Enter content (*)"
                                                class="text-note-` + response.data.comment.id + `" required="required"></textarea>

                                            <button class="btnsave-reply" type="submit"
                                                data-id_comment="` + response.data.comment.id + `"> Send reply content</button>
                                        </form>
                                    </div>
                                </div>
                        `;

                        // prepend : in ra ngay ở vị trí đầu tiên
                        $('.media-comment').prepend(htmlComment);

                        // Xóa nội dung trong form sau khi gửi dữ liệu
                        $('#content').val('');

                        // Ẩn form sau khi gửi 
                        // $('#form-post-comment').hide();
                    }
                },

                error: function(xhr, status, error) {
                    console.error("Có lỗi xảy ra:", xhr.responseText);
                }
            });
        });

        // Hiển thị comment child
        $(document).on('click', '.btn-reply', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id_comment');
            var comment_reply_id = '.text-note-' + id;
            var contentReply = $(comment_reply_id).val();
            var form_reply = '.form-reply-' + id;
            var form_edit = '.form-edit-' + id;

            $('.formReply').slideUp();
            $(form_reply).slideDown();
            $(form_edit).slideUp();

            $('.formReply button').removeClass('btnsave-update-reply');

            $('.formReply button').addClass('btnsave-reply');
            $('#content-reply').val('');
        });

        // Xử lý dữ liệu btnsave-reply
        $(document).on('click', '.btnsave-reply', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id_comment');
            var comment_reply_id = '.text-note-' + id;
            var contentReply = $(comment_reply_id).val();
            var form_reply = '.form-reply-' + id;

            $('.formReply').slideUp();

            $.ajax({
                url: commentUrl,
                method: 'POST',
                data: {
                    content: contentReply,
                    parent_id: id,
                    _token: _csrf
                },

                dataType: "json",

                success: function(response) {
                    if (response.error) {
                        console.error("Có lỗi xảy ra:", error);
                    } else {
                        var commentDestroy = '/comment/destroy' + response.data.id;
                        var htmlComment = `
                                <div class="comment-child">
                                    <a href="" class="pull-left">
                                        <img src="{{ url('/storage/images/8TQiZiKflGgyajQYuVjVANgMjH2vBAvxZTNn2vGX.jpg') }}"
                                            alt="" class="avatar" width="60px">
                                    </a>

                                <div class="media-comment-body">
                                    <h4 name="fullname">` + response.data.user.fullname + ` <small class="created_at" style="color: #5555558f">
                                            ` + response.data.comment.created_at + `
                                        </small>
                                    </h4>
                                    <p name="content">
                                        ` + response.data.comment.content + `
                                    </p>

                                    <div class="text-right">
                                        <a href="" class="btn-edit">Edit</a>
                                        <form action="` + commentDestroy + `" method="post" class="delete-comment">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" class="btn-delete-reply" data-comment_id="` + response
                            .data.comment.id + `">Delete
                                            </button>
                                        </form>
                                        <a class="btn-reply" href=""
                                            data-id_comment="` + response.data.comment.id + `">Reply
                                        </a>
                                    </div>

                                     <form action="" method="POST" style="display:none"
                                            class="formReply form-reply-` + response.data.comment.id + `">
                                        @csrf
                                        @method('POST')
                                        <texta name="content-reply" id="" cols="70" rows="6" placeholder="Enter content (*)"
                                            class="text-note-` + response.data.comment.id + `" required="required"></texta
                                        <button class="btnsave-reply" type="submit"
                                            data-id_comment="` + response.data.comment.id + `"> Send reply
                                            content</button>
                                    </form>
                                </div>
                            </div>
                        `;

                        // $('.comment-parent').append(htmlComment);
                        // prepend : in ra ngay ở vị trí đầu tiên
                        $('.list-comment-child').prepend(htmlComment);


                        // Xóa nội dung trong form sau khi gửi dữ liệu
                        $('#content-reply').val('');

                        // Ẩn form sau khi gửi 
                        // $(form_reply).hide();
                    }
                },

                error: function(xhr, status, error) {
                    console.error("Có lỗi xảy ra:", xhr.responseText);
                }
            });
        });

        // Sửa comment "btnsave-update" parent
        $('.btn-edit').click(function(ev) {
            ev.preventDefault(); // Ngăn không reload lại trang
            var id_comment = $(this).data('id_comment');
            var content = $(this).data('content');
            var form_reply = '.form-reply-' + id_comment;
            var form_edit = '.form-edit-' + id_comment;

            $(form_reply).slideUp();
            $(form_edit).slideDown();

            $('.form-edit-' + id_comment).show().val(content);
            $('.form-edit-' + id_comment).find('#text-edit-' + id_comment).val(
                content); // Gán nội dung vào textarea

            // $('.formReply button').removeClass('btnsave-reply');
            // $('.formReply button').addClass('btnsave-update-reply');
 
        });
        
        $('.btnsave-update').click(function(ev) {
            ev.preventDefault(); // Ngăn không reload lại trang
            var id_comment = $(this).data('id_comment');
            var form_edit = '.form-edit-' + id_comment;
            var content_update = $(form_edit).find('#text-edit-' + id_comment)
                .val(); // Lấy nội dung từ textarea

            $('#content' + id_comment).text(content_update);
            $.ajax({
                url: '/comment/edit/' + id_comment,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                data: {
                    _method     : 'PUT',
                    id_comment  : id_comment,
                    content     : content_update
                },

                success: function(response) {
                    // console.log("ok1234567")
                    // console.log(response.data);
                    // $('#text-edit-274').val('Some Message here');
                    // $('#text-edit-274').text('Some Message here');
                    //     console.log($('#text-edit-274').val());
                     $(form_edit).hide();

                    $('#content-' + id_comment).html(response.data.content);
            
                    $('.form-edit-' + id_comment).find('#content-edit-' + id_comment).val(
                            response.data.content); // Gán nội dung vừa cập nhật vào textarea

                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra: ' + error);
                }
            });

        });



        // Sửa comment "btnsave-update" child
        // $('.btn-edit-child').click(function(ev) {
        //     ev.preventDefault(); // Ngăn không reload lại trang
        //     var id_comment = $(this).data('id_comment');
        //     var content = $(this).data('content');
        //     var form_reply = '.form-reply-' + id_comment;
        //     var form_edit = '.form-edit-' + id_comment;


        //     $(form_reply).slideUp();
        //     $(form_edit).slideDown();

        //     $('.form-edit-' + id_comment).show().val(content);
        //     $('.form-edit-' + id_comment).find('.text-edit-' + id_comment).val(
        //         content); // Gán nội dung vào textarea

        // });

        // $('.btnsave-update').click(function(ev) {
        //     ev.preventDefault(); // Ngăn không reload lại trang
        //     var id_comment = $(this).data('id_comment');
        //     var form_edit = '.form-edit-' + id_comment;
        //     var content_update = $(form_edit).find('.text-edit-' + id_comment)
        //         .val(); // Lấy nội dung từ textarea

        //     $('#content' + id_comment).text(content_update);
        //     $.ajax({
        //         url: '/comment/edit/' + id_comment,
        //         type: 'PUT',
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },

        //         data: {
        //             _method: 'PUT',
        //             id_comment: id_comment,
        //             content: content_update
        //         },

        //         success: function(response) {
        //             // alert(response.data.content);

        //             $(form_edit).hide();
        //             $('#content-' + id_comment).html(response.data.content);

        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Có lỗi xảy ra: ' + error);
        //         }
        //     });

        // });

        $(document).on('click', '.btn-delete', function(ev) {
            ev.preventDefault();
            var comment_id = $(this).data('comment_id');

            if (confirm('Do you want to delete?')) {
                $.ajax({
                    url: '/comment/delete/' + comment_id,
                    type: 'DELETE',
                    data: {
                        _token: _csrf
                    },

                    success: function(response) {
                        $('#comment-parent-' + comment_id).fadeOut(300, function() {
                            $(this).remove(); // Sau khi ẩn dần thì xóa comment khỏi DOM
                        });
                        // alert(response.message); // Hiển thị thông báo sau khi xóa thành công
                    },
                    error: function(xhr) {
                        alert('Something went wrong!');
                    }
                });
            }
        });

        $(document).on('click', '.btn-delete-reply', function(ev) {
            ev.preventDefault();
            var comment_id = $(this).data('comment_id');
            var parent_id = $(this).data('parent_id')
            if (confirm('Do you want to delete?')) {
                $.ajax({
                    url: '/comment/delete/' + comment_id,
                    type: 'DELETE',
                    data: {
                        _token: _csrf
                    },

                    success: function(response) {

                        console.log(comment_id);
                        $('.comment-child-' + comment_id).fadeOut(300, function() {
                            $(this).remove(); // Sau khi ẩn dần thì xóa comment khỏi DOM
                        });
                    },
                    error: function(xhr) {
                        alert('Something went wrong!');
                    }
                });
            }
        });
    </script>
</body>

</html>
