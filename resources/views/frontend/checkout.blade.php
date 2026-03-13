<!DOCTYPE html>
<html>
<head>

<title>Checkout</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

@include('frontend.layouts.navbar')

<div class="container py-5">

<h2 class="mb-4">Checkout</h2>

<div class="row">

<div class="col-md-6">

<h5>Billing Details</h5>

<form action="{{ route('checkout.place') }}" method="POST">
@csrf

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Address</label>
<textarea name="address" class="form-control" rows="3" required></textarea>
</div>

<button class="btn btn-success w-100">Place Order</button>

</form>

</div>

<div class="col-md-6">

<h5>Order Summary</h5>

<table class="table table-bordered">

<thead>
<tr>
<th>Product</th>
<th>Qty</th>
<th>Total</th>
</tr>
</thead>

<tbody>
@php $grandTotal = 0; @endphp
@foreach($cart as $item)
@php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
<tr>
<td>{{ $item['name'] }}</td>
<td>{{ $item['quantity'] }}</td>
<td>${{ $total }}</td>
</tr>
@endforeach
<tr>
<td colspan="2" class="fw-bold">Grand Total</td>
<td class="fw-bold">${{ $grandTotal }}</td>
</tr>
</tbody>

</table>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
