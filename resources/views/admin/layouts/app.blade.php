<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { padding-top: 70px; }
        .sidebar { height:100vh; background:#f8f9fa; padding-top:20px; }
        .sidebar a { display:block; padding:10px; color:#333; text-decoration:none; }
        .sidebar a:hover, .sidebar a.active { background:#0d6efd; color:#fff; border-radius:5px; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.orders.index') }}">Admin Dashboard</a>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <a href="{{ route('admin.orders.index') }}" class="active">Orders</a>
            <a href="{{ route('admin.categories.index') }}">Categories</a>
            <a href="{{ route('admin.products.index') }}">Products</a>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>