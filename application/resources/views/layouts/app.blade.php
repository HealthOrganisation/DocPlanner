<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'My Application') }}</title>
    <!-- Include your CSS files here -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles') 
</head>
<body>
    <main>
        @yield('content') 
        @yield('styles') <!-- This is where the content from other views will be injected -->
    </main>

    <footer>
        <!-- Optional: You can add footer content here -->
    </footer>

    <!-- Include your JavaScript files here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
