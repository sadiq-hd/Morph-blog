<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        @if(isset($posts) && !is_null($posts) && $posts->isNotEmpty())
            @foreach($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <p>Created at: {{ $post->created_at }}</p>
                            <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="post" action="{{ route('posts.destroy', ['id' => $post->id]) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-md-12">
                <p>No posts found.</p>
            </div>
        @endif
    </div>

    <div class="mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
            Add Post
        </button>
        @include('add-post')

            </div>

    
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
@include('footer')

</html>
