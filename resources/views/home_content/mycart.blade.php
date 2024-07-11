<!DOCTYPE html>
<html>

<head>
  @include('home_content.css')
  <style>
    /* Styles for the table */
    table {
      margin: 20px;
        width: 100%;

    }

    /* Styles for table headers */
    th {
        background-color: #f2f2f2;
        padding: 4px;
        text-align: center;
        border: 1px solid #ddd;
    }

    /* Styles for table rows */
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Styles for table data cells */
    td {
        padding: 4px;
        text-align: center;
        border: 1px solid #ddd;
    }
      /* Styles for the form container */
      .form-container {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    /* Styles for form inputs */
    .form-input {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    /* Styles for submit button */
    .form-submit {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    .form-submit:hover {
        background-color: #45a049;
    }
</style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home_content.header')
    <!-- end header section -->
    <!-- slider section -->



    <!-- end slider section -->
  </div>
  <!-- end hero area -->
  <table>
    <thead>
        <tr>
            <th>product title</th>
            <th>price</th>
            <th>image</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
      @foreach($cart as $cart)
        <tr>
            <td>{{$cart->product->title}}</td>
            <td>{{$cart->product->price}}</td>
            <td>
              <img width="300px" src="/images/{{$cart->product->image}}" alt="">
            </td>
            <td>
              <a href="{{url('remove_cart')}}" class="btn btn-danger">Remove</a>
            </td>
        </tr>
       @endforeach
    </tbody>
</table>

  <!-- shop section -->

 

    <h2>Receiver Information</h2>
    <form action="{{url('confirm_order')}}" method="post">
      @csrf
        <label for="receiver-name">Receiver Name</label>
        <input type="text" id="receiver-name" name="receiver_name" class="form-input" value="{{Auth::user()->name}}">

        <label for="receiver-address">Receiver Address</label>
        <input type="text"  name="receiver_address" class="form-input" value="{{Auth::user()->address}}">

        <label for="receiver-phone">Receiver Phone</label>
        <input type="tel"  name="receiver_phone" class="form-input" value="{{Auth::user()->phone}}" >

        <input type="submit" value="Submit" class="form-submit m-3">
    </form>
  <!-- end shop section -->









  <!-- info section -->

  @include('home_content.footer')

</body>

</html>