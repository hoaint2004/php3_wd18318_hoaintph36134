<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách danh mục</title>
</head>
<body>
    <h1>Danh mục</h1>
    <table border="1">
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>
                <a href="#">Thêm mới</a>
            </th>
            @foreach ( $posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title}}</td>
                    <td> <img src="{{asset('storage/' .$post->image)}}" alt="{{$post->image}}" width="60"></td>
                    <td>{{ $post->description}}</td>
                    <td>{{ $post->content}}</td>
                    <td>{{ $post->view}}</td>
                    <td>{{ $post->cate_id}}</td>
                    <td>
                        <a href="{{route('post.edit', $post)}}" class="btn btn-warning">Sửa</a>
                        <form action="{{route('post.destroy', $post)}}">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                        </form>
                        Delete
                    </td>
                </tr>
                
            @endforeach
        </tr>
    </table>
</body>
</html>