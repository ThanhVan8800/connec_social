
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')- {{config("app.name")}}</app></title>

    <link rel="stylesheet" href="{{asset("template/css/themify-icons.css")}}">
    <link rel="stylesheet" href="{{asset("template/css/feather.css")}}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("template/images/favicon.png")}}">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset("template/css/style.css")}}"> 


</head>

<body class="color-theme-blue">

    @yield('content')



    <script src="{{asset("template/js/plugin.js")}}"></script>
    <script src="{{asset("template/js/scripts.js")}}"></script>
    
</body>

</html>