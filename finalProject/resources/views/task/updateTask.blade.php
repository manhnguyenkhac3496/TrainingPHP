<!DOCTYPE html>
<html>
<head>
    <title>My Form</title>
</head>
<body>
<h1>My Form</h1>
<form action="process-form.php" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>

    <button type="button">back</button>
    <button type="submit">submit</button>
</form>
</body>
</html>
