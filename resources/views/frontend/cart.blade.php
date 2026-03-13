<!DOCTYPE html>
<html>
<head>

<title>Your Cart</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.product-img{
width:60px;
height:60px;
object-fit:cover;
border-radius:6px;
}

</style>

</head>

<body>

<div class="container py-5">

<h2 class="mb-4 text-center">Shopping Cart</h2>

@if(session('cart') && count(session('cart')) > 0)

<div class="table-responsive">

<table class="table table-bordered align-middle text-center">

<thead class="table-light">

<tr>
<th>Product</th>
<th>Price</th>
<th>Qty</th>
<th>Total</th>
<th>Action</th>
</tr>

</thead>

<tbody>

@php $grandTotal = 0; @endphp

@foreach($cart as $id => $item)

@php
$total = $item['price'] * $item['quantity'];
$grandTotal += $total;
@endphp

<tr>

<td class="d-flex align-items-center gap-3">

<img src="/products/{{ $item['image'] }}" class="product-img">

<span>{{ $item['name'] }}</span>

</td>

<td>${{ $item['price'] }}</td>

<td>

<form action="{{ route('cart.update',$id) }}" method="POST" class="d-flex justify-content-center">

@csrf

<input type="number"
name="quantity"
value="{{ $item['quantity'] }}"
min="1"
class="form-control text-center"
style="width:70px">

<button class="btn btn-sm btn-primary ms-2">
Update
</button>

</form>

</td>

<td class="fw-bold">${{ $total }}</td>

<td>

<form action="{{ route('cart.remove',$id) }}" method="POST">
@csrf

<button class="btn btn-danger btn-sm">
Remove
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="d-flex justify-content-between align-items-center mt-4">

<a href="/" class="btn btn-outline-secondary">
Continue Shopping
</a>

<h4>
Total: <span class="text-primary">${{ $grandTotal }}</span>
</h4>

</div>

@else

<div class="text-center py-5">

<h4>Your cart is empty</h4>

<a href="/" class="btn btn-primary mt-3">
Shop Now
</a>

</div>

@endif

</div>

</body>
</html>
