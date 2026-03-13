<!DOCTYPE html>
<html>
<head>

<title>Thank You</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

@include('frontend.layouts.navbar')

<div class="container py-5 text-center">

<h2>Thank You!</h2>
<p>Your order has been placed successfully.</p>

<a href="{{ route('shop') }}" class="btn btn-primary mt-3">Continue Shopping</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>