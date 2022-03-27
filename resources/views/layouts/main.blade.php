<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halo, Aku Laravel</title>
    @include('includes.styles')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('includes.navbar')
            @include('includes.sidebar')
            @yield('content')
            @include('includes.footer')
        </div>
    </div>
</body>

</html>
