@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
</div>

<div class="card card-dashboard">
    <div class="card-body">
        <form action="{{ route('admin.products.update', $product->product_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nama" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $product->nama }}" required>
                </div>
                <div class="col-md-6">
                    <label for="harga" class="form-label">Price (IDR)</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $product->harga }}" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Description</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $product->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Image URL</label>
                <input type="url" class="form-control" id="photo" name="photo" value="{{ $product->photo }}">
            </div>
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
