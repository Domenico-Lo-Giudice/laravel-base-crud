<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME')}} - @yield('page-name') </title>

    @vite('resources/js/app.js')
</head>
<body>
    @yield('navbar')

    <main>
    @yield('main-content')
    </main>


    @yield('footer')
</body>
</html>