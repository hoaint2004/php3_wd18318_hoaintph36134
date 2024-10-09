<link rel="stylesheet" href="{{ asset('login-register.css') }}">
<div class="wrapper">
    <form action="{{ route('postRegister') }}" method="post">
        @csrf
        <h2>Register</h2>
        <div class="input-field">
            <input type="text" name="fullname" required>
            <label for="">Enter your fullname</label>
            @error('fullname')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input type="text" name="username" required>
            <label for="">Enter your username</label>
            @error('username')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input type="email" name="email" required>
            <label for="">Enter your email</label>
            @error('email')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input type="password" name="password" required>
            <label for="">Enter your password</label>
            @error('password')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-field">
            <input type="password" name="confirm_password" required>
            <label for="">Confirm Password</label>
            @error('confirm_password')
                <span style="color:red">{{ $message }}</span>
            @enderror
        </div>

        <div class="forget" style="display:none">
            <label for="remember">
                <input type="checkbox" name="" id="remember">
                <p>Remember me</p>
            </label>

            <a href="#">Forgot password?</a>
        </div>

        <button type="submit">Register</button>

        <div class="login">
            <p>Don't have an account?
                <a href="{{ route('postLogin') }}">Login</a>
            </p>
        </div>
    </form>
</div>
