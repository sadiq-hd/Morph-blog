<!DOCTYPE html>
<html lang="en">
<head>
    @include('header')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin-top: 20px;
        }

        .bordered-posts {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 8px;
        }

        .card-title.post-title {
            color: #ff0000;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-text.post-content {
            color: #666;
            margin-bottom: 10px;
        }

        .post-title-divider {
            border-top: 2px solid #000000;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .user-badge {
            color: #333;
            font-size: 14px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h2>مرحبا بك في صفحة الرئيسية!</h2>
                <p>هذه هي صفحتك الرئيسية في تطبيق Laravel الخاص بك.</p>
            </div>
            <div class="col-md-6">
                <h3>ِAdmin post</h3>
            
                @php
                $count = 0;
                @endphp
            
                @if (Auth::check())
                    @foreach ($posts as $post)
                        @if ($post->user_id == Auth::user()->id && $count < 3)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title post-title">{{ $post->title }}</h5>
                                    <hr class="post-title-divider">
                                    <p class="card-text post-content">{{ $post->content }}</p>
                                    <span class="user-badge">أضيفت بواسطة: {{ $post->user->name }}</span>
                                </div>
                            </div>
                            @php
                                $count++;
                            @endphp
                        @endif
                    @endforeach
                @else
                    <p>يرجى تسجيل الدخول لعرض المنشورات.</p>
                @endif
            </div>
            
            @endforeach
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
