<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
     /* Reset some default browser styles */
body, html {
  margin: 0;
  padding: 0;
}

/* Center the form vertically and horizontally */
.form-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Adjust as needed */
}

/* Style the form */
form {
  background-color: #f0f0f0;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style the input field */
input[type=text] {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box; /* Ensures padding is included in width */
}

/* Style the submit button */
button[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

/* Hover effect for the submit button */
button[type=submit]:hover {
  background-color: #45a049;
}

/* Responsive adjustments */
@media (max-width: 600px) {
  form {
    width: 80%; /* Adjust width for smaller screens */
  }
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
    
    

      <div class="form-container">
  <form action="{{url('update',$category->id)}}" method="POST">
    @csrf
    <label for="userInput">Enter Category name:</label>

    <input type="text" name="category" placeholder="Type something..." value="{{$category->category}}">
   <input type="submit" value="submit" class="btn btn-primary">

  </form>
</div>

</div>

   @include('admin.footer')
  </body>
</html>