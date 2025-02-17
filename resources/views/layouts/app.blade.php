<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Marine Waste Management') }}</title>
    <!-- Add Bootstrap CSS (use a CDN for simplicity) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <style>
        /* Custom styles */
        body {
            background-color: #f4f4f9;
        }
        .form-container {
            max-width: 500px;
            margin: auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Marine Waste Management</a>
    </nav>

    <!-- Main content -->
    <div class="container mt-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center mt-5 py-3 bg-primary text-white">
        <p>&copy; 2025 Marine Waste Management. All Rights Reserved.</p>
    </footer>

    <!-- Add Bootstrap JS (use a CDN for simplicity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
