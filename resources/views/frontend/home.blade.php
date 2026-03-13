<!DOCTYPE html>
<html>
<head>

<title>My Shop</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.product-card{
height:100%;
transition:0.3s;
}

.product-card:hover{
transform:translateY(-5px);
box-shadow:0 10px 20px rgba(0,0,0,0.1);
}

.product-img{
height:200px;
object-fit:cover;
}

</style>

</head>

<body>
    @include('frontend.layouts.navbar')

<div class="container py-5">

<h2 class="mb-4 text-center">Our Products</h2>

<div class="row g-4">

@foreach($products as $product)

<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">

<div class="card product-card h-100">

@if($product->image)
<a href="{{ route('product.detail',$product->id) }}">
<img src="/products/{{ $product->image }}" class="card-img-top product-img">
</a>
@endif

<div class="card-body d-flex flex-column">

<h6 class="fw-bold">
<a href="{{ route('product.detail',$product->id) }}" class="text-dark text-decoration-none">
{{ $product->name }}
</a>
</h6>
<p class="text-muted small mb-1">
{{ $product->category->name }}
</p>

<p class="fw-bold text-primary mb-3">
${{ $product->price }}
</p>

<div class="mt-auto">

<form action="{{ route('cart.add',$product->id) }}" method="POST">
@csrf
<button class="btn btn-primary w-100">
Add To Cart
</button>
</form>

</div>

</div>

</div>

</div>

@endforeach

</div>

</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
