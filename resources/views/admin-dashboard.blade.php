<!DOCTYPE html>
<html>
<head>
    @include('header')
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

        .card-title {
            color: #ff0000;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .card-text {
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
                <p> dashboared ك.</p>
            </div>
            <div class="col-md-6">
                <h3>المنشورات</h3>
                @foreach($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <hr class="post-title-divider">

                            <p class="card-text">{{ $post->content }}</p>
                            <p>Created at: {{ $post->created_at }}</p>
                            <span class="badge bg-primary rounded-pill">{{ $post->status }}</span>
                            <span class="badge bg-secondary rounded-pill">{{ $post->user->name }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
            

    @include('footer')

    <style>
        /* قم بتحديد أسلوب التنسيق الخاص بالفوتر هنا */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</body>
</html>
