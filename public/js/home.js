$(document).ready(function () {
    var start = 6;

    $('.load-more-post').on('click', function () {
        var categoryId = $(this).data('category_id');
        var postId = $(this).data('post_id');

        $.ajax({
            url: '/load-more-post/',
            method: 'GET',
            data: {
                start: start,
                categoryId: categoryId,
                postId: postId
            },
            dataType: 'json',
            beforeSend: function () {
                $('#load-more-post' + categoryId).text('Loading...').prop('disabled', true);
            },
            success: function (response) {
                if (response.data && response.data.length > 0) {
                    var html = '';
                    response.data.forEach(function (post) {
                        var imageUrl = '/storage/' + post.image;
                        var categoryUrl = '/category/' + post.cate_id;
                        var postUrl = '/detailpost/' + post.id;

                        html += `
                            <div class="box2">
                                <div class="picture">
                                    <span class="icon-image">
                                        <i class="fa-regular fa-image"></i>
                                    </span>
                                    <img src="${imageUrl}" alt="${post.image}" style="max-width:100%">
                                    <span class="btn-image">
                                        <a href="${categoryUrl}" style="background-color: #62ce5c" class="btn">${post.category.name}</a>
                                    </span>
                                </div>
                                <h3>
                                    <a href="${postUrl}">${post.title}</a>
                                </h3>
                                <div class="note">
                                    <p class="icon1"><i class="fa fa-user"></i> ${post.view}</p>
                                    <p><i class="fa-solid fa-pen"></i> ${post.created_at}</p>
                                    <p><i class="fa-regular fa-clock"></i> ${post.updated_at}</p>
                                </div>
                                <p>${post.description}</p>
                            </div>`;
                    });

                    $('#content' + categoryId).append(html);
                    $('#load-more-post' + categoryId).text('Load More').prop('disabled', false);

                    postId = response.data[response.data.length - 1].id;
                    $('#load-more-post' + categoryId).data('post_id', postId);

                    start = response.next;
                } else {
                    $('#load-more-post' + categoryId).text('No More Data Available').prop('disabled', true);
                }
            },
            fail: function (xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });

    $('#btnsave').on('click', function (event) {
        event.preventDefault();
        var content = $('#content').val();
        var id_post = $(this).data('comment');
        var path_img = window.location.origin + '/storage/images/8TQiZiKflGgyajQYuVjVANgMjH2vBAvxZTNn2vGX.jpg';
        var commentUrl = '/comment/' + id_post;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: commentUrl,
            method: 'POST',
            data: {
                content: content
            },
            dataType: 'json',
            success: function (response) {
                if (response.error) {
                    console.error("Có lỗi xảy ra:", response.error);
                } else {
                    var commentDestroy = '/comment/destroy/' + response.data.id;
                    var htmlComment = `
                        <div class="comment-parent" id="comment-parent-${response.data.comment.id}">
                            <a href="" class="pull-left">
                                <img src="${path_img}" alt="" class="avatar" width="60px">
                            </a>
                            <div class="media-comment-body">
                                <h4 name="fullname">${response.data.user.fullname}
                                    <small class="created_at" style="color: #5555558f">${response.data.comment.created_at}</small>
                                </h4>
                                <p name="content">${response.data.comment.content}</p>
                                <div class="text-right">
                                    <a href="" class="btn-edit">Edit</a>
                                    <form action="${commentDestroy}" method="post" class="delete-comment">
                                        <button type="submit" class="btn-delete" data-comment_id="${response.data.comment.id}">Delete</button>
                                    </form>
                                    <a class="btn-reply" href="" data-id_comment="${response.data.comment.id}">Reply</a>
                                </div>
                                <form action="" method="POST" style="display:none" class="form-post-comment-child" id="form-reply-${response.data.comment.id}">
                                    <textarea name="content-reply" cols="70" rows="6" placeholder="Enter content (*)" class="text-note-${response.data.comment.id}" required></textarea>
                                    <button class="btnsave-reply" type="submit" data-id_comment="${response.data.comment.id}">Send reply content</button>
                                </form>
                            </div>
                        </div>`;

                    $('.media-comment').prepend(htmlComment);
                    $('#content').val('');
                }
            },
            fail: function (xhr, status, error) {
                console.error("Có lỗi xảy ra:", xhr.responseText);
            }
        });
    });

    $(document).on('click', '.btn-reply', function (ev) {
        ev.preventDefault();
        var id = $(this).data('id_comment');
        var form_reply = '#form-reply-' + id;

        $('.form-post-comment-child').slideUp();
        $(form_reply).slideDown();
    });
});


        // Xử lý dữ liệu btnsave-reply
        $(document).on('click', '.btnsave-reply', function(ev) {
            ev.preventDefault();
            var id = $(this).data('id_comment');
            var comment_reply_id = '.text-note-' + id;
            var contentReply = $(comment_reply_id).val();
            var form_reply = '#form-reply-' + id;

            $('#form-reply' + id).slideUp();

            var id_post = $(this).data('comment');

            var commentUrl = '/comment/' + id_post;

            var path_img = window.location.origin + '/storage/images/8TQiZiKflGgyajQYuVjVANgMjH2vBAvxZTNn2vGX.jpg';
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: commentUrl,
                method: 'POST',
                data: {
                    content: contentReply,
                    parent_id: id,
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
                                        <img src=" `+ path_img + `"
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
            var content = $(this).attr('data-content');
            var form_reply = '#form-reply-' + id_comment;
            var form_edit = '#form-edit-' + id_comment;

            $(form_reply).slideUp();
            $(form_edit).slideDown();

            $('#form-edit-' + id_comment).show().val(content);
            $('#form-edit-' + id_comment).find('#text-edit-' + id_comment).val(
                content); // Gán nội dung vào textarea
            });
            
            $('.btnsave-update').click(function(ev) {
                ev.preventDefault(); // Ngăn không reload lại trang
                var id_comment = $(this).data('id_comment');
                var form_edit = '#form-edit-' + id_comment;
                var content_update = $(form_edit).find('#text-edit-' + id_comment)
                    .val(); // Lấy nội dung từ textarea
                   
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

                        $(form_edit).hide();
                        $('#content-' + id_comment).html(response.data.content);
                        content_updated = response.data.content;
                        $('#btn-edit-' + id_comment).attr('data-content', content_updated);
                        $('#form-edit-' + id_comment).find('#text-edit-' +id_comment).val(content_updated).show();
                    },
                    error: function(xhr, status, error) {
                        console.error('Có lỗi xảy ra: ' + error);
                    }
                });
    
            });



        // Sửa comment "btnsave-update" child
        $('.btn-edit-child').click(function(ev) {
            ev.preventDefault(); // Ngăn không reload lại trang
            var id_comment = $(this).data('id_comment');
            var content = $(this).attr('data-content');
            var form_reply = '#form-reply-' + id_comment;
            var form_edit = '#form-edit-' + id_comment;


            $(form_reply).slideUp();
            $(form_edit).slideDown();

            $('#form-edit-' + id_comment).show().val(content);
            $('#form-edit-' + id_comment).find('#text-edit-' + id_comment).val(
                content); // Gán nội dung vào textarea

        });

        $('.btnsave-update').click(function(ev) {
            ev.preventDefault(); // Ngăn không reload lại trang
            var id_comment = $(this).data('id_comment');
            var form_edit = '#form-edit-' + id_comment;
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
                    _method: 'PUT',
                    id_comment: id_comment,
                    content: content_update
                },

                success: function(response) {
                    console.log(response.data);
                    $(form_edit).hide();
                        $('#content-' + id_comment).html(response.data.content);
                        content_updated = response.data.content;
                        $('#btn-edit-child-' + id_comment).attr('data-content', content_updated);
                        $('#form-edit-' + id_comment).find('#text-edit-' + id_comment).val(content_updated).show();
                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra: ' + error);
                }
            });

        });

        $(document).on('click', '.btn-delete', function(ev) {
            ev.preventDefault();
            var comment_id = $(this).data('comment_id');

            if (confirm('Do you want to delete?')) {
                $.ajax({
                    url: '/comment/delete/' + comment_id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
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
