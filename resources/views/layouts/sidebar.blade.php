<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard')}}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventory System</span>
    </a>
    <!-- <a href="{{ url('/dashboard')}}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ Auth::user()->name }}</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if (Auth::user()->id == 1)
          <li class="nav-item">
            <a href="{{ url('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Dashbord
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListVendor')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Vendor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-qrcode"></i>
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
              <li class="nav-item">
                <a href="{{ url('ListPayRawmaterial')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Rawmaterial</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-trophy"></i>
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
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Payment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListUsedRawmaterial')}}" class="nav-link">
              <i class="nav-icon fas fa-qrcode"></i>
              <p>
                UsedRawmaterial
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListManufacturedProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                ManufacturedProduct
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListRequestProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Product request
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListUserProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                 Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListSellProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                 Sell Product
              </p>
            </a>
          </li>
          <li>
          @elseif (Auth::user()->id == 2)
          <li class="nav-item">
            <a href="{{ url('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Dashbord
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListRawmaterial')}}" class="nav-link">
              <i class="nav-icon fas fa-qrcode"></i>
              <p>
              Raw material
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListUsedRawmaterial')}}" class="nav-link">
              <i class="nav-icon fas fa-qrcode"></i>
              <p>
                UsedRawmaterial
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListManufacturedProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-industry"></i>
              <p>
                ManufacturedProduct
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListRequestProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Product request
              </p>
            </a>
          </li>
            @elseif (Auth::user()->id == 3)
            <li class="nav-item">
            <a href="{{ url('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Dashbord
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListUserProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-trophy"></i>
              <p>
                 Product
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListRequestProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-paper-plane"></i>
              <p>
                Product request
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('ListSellProduct')}}" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                 Sell Product
              </p>
            </a>
          </li>
          <li>
            @endif
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
              Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
              </form>
          </li>
          <li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>