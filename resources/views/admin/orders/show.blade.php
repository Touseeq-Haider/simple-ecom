@extends('admin.layouts.app')

@section('content')

<h2>Order #{{ $order->id }}</h2>

<p><strong>Name:</strong> {{ $order->name }}</p>
<p><strong>Email:</strong> {{ $order->email }}</p>
<p><strong>Phone:</strong> {{ $order->phone }}</p>
<p><strong>Address:</strong> {{ $order->address }}</p>

<h4>Items</h4>
<table class="table table-bordered">
<thead>
<tr>
<th>Product</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>
</tr>
</thead>
<tbody>
@php $grandTotal = 0; @endphp
@foreach($items as $item)
@php $total = $item['price'] * $item['quantity']; $grandTotal += $total; @endphp
<tr>
<td>{{ $item['name'] }}</td>
<td>{{ $item['quantity'] }}</td>
<td>${{ $item['price'] }}</td>
<td>${{ $total }}</td>
</tr>
@endforeach
<tr>
<td colspan="3" class="fw-bold">Grand Total</td>
<td class="fw-bold">${{ $grandTotal }}</td>
</tr>
</tbody>
</table>

<h5>Status</h5>
<form action="{{ route('admin.orders.updateStatus',$order->id) }}" method="POST">
@csrf
<select name="status" class="form-select w-25 d-inline">
<option value="Pending" @if($order->status=='Pending') selected @endif>Pending</option>
<option value="Processing" @if($order->status=='Processing') selected @endif>Processing</option>
<option value="Completed" @if($order->status=='Completed') selected @endif>Completed</option>
<option value="Cancelled" @if($order->status=='Cancelled') selected @endif>Cancelled</option>
</select>
<button class="btn btn-success ms-2">Update</button>
</form>

@endsection