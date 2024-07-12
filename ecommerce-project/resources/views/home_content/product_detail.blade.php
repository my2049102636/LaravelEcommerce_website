<!DOCTYPE html>
<html>

<head>
    @include('home_content.css')
    <style>
        /* styles.css */

        /* Container and row */
        .container {
            margin-top: 20px;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        /* Box styling */
        .box {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            /* Adjust width as needed */
        }

        /* Image box */
        .img-box {
            margin-bottom: 20px;
        }

        .product-image {
            width: 100%;
            max-width: 400px;
            /* Adjust image width */
            height: auto;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        /* Detail box */
        .detail-box {
            text-align: left;
        }

        .product-title {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .product-info {
            margin-bottom: 15px;
        }

        .product-info p {
            margin: 5px 0;
        }

        .product-description {
            margin-top: 15px;
        }

        .product-description p {
            line-height: 1.6;
            color: #666;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .box {
                padding: 15px;
            }

            .product-image {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home_content.header')
        <!-- end header section -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="img-box text-center">
                            <img class="product-image" src="/images/{{ $products->image }}" alt="{{ $products->title }}">
                        </div>
                        <div class="detail-box text-center">
                            <h2 class="product-title">{{ $products->title }}</h2>
                            <div class="product-info">
                                <p><strong>Price:</strong> ${{ $products->price }}</p>
                                <p><strong>Quantity:</strong> {{ $products->quantity }}</p>
                            </div>
                            <div class="product-description">
                                <p><strong>Product Description:</strong></p>
                                <p>{{ $products->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('home_content.footer')

</body>

</html>