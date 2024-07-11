<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
 
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

           
            <div class="container bg-white mt-5 rounded font-weight-bold">
                <h2>Add Product </h2>
                <form action="{{ url('Add_product') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Input 1: Title -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Add Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title here">
                    </div>

                    <!-- Input 2: Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Enter Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description">
                    </div>

                    <!-- Input 3: Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Add Image</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Enter product image">
                    </div>

                    <!-- Input 4: Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label">Enter product price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter a suitable price">
                    </div>

                    <!-- Input 5: Category -->
                    <div class="mb-3">
                        <label for="category" class="form-label">Select Category</label>
                        <select class="form-select" name="category">
                            <option selected disabled>Select Category...</option>
                            @foreach($category as $category)
                            <option value="{{ $category->category }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input 6: Quantity -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Enter quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>


            @include('admin.footer')
</body>

</html>