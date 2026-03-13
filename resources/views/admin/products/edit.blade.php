<x-app-layout>

<div class="container mt-4">

<h2>Edit Product</h2>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" value="{{ old('name',$product->name) }}">
</div>

<div class="mb-3">
<label>Category</label>
<select name="category_id" class="form-control">
<option value="">Select Category</option>
@foreach($categories as $cat)
<option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
{{ $cat->name }}
</option>
@endforeach
</select>
</div>

<div class="mb-3">
<label>Description</label>
<textarea name="description" class="form-control">{{ old('description',$product->description) }}</textarea>
</div>

<div class="mb-3">
<label>Price</label>
<input type="text" name="price" class="form-control" value="{{ old('price',$product->price) }}">
</div>

<div class="mb-3">
<label>Stock</label>
<input type="number" name="stock" class="form-control" value="{{ old('stock',$product->stock) }}">
</div>

<div class="mb-3">
<label>Current Image</label><br>
@if($product->image)
<img src="/products/{{ $product->image }}" width="100">
@endif
</div>

<div class="mb-3">
<label>Change Image</label>
<input type="file" name="image" class="form-control">
</div>

<button class="btn btn-primary">Update Product</button>

</form>

</div>

</x-app-layout>