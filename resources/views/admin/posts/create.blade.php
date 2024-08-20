<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thêm Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container m-4">
        <h1>Thêm mới bài viết</h1>
        <a href="{{ route('post.index') }}" class="btn btn-primary">List</a>

        {{-- Hiển thị thông báo validate ở trên cùng form --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" id="" name="title" value="{{ old('title') }}">
                {{-- Hiển thị thông báo validate ở dưới input --}}
                @error('title')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Image</label>
                <input class="form-control" type="file" name="image">
                {{-- Hiển thị thông báo validate ở dưới input --}}
        @error('image')
        <span style="color:red">{{$message}}</span>
    @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" id="" name="description" rows="6">{{ old('description') }}</textarea>
                {{-- Hiển thị thông báo validate ở dưới input --}}
        @error('description')
        <span style="color:red">{{$message}}</span>
    @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Content</label>
                <textarea class="form-control" id="" name="content" rows="6">{{ old('content') }}</textarea>
                {{-- Hiển thị thông báo validate ở dưới input --}}
                @error('content')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">View</label>
                <input type="number" name="view" class="form-control" id="" value="{{ old('view') }}">
                {{-- Hiển thị thông báo validate ở dưới input --}}
                @error('view')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Category</label>
                <select name="cate_id" id="" class="form-select">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}" @if ($cate->id == old('cate_id')) selected @endif>
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>



    </div>

</body>

</html>
