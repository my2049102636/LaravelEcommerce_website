<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        /* Reset some default browser styles */
body, html {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
 
}

/* Center the table vertically and horizontally */
.table-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  border:2px solid #007bff;
}

/* Style the table */
.category-table {
  width: 80%;
  border:3px solid #007bff;
  border-collapse: collapse;
  margin-top: 20px; /* Space from top */
}


.category-table th {
  background-color: #007bff; /* Header background color */
  color: white; /* Header text color */
  padding: 12px 15px;
  text-align: left;
}

/* Style the table rows */
.category-table td {
  padding: 10px 15px;
  border-bottom: 1px solid #ddd; /* Separator between rows */
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
    
      
      
<div class="table-container">
  <table class="category-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Category name</th>
        <th>Edit</th>
        <th>Delete</th>
       
      </tr>
    </thead>
    <tbody>
     
     
      @foreach($category as $category)
      <tr>
      <td>{{$category->id}}</td>
        <td>{{$category->category}}</td>
        <td>
         <a  class="btn btn-info" href="{{url('edit_data',$category->id)}}">Edit</a>
        </td>
        <td>
         <a  class="btn btn-danger" href="{{url('delete_data',$category->id)}}">delete</a>
        </td>

      </tr>
      @endforeach
      <!-- Add more rows as needed -->
    </tbody>
  </table>
</div>
</div>

   @include('admin.footer')



  </body>
</html>