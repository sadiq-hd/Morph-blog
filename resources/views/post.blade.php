<!DOCTYPE html>
<html>
<head>
    @include('header')
    <title>Single Post</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .post-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
            color: #333; /* لون النص العام */
        }

        .comment-container {
            border-top: 1px solid #ee0f0f;
            margin-top: 20px;
            padding-top: 20px;
        }

        .comment-box {
            margin-top: 20px;
        }

        /* لون زر الإضافة وأيقونته */
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary i {
            margin-left: 5px;
        }

        /* لون عنوان التعليق */
        .comment-container h2 {
            color: #007bff;
        }

        /* لون محتوى التعليق */
        .comment-container p {
            color: #666;
        }

        /* لون اسم المستخدم */
        .comment-container span {
            color: #555;
        }
        .delete-comment-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="post-container">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        <h2>Comments</h2>
       <!-- ... -->
       @foreach ($post->comments as $comment)
       <div class="comment-container">
           <p>{{ $comment->content }}</p>
           <span>Commented by: {{ $comment->user->name }}</span>
           @if ($comment->user_id === auth()->id() || auth()->user()->isAdmin())
               <button class="delete-comment-btn" onclick="confirmDelete('{{ route('comments.destroy', ['id' => $comment->id]) }}')">Delete</button>
           @endif
       </div>
   @endforeach
<!-- ... -->

        <div id="deleteConfirmationModal" class="modal" style="display: none">
            <div class="modal-content">
                <p>هل أنت متأكد من حذف التعليق؟</p>
                <button onclick="deleteComment()">نعم</button>
                <button onclick="closeModal()">لا</button>
            </div>
        </div>
    </div>
        <div class="comment-box">
            <h3>Add a Comment</h3>
            <form action="{{ route('comments.store') }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea name="content" id="content" rows="3" placeholder="Write your comment here" class="form-control"></textarea>
                <button type="submit" class="btn btn-primary mt-2">
                    Add Comment <i class="fas fa-comment"></i>
                </button>

                
            </form>
        </div>
    </div>
</body>
@include('footer')
</html>
