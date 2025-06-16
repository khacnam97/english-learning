<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>English Learning</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background-color: #f8f9fa;
        }
        .hero {
            background: linear-gradient(135deg, #007bff, #00c6ff);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        .hero h1 {
            font-size: 3rem;
        }
        .course-card {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .course-card:hover {
            transform: translateY(-5px);
        }
        footer {
            padding: 20px;
            text-align: center;
            background-color: #343a40;
            color: #ccc;
            margin-top: 40px;
        }
    </style>
</head>
<body>

@include('partials.navbar')

<main>
    @yield('content')
</main>

<footer>
    &copy; {{ date('Y') }} English Learning. All rights reserved.
</footer>

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

