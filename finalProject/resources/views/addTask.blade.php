<!DOCTYPE html>
<html>
<head>
    <title>My Form</title>
</head>
<body>
<h1>Create task!</h1>
<form action="task/add" method="POST">

    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">submit</button>
    <button type="button">back</button>
</form>
</body>
</html>
