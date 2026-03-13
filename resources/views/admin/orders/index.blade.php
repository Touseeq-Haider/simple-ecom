@extends('admin.layouts.app')

@section('content')

<h2>All Orders</h2>

<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Total</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@foreach($orders as $order)
<tr>
<td>{{ $order->id }}</td>
<td>{{ $order->name }}</td>
<td>${{ $order->total }}</td>
<td>{{ $order->status }}</td>
<td>
<a href="{{ route('admin.orders.show',$order->id) }}" class="btn btn-sm btn-primary">View</a>
</td>
</tr>
@endforeach
</tbody>
</table>

{{ $orders->links('pagination::bootstrap-5') }}

@endsection