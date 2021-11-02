<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title') - crudLaravel</title>
</head>
<body>
    <header>
        <h1>@yield('header')</h1>
    </header>
    <hr>
    <section>
        @yield('content')
    </section>
    <hr>
    <footer>
        This is my footer!
    </footer>
</body>
</html>
