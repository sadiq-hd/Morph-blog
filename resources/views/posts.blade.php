<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">View All Posts</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <span class="badge bg-primary rounded-pill">{{ $post->status }}</span>
                            <a href="{{ route('comments.store', ['post_id' => $post->id]) }}" class="btn btn-info btn-sm">Comment</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
                Add Post
            </button>
            @include('add-post')

                </div>
    </div>

    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('footer') 
</html>
