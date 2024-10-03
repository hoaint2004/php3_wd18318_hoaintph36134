<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ resource_path('css/app.css')}}">
  </head>
  <body>

    <div class="container w-50">
        <h1>Register</h1>
        <form action="{{ route('postRegister') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="" class="form-label">Fullname</label>
                <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}">
                @error('fullname')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
                @error('username')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                @error('email')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                @error('password')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="{{ old('confirm_password') }}">
                @error('confirm_password')
                    <span style="color:red">{{ $message }}</span>
                @enderror
            </div> --}}
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <div class="mb-3">
                <a href="{{route('postLogin')}}">Login</a>
            </div>
        </form>    
    </div>
</body>
</html>