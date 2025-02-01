<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend') }}/reg.css">
    <title> Registration</title>
    <style>

    </style>
</head>
<body>
    <div class="register-container">
        <h1>Create an Account</h1>
        <form action="{{ route('customer.store') }}" method="post">
        @csrf
            <input type="text" name="username" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Register">
        </form>
        <p class="form-group text-center">Already have an account! <a href="{{ route('customer') }}" class="btn-link">Login</a> </p>
    </div>
</body>
</html>
