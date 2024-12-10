<!-- resources/views/layout.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Mi Aplicación</h1>
        <!-- Puedes agregar un menú de navegación aquí -->
    </header>

    <main>
        @yield('content') <!-- Aquí se inyectará el contenido de las vistas hijas -->
    </main>

    <footer>
        <p>&copy; 2024 Mi Aplicación. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
