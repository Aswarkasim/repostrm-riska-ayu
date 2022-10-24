  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <img src="/img/logo.png" alt="AdminLTE Logo" width="15px" class="" style="opacity: .8"> 
      <span class="brand-text font-weight-light">REPOSTM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               @if (auth()->user()->role == 'admin')

          <li class="nav-item">
            <a href="/admin/dashboard" class="nav-link {{Request::is('admin/dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="/admin/dosen" class="nav-link {{Request::is('admin/dosen') ? 'active' : ''}}">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Dosen
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/matakuliah" class="nav-link {{Request::is('admin/matakuliah*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Matakuliah
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/bajar" class="nav-link {{Request::is('admin/bajar*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Bahan Ajar
              </p>
            </a>
          </li>

          {{-- <li class="nav-item">
            <a href="/admin/konfigurasi" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Konfigurasi
              </p>
            </a>
          </li> --}}

          @endif

          @if (auth()->user()->role == 'dosen')

          {{-- <li class="nav-item {{Request::is('dosen/matakuliah*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('dosen/matakuliah*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Matakuliah
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          
              <li class="nav-item">
                <a href="/dosen/matakuliah/ptik" class="nav-link {{Request::is('dosen/matakuliah/ptik*') ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PTIK</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/dosen/matakuliah/tekom" class="nav-link {{Request::is('dosen/matakuliah/tekom*') ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TEKOM</p>
                </a>
              </li>
          
            </ul>
          </li> --}}

          <li class="nav-item">
            <a href="/dosen/matakuliah" class="nav-link {{Request::is('dosen/matakuliah*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-calendar"></i>
              <p>
                Matakuliah
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="/dosen/bajar" class="nav-link {{Request::is('dosen/bajar*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Bahan Ajar
              </p>
            </a>
          </li>
          @endif

         
          {{-- <li class="nav-item {{Request::is('admin/user*') ? 'menu-open' : ''}}">
            <a href="#" class="nav-link {{Request::is('admin/user*') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/user?role=user" class="nav-link {{request('role')== 'user' ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/user?role=admin" class="nav-link  {{request('role')== 'admin' ? 'child-active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
            </ul>
          </li> --}}

           {{-- <li class="nav-item">
            <a href="/admin/banner" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Banner
              </p>
            </a>
          </li> --}}
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


