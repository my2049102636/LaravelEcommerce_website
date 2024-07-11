<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>
        .search-container {
            display: flex;
            justify-content: flex-end;
            /* Align items to the right */
            margin-bottom: 20px;
            /* Optional: Adds some space below the search form */
        }

        .search-container form {
            display: flex;
            /* Display form elements inline */
            align-items: center;
            /* Vertically center items */
        }

        .search-container input[type="search"] {
            padding: 8px;
            /* Adjust padding as needed */
            margin-right: 10px;
            /* Optional: Adds space between input and button */
            border: 1px solid #ccc;
            /* Optional: Add border */
            border-radius: 4px;
            /* Optional: Rounded corners */
        }

        .search-container input[type="submit"] {
            padding: 8px 16px;
            /* Adjust padding as needed */
            border: none;
            background-color: #007bff;
            /* Primary button color */
            color: white;
            cursor: pointer;
            border-radius: 4px;
            /* Optional: Rounded corners */
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

            <!-- Search Form -->
            <div class="search-container m-3">
                <form action="{{ url('search_product') }}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Search...">
                    <input type="submit" class="btn btn-primary" value="Search">
                </form>
            </div>

            <div class="container mt-5">
                <h2>All Products</h2>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $products)
                        <tr>
                            <th scope="row">{{ $products->id }}</th>
                            <td>{{ $products->title }}</td>
                            <td>{!! Str::limit($products->description, 30) !!}</td>
                            <td>{{ $products->price }}</td>
                            <td>{{ $products->quantity }}</td>
                            <td>{{ $products->category }}</td>
                            <td>
                                <img src="{{ asset('images/' . $products->image) }}" alt="{{ $products->title }}" style="max-width: 100px; max-height: 100px;">
                            </td>

                            <td>
                                <a class="btn btn-warning" href="{{url('edit_product',$products->id)}}">Edit</a>

                                <a class="btn btn-danger" href="{{url('delete_product',$products->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $product->links() }}
            </div>
        </div>

        @include('admin.footer')
</body>

</html>