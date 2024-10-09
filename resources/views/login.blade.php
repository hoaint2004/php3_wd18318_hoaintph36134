<link rel="stylesheet" href="{{ asset('login-register.css') }}">
<div class="wrapper">
    @if (session('errorLogin'))
        <div class="alert alert-danger">
            {{ session('errorLogin') }}
        </div>
    @endif
    <form action="{{ route('postLogin') }}" method="POST">
        @csrf
        <h2>Welcome</h2>
        <div class="input-field">
            <input type="email" name="email" required>
            <label for="">Enter your email</label>
        </div>

        <div class="input-field">
            <input type="password" name="password" required>
            <label for="">Enter your password</label>
        </div>

        <div class="forget">
            <label for="remember">
                <input type="checkbox" name="" id="remember">
                <p>Remember me</p>
            </label>

            <a href="#">Forgot password?</a>
        </div>

        <button type="submit">Login</button>

        <div class="register">
            <p>Don't have an account?
                <a href="{{ route('postRegister') }}">Register</a>
            </p>
        </div>
    </form>
</div>
