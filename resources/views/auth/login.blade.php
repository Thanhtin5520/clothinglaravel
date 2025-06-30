<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <hr>
        <div class="social-login">
            <h2>Or Login With</h2>
            <a href="{{ route('social.login', ['provider' => 'facebook']) }}" class="btn btn-facebook">Login with Facebook</a>
            <a href="{{ route('social.login', ['provider' => 'google']) }}" class="btn btn-google">Login with Google</a>
        </div>
    </div>
</body>
</html>
