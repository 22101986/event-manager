<!DOCTYPE html>
<html lang="fr">
<head>
    @vite('resources/css/app.css')
    <meta charset="UTF-8">
    <link rel="icon" href="/favicon.png" type="image/x-icon" sizes="16x16 32x32">
    <title>@yield('title', 'Event-Manager')</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-950 via-purple-950 to-gray-900 text-gray-100">
    @include('partials.nav')
    <main class="py-8">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>