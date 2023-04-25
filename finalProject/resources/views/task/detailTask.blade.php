<!DOCTYPE html>
<html>
<head>
    <title>Detail task</title>
</head>
<body>
<h1>Detail</h1>
<form action="process-form.php" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>

    <button type="button">back</button>
    <button type="button">update</button>
    <button type="button">delete</button>
</form>
</body>
</html>
