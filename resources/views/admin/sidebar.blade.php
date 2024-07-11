<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Younis official</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{url('admin/dashboard')}}"> <i class="icon-home"></i>Home </a></li>
                <li><a href="{{url('view_category')}}"> <i class="icon-grid"></i>Add Category </a></li>

                <li><a href="{{url('allcategory')}}"> <i class="icon-grid"></i>All Category </a></li>

                <li><a href="{{url('animation')}}"> <i class="icon-grid"></i>Animation</a></li>


               
                <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>products</a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="{{url('product')}}">Add products</a></li>
                    <li><a href="{{url('show_product')}}">All Products</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>
                
                <li><a href="{{url('order')}}"> <i class="icon-grid"></i>Orders</a></li>

      </nav>