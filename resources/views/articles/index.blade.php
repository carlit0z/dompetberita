{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DompetBerita - Articles</title>
</head>

<body>
    <h1>Articles</h1>
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
    <ul>
        @foreach ($articles->articles as $article)
            <li>
                <strong>{{ $article->title }}</strong><br>
                {{ $article->content }}<br>
                <p>Category: {{ $article->category->name }}</p>
                <p>Author: {{ $article->user->name }}</p>
                <a href="{{ route('articles.show', $article->id) }}">Edit</a>
                <br><br><br>
                <form action="{{ route('articles.delete', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete">
                </form>
            </li>
        @endforeach
    </ul>
</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DompetBerita - Articles</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Articles</h1>

    <!-- Form untuk membuat artikel baru -->
    <div class="card mb-5">
        <div class="card-header">Create New Article</div>
        <div class="card-body">
            <form action="{{ route('articles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="contents" class="form-label">Contents:</label>
                    <textarea class="form-control" id="contents" name="contents" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Author (User ID):</label>
                    <input type="number" class="form-control" id="user_id" name="user_id" required>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Category (Category ID):</label>
                    <input type="number" class="form-control" id="category_id" name="category_id" required>
                </div>

                <button type="submit" class="btn btn-primary">Create Article</button>
            </form>
        </div>
    </div>

    <!-- List Artikel -->
    <div class="row">
        @foreach ($articles->articles as $article)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($article->content, 100) }}</p>
                        <p class="card-text"><small class="text-muted">Category: {{ $article->category->name }}</small>
                        </p>
                        <p class="card-text"><small class="text-muted">Author: {{ $article->user->name }}</small></p>

                        <!-- Edit button -->
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-secondary btn-sm">Edit</a>

                        <!-- Delete form -->
                        <form action="{{ route('articles.delete', $article->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
