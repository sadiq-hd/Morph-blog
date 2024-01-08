<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
    <title>Edit Posts</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* ... الأنماط ... */
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Edit Posts</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="bordered-posts">
                    @forelse ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title post-title">{{ $post->title }}</h5>
                            <hr class="post-title-divider">
                            <p class="card-text post-content">{{ $post->content }}</p>
                            <!-- زر الحذف للمنشور -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeletePost{{ $post->id }}">
                                <i class="fas fa-times"></i> <!-- أيقونة "X" -->
                            </button>
                            <!-- Modal تأكيد الحذف -->
                            <div class="modal fade" id="confirmDeletePost{{ $post->id }}" tabindex="-1" aria-labelledby="confirmDeletePostLabel{{ $post->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeletePostLabel{{ $post->id }}">تأكيد الحذف</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>هل أنت متأكد أنك تريد حذف هذا المنشور؟</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                                            <!-- زر الحذف -->
                                            <form id="deletePostForm{{ $post->id }}" action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fas fa-times"></i> <!-- أيقونة "X" -->
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- عرض التعليقات -->
                            <div class="comments-container">
                                <h6>Comments:</h6>
                                @if ($post->comments->isNotEmpty())
                                    @foreach ($post->comments as $comment)
                                        <div class="comment-item">
                                            <p>{{ $comment->content }}</p>
                                            <!-- زر حذف التعليق -->
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteComment{{ $comment->id }}">
                                                <i class="fas fa-times"></i> <!-- أيقونة "X" -->
                                            </button>
                                            <!-- Modal تأكيد حذف التعليق -->
                                            <div class="modal fade" id="confirmDeleteComment{{ $comment->id }}" tabindex="-1" aria-labelledby="confirmDeleteCommentLabel{{ $comment->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDeleteCommentLabel{{ $comment->id }}">تأكيد الحذف</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>هل أنت متأكد من حذف التعليق؟</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <!-- زر الحذف -->
                                                            <form id="deleteCommentForm{{ $comment->id }}" action="{{ route('comments.destroy', ['id' => $comment->id]) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">
                                                                    نعم
                                                                </button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                لا
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No comments available for this post.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No posts available for editing.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
@include('footer')
</html>
