<!-- في ملف resources/views/edit-posts.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Posts</title>
    <!-- أي استيرادات أو أنماط أو روابط إضافية -->
</head>
<body>
    <h1>Edit Posts</h1>
    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <!-- أي تفاصيل إضافية لتحرير المنشورات -->
        </div>
    @endforeach
</body>
</html>
