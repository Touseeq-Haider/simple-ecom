<!DOCTYPE html>
<html>
<head>

<title>Shop</title>

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
border-radius:8px;
}

</style>

</head>

<body>

@include('frontend.layouts.navbar')

<div class="container py-5">

<div class="row">

<!-- Filter Sidebar -->
<div class="col-lg-3 mb-4">
<h5>Categories</h5>
<ul class="list-group">
@foreach($categories as $category)
<li class="list-group-item @if(request()->category == $category->id) active @endif">
<a href="{{ route('shop') }}?category={{ $category->id }}" class="@if(request()->category == $category->id) text-white @else text-dark @endif text-decoration-none">
{{ $category->name }}
</a>
</li>
@endforeach
<li class="list-group-item">
<a href="{{ route('shop') }}" class="text-decoration-none text-dark">All Categories</a>
</li>
</ul>
</div>

<!-- Products Grid -->
<div class="col-lg-9">

<div class="row g-4">
@foreach($products as $product)
<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
<div class="card product-card h-100">
<a href="{{ route('product.detail',$product->id) }}">
<img src="/products/{{ $product->image }}" class="card-img-top product-img">
</a>
<div class="card-body d-flex flex-column">
<h6 class="fw-bold">
<a href="{{ route('product.detail',$product->id) }}" class="text-dark text-decoration-none">
{{ $product->name }}
</a>
</h6>
<p class="text-primary fw-bold">${{ $product->price }}</p>
<div class="mt-auto">
<a href="{{ route('product.detail',$product->id) }}" class="btn btn-outline-primary w-100">View</a>
</div>
</div>
</div>
</div>
@endforeach
</div>

<!-- Pagination -->
<div class="mt-4">
{{ $products->withQueryString()->links('pagination::bootstrap-5') }}
</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>