<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: #cccad2;
        }

        .navbar{
            box-shadow:0 2px 10px #cbadc11a;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(11, 9, 0, 0.08);
        }

        .btn-primary{
            border-radius:10px;
        }

        .btn-success{
            border-radius:10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Laravel CRUD</a>
<div class="ms-auto">
    
            <a href="{{ route('posts.index') }}"
               class="btn btn-light btn-sm me-2">
                Posts
            </a>
        </div>
        <div class="ms-auto">
    
            <a href="{{ route('dashboard.index') }}"
               class="btn btn-light btn-sm me-2">
                Dashboard
            </a>
        </div>
        <div class="ms-auto">
            <a href="{{ route('categories.index') }}"
               class="btn btn-light btn-sm">
                Categories
            </a>
        </div>
    </div>
</nav>

<div class="container py-5">
    @yield('content')
</div>

</body>
</html>