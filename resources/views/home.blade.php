<!DOCTYPE html>
<html>
<head>
    @include('header')
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <h2>مرحبا بك في صفحة الرئيسية!</h2>
                <p>هذه هي صفحتك الرئيسية في تطبيق Laravel الخاص بك.</p>
            </div>
            <div class="col-md-6">
                <!-- هنا قائمة المنشورات -->
                <h3>المنشورات</h3>
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
                    </div>            </div>
        </div>

        
        </div>
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
