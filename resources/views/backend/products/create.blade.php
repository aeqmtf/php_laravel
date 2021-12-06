@extends('layouts.master')
@section('title', 'Create a new product')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create a new product</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
        <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
        <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="calendar"></span>
        This week
      </button>
    </div>
  </div>

  <div class="table-responsive">
    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="nameInput" class="form-label">Product Name</label>
        <input type="text" name="name" value="{{ old('name', '') }}"
        class="form-control @error('name') is-invalid @enderror" id="nameInput">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nameInput" class="form-label">Product Category</label>
        <select name="product_category_id" class="form-select  @error('product_category_id') is-invalid @enderror" aria-label="Default select example">
          <option >--Select Category--</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" @if(old('product_category_id') == $category->id) selected="selected" @endif >{{ $category->name }}</option>
          @endforeach
        </select>

        @error('product_category_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nameInput" class="form-label">Price</label>
        <input type="text" name="price" value="{{ old('price', '') }}"
        class="form-control @error('price') is-invalid @enderror" id="nameInput">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nameInput" class="form-label">Stock</label>
        <input type="text" name="stock" value="{{ old('stock', '') }}"
        class="form-control @error('stock') is-invalid @enderror" id="nameInput">
        @error('stock')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nameInput" class="form-label">Stocke defective</label>
        <input type="text" name="stock_defective" value="{{ old('stock_defective', '') }}"
        class="form-control @error('stock_defective') is-invalid @enderror" id="nameInput">
        @error('stock_defective')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nameInput" class="form-label">Description</label>
        <textarea name="description"
         class="form-control @error('description') is-invalid @enderror">{{ old('description', '') }}</textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    <div class="row mb-3">
      <div class="col">
          <label for="formFile" class="form-label">Image 1</label>
          <input class="form-control" name="image1" type="file" id="formFile">
      </div>
      <div class="col">
          <label for="formFile" class="form-label">Image 2</label>
          <input class="form-control" name="image2" type="file" id="formFile">
      </div>
      <div class="col">
          <label for="formFile" class="form-label">Image 3</label>
          <input class="form-control" name="image3" type="file" id="formFile">
      </div>
    </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</main>
@stop