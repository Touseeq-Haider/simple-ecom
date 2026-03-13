<!DOCTYPE html>
<html>
<head>

<title>{{ $product->name }}</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.product-img{
width:100%;
height:400px;
object-fit:cover;
border-radius:10px;
}

.quantity-input{
width:80px;
text-align:center;
}

.product-card{
height:100%;
transition:0.3s;
}

.product-card:hover{
transform:translateY(-5px);
box-shadow:0 10px 20px rgba(0,0,0,0.1);
}

.product-img-small{
height:150px;
object-fit:cover;
border-radius:8px;
}

</style>

</head>

<body>

@include('frontend.layouts.navbar')

<div class="container py-5">

<!-- Breadcrumbs -->
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="/">Home</a></li>
<li class="breadcrumb-item"><a href="#">{{ $product->category->name }}</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
</ol>
</nav>

<div class="row">

<div class="col-md-6">

<img src="/products/{{ $product->image }}" class="product-img mb-4">

</div>

<div class="col-md-6">

<h2>{{ $product->name }}</h2>

<p class="text-muted">
Category: {{ $product->category->name }}
</p>

<h3 class="text-primary">${{ $product->price }}</h3>

<p class="mt-3">{{ $product->description }}</p>

<!-- Quantity Selector -->
<form action="{{ route('cart.add',$product->id) }}" method="POST" class="d-flex gap-2 align-items-center mt-3">
@csrf
<input type="number" name="quantity" value="1" min="1" class="form-control quantity-input">
<button class="btn btn-primary btn-lg">Add To Cart</button>
</form>

</div>

</div>

<!-- Related Products Section -->
<h4 class="mt-5 mb-3">Related Products</h4>

<div class="row g-4">

@php
$related = \App\Models\Product::where('category_id',$product->category_id)
->where('id','!=',$product->id)
->take(4)
->get();
@endphp

@foreach($related as $rel)
<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
<div class="card product-card h-100">
<a href="{{ route('product.detail',$rel->id) }}">
<img src="/products/{{ $rel->image }}" class="card-img-top product-img-small">
</a>
<div class="card-body d-flex flex-column">
<h6 class="fw-bold">
<a href="{{ route('product.detail',$rel->id) }}" class="text-dark text-decoration-none">
{{ $rel->name }}
</a>
</h6>
<p class="text-primary fw-bold">${{ $rel->price }}</p>
<div class="mt-auto">
<a href="{{ route('product.detail',$rel->id) }}" class="btn btn-outline-primary w-100">View</a>
</div>
</div>
</div>
</div>
@endforeach

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>