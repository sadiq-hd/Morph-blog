<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* لون خلفية الصفحة */
            color: #333; /* لون النص الأساسي */
        }
    
        .bordered-posts {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff; /* لون خلفية المنشورات */
        }
    
        .card-title.post-title {
            color: #007bff; /* لون العنوان */
            font-weight: bold;
            margin-bottom: 5px;
        }
    
        .card-text.post-content {
            color: #666; /* لون المحتوى */
            margin-bottom: 10px;
        }
    
        .post-title-divider {
            border-top: 2px solid #007bff; /* لون الخط الفاصل بين العنوان والمحتوى */
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
    
    
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">View All Posts</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="bordered-posts">
                    @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title post-title">{{ $post->title }}</h5>
                            <hr class="post-title-divider">
                            <p class="card-text post-content">{{ $post->content }}</p>
                            <span class="badge bg-primary rounded-pill">{{ $post->status }}</span>
                            <span class="badge bg-secondary rounded-pill">{{ $post->user->name }}</span>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
        <div class="mt-1 mb-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
                Add Post
            </button>
            @include('add-post')
        </div>
    </div>

    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
@include('footer')
</html>
