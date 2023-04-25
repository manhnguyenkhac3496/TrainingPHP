<!DOCTYPE html>
<html>
<head>
    <title>Regis user!</title>
</head>
<body>
<h1>Regis User Form</h1>
<form action="{{route('regis')}}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="password">Confirm password:</label>
    <input type="password" id="password_confirm" name="password_confirm" required>

    <button type="regis">submit</button>
</form>
</body>
</html>
