<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
    <body>
        <h2>Đăng nhập</h2>
        <form method="POST" action="{{ route('login') }}" >
            @csrf
            <label>Username:</label>
            <input type="text" id="email" placeholder="enter username">
            <br><br>
            <label>Password:</label>
            <input type="password" id="password" placeholder="enter password">
            <br><br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>
