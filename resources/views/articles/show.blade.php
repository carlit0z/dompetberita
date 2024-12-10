{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DompetBerita - Articles</title>
</head>

<body>
    <h1>Articles</h1>
    <form action="{{ route('articles.update', $articles->article->id) }}" method="POST">
        @csrf
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required value="{{ $articles->article->title }}"><br><br>

        <label for="contents">Contents:</label><br>
        <textarea id="contents" name="contents" rows="4" cols="50" required>{{ $articles->article->content }}</textarea><br><br>

        <label for="user_id">Author (User ID):</label><br>
        <input type="number" id="user_id" name="user_id" value="{{ $articles->article->user->id }}" required><br><br>

        <label for="category_id">Category (Category ID):</label><br>
        <input type="number" id="category_id" name="category_id" value="{{ $articles->article->category->id }}"
            required><br><br>

        <input type="submit" value="Update Article">
    </form>
    <strong></strong><br>
    <br>
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DompetBerita - Update Article</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Update Article</h1>

    <!-- Form untuk update artikel -->
    <div class="card">
        <div class="card-header">Edit Article</div>
        <div class="card-body">
            <form action="{{ route('articles.update', $articles->article->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required
                        value="{{ $articles->article->title }}">
                </div>

                <div class="mb-3">
                    <label for="contents" class="form-label">Contents:</label>
                    <textarea class="form-control" id="contents" name="contents" rows="4" required>{{ $articles->article->content }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Author (User ID):</label>
                    <input type="number" class="form-control" id="user_id" name="user_id"
                        value="{{ $articles->article->user->id }}" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category (Category ID):</label>
                    <input type="number" class="form-control" id="category_id" name="category_id"
                        value="{{ $articles->article->category->id }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Article</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
