<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
     @include('header')
    <meta charset="utf-8">
    <title>Your Title Here</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: -webkit-linear-gradient(left, #2c2a2a, #a7a7a7);
        }

        header {
            width: 100%;
            padding: 20px;
        }

        .navbar-brand {
            font-size: 24px;
        }

        .navbar-nav .nav-item {
            margin-right: 15px;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 18px;
        }
    </style>
</head>

<body>
   
    @yield('content')
   
</body>
 @include('footer')
</html>
