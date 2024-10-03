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
                        $('#load-more-post' + categoryId).html('Loading...'); //Thay đổi trạng thái button trong quá trình xử lý dữ liệu
                        $('#load-more-post' + categoryId).attr('disabled', true); // Vô hiệu hóa button trong suốt quá trình xử lý dữ liệu
                    },

                    success: function(response) { //Hàm chạy nếu yêu cầu được gửi đi thành công
                        console.log("Dữ liệu đã được gửi thành công", response.data);

                        if (response.data.length > 0) { // Kiểm tra dữ liệu, nếu độ dài của mảng response.data >0 sẽ thực hiện in ra
                            var html = ''; // Khai báo biến html rỗng để nối chuỗi
                            for (var i = 0; i < response.data.length; i++) { // Duyệt qua từng phần tử trong mảng response.data 
                                
                                var imageUrl = '/storage/' + response.data[i].image; // Ghép nối chuỗi URL với hình ảnh của đối tượng response.data[i]
                                var categoryUrl = '/category/' + response.data[i].cate_id; //Tạo đường dẫn đến danh mục tương ứng 
                                var cate = response.data[i].category.name; // Lấy tên danh mục của đối tượng response.data[i] liên kết với bảng category
                                var postUrl = '/detailpost/' + response.data[i].id; // Tạo đường dẫn đến trang chi tiết của bài viết

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
                            $('#content' + categoryId).append(html); // Gắn nội dung html vào phần tử có ID 'content' 
                            $('#load-more-post' + categoryId).html('Load More'); // Chuyển trạng thái button sau khi in ra dữ liệu
                            $('#load-more-post' + categoryId).attr('disabled', false); // Chuyển trạng thái button về false, để có thể tiếp tục kích hoạt

                            postId = response.data[response.data.length - 1].id; // Lấy giá trị Id của đối tượng cuối cùng trong mảng response.data để tiếp tục gửi yêu cầu đi nếu click
                            $('#load-more-post' + categoryId).data('post_id', postId); // Gán giá trị Id cuối cùng của mảng cho data-post_id để thực hiện yêu cầu tiếp theo nếu có
                            
                        } else { 
                            $('#load-more-post' + categoryId).html('No More Data Available'); // Cập nhật nội dung button khi không còn dữ liệu để tải thêm
                            $('#load-more-post' + categoryId).attr('disabled', true); // Vô hiệu hóa button trong trạng thái không còn dữ liệu để tải thêm
                        }

                        start = response.next; // Cập nhật giá trị start để lần yêu cầu tiếp theo sẽ bắt đầu từ vị trí mới
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
    </script>
</body>

</html>
