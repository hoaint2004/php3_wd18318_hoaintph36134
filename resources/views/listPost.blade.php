<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1>Danh sách Bài viết</h1>
    {{-- Hiển thị tài khoản --}}

    @auth
        <div class="">
            Fullname: {{ Auth::user()->fullname}}
            <a href="{{Route('logout')}}">Logout</a>
        </div>
    @endauth
    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}    
        </div>
    
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">View</th>
                <th scope="col">Cate</th>
                <th scope="col"> 
                    <a href="{{route('post.create')}}" class="btn btn-primary">Thêm Mới</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $posts as $post )
                <tr>
                    <th scope="col">{{ $post->id}}</th>    
                    <td>{{ $post->title}}</td>
                    <td>
                        <img src="{{asset('/storage/' .$post->image)}}" alt="" width="60">
                    </td>
                    <td>{{ $post ->description}}</td>
                    <td>{{ $post->view}}</td>
                    <td>{{ $post->category->name}}</td>
                    <td class="d-flex gap-1">
                        <a href="{{route('post.edit', $post)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('post.destroy', $post)}}" method="post">
                            {{-- @csrf :Chống spam --}}
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có muốn xóa không?')" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    
                </tr>       
            @endforeach    
        </tbody>
    </table>
    {{ $posts->links() }}

  </body>
</html>