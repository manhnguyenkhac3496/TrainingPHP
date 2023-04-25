<!DOCTYPE html>
<html>
<head>
    <title>My Form</title>
</head>
<body>
<h1>Create task!</h1>
<form action="{{route('addTask')}}" method="POST">
    @csrf
    <label for="title">Title:</label>
    <input type="text" id="title" placeholder="enter title task" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" placeholder="Description" required></textarea>

    <button type="submit">submit</button>
    <button type="button">back</button>
</form>
</body>
<script>
</script>
</html>
