<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
     @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
    


 
<div class="container bg-white mt-5 rounded font-weight-bold">
    <h2>Edit Product </h2>
    <form action="{{ url('update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <!-- Input 1: Title -->
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $product->title) }}">
        </div>

        <!-- Input 2: Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <!-- Input 3: Current Image -->
        <div class="mb-3">
            @if($product->image)
                <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
            @else
                <p>No image available</p>
            @endif
        </div>

        <!-- Input 4: New Image -->
        <div class="mb-3">
            <label for="image" class="form-label">Update Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <!-- Input 5: Price -->
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
        </div>

        <!-- Input 6: Category -->
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $product->category) }}">
        </div>

        <!-- Input 7: Quantity -->
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="text" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>

   @include('admin.footer')
  </body>
</html>