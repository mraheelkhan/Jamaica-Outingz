<!-- Main Sidebar Container -->
<aside class="main-sidebar">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar"  style="background-color: #fff; margin-top: 100px; border-radius: 10px;">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            {{-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul> --}}
          </li>
          <li class="nav-item">
            <a href="{{ route('tours.index') }}" class="nav-link active">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Tours & Excursions
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('restaurants.index') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Restaurants
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('unique-experiences.index') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Unique Experiences
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('bookings.index') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Bookings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('group-packages.index') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Group Packages
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('merchendises.index') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Merchandise
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('registered-guests.index') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Registered Guests
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tour-guides.index') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Tour Guides
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('scheduled-bookings.index') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Scheduled Bookings
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('promo-codes.index') }}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p>
                Promo Codes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p  style="visibility: hidden;">
                Promo Codes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p style="visibility: hidden;">
                Promo Codes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <p class="text-sm">
                &copy; Jamaica Outingz, All Rights Reserved
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
  </aside>