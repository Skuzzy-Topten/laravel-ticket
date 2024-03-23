<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('siteTitle')</title>
    <link rel="stylesheet" href="{{asset('/bootstrap/css/bootstrap.min.css')}}">
</head>
<body>
    @include('sharedata.navigation')
    @yield('content')
    <script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>