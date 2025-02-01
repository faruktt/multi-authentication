<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wb software Login</title>
    <link rel="stylesheet" href="{{ asset('backend') }}/log.css">
</head>
<body>
    <div class="login-container">
        <h1>Customer login</h1>
        <form action="{{ route('customer.login') }}" method="POST">
        @csrf
            <input type="text" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
            <p class="form-group text-center">Don't have an account? <a href="{{ route('login_page') }}" class="btn-link">Create One</a> </p>
        </form>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>
