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
                <!-- اضف العناصر الخاصة بالمنشورات هنا -->
            </div>
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
