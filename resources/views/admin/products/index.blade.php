<x-app-layout>

<div class="container mt-4">

<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
Add Product
</a>

<table class="table table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Image</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Stock</th>
<th>Action</th>
</tr>
</thead>

<tbody>

@foreach($products as $product)

<tr>

<td>{{ $product->id }}</td>

<td>
@if($product->image)
<img src="/products/{{ $product->image }}" width="60">
@endif
</td>

<td>{{ $product->name }}</td>

<td>{{ $product->category->name }}</td>

<td>{{ $product->price }}</td>

<td>{{ $product->stock }}</td>

<td>

<a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('products.destroy',$product->id) }}" method="POST" style="display:inline;">
@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Delete
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</x-app-layout>