<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Article</title>
</head>

<body>
    <h1>Create New Article</h1>

    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="contents">Contents:</label><br>
        <textarea id="contents" name="contents" rows="4" cols="50" required></textarea><br><br>

        <label for="user_id">Author (User ID):</label><br>
        <input type="number" id="user_id" name="user_id" required><br><br>

        <label for="category_id">Category (Category ID):</label><br>
        <input type="number" id="category_id" name="category_id" required><br><br>

        <input type="submit" value="Create Article">
    </form>
</body>

</html>
