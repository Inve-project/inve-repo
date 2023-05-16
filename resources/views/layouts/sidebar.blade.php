<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard')}}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventory System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{ url('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Dashbord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Manage Raw Material
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('ListRawmaterialCategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('ListRawmaterialUnits')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Units</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('ListRawmaterial')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Rawmaterial</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Manage Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('ListProductCategory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('ListProductUnits')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Units</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('ListProduct')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListPayment')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Payment
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListUsedRawmaterial')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                UsedRawmaterial
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListManufacturedProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                ManufacturedProduct
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListRequestProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Product request
                <!-- <i class="fas fa-angle-left right"></i> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListUserProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                 Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListSellProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                 Sell Product
              </p>
            </a>
          </li>
          


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>