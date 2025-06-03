<!DOCTYPE html>
<html lang="fr">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.png" type="image/x-icon" sizes="16x16 32x32">
    <title>@yield('title', 'Event-Manager')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="app-bg">
    @include('partials.nav')
    <main class="main-content">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>