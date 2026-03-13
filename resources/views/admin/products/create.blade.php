<x-app-layout>

<div class="container mt-4">

<h2>Add Product</h2>

@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" value="{{ old('name') }}">
</div>

<div class="mb-3">
<label>Category</label>
<select name="category_id" class="form-control">
<option value="">Select Category</option>
@foreach($categories as $cat)
<option value="{{ $cat->id }}">{{ $cat->name }}</option>
@endforeach
</select>
</div>

<div class="mb-3">
<label>Description</label>
<textarea name="description" class="form-control">{{ old('description') }}</textarea>
</div>

<div class="mb-3">
<label>Price</label>
<input type="text" name="price" class="form-control" value="{{ old('price') }}">
</div>

<div class="mb-3">
<label>Stock</label>
<input type="number" name="stock" class="form-control" value="{{ old('stock',0) }}">
</div>

<div class="mb-3">
<label>Image</label>
<input type="file" name="image" class="form-control">
</div>

<button class="btn btn-primary">Save Product</button>

</form>

</div>

</x-app-layout>