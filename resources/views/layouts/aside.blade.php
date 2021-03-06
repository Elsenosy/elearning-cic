@php 
  $ins = auth('instructor')->user();
@endphp 
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist') }}/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
          <img src="{{ \Storage::url(auth('instructor')->user()->avatar) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth('instructor')->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item menu-open"> --}}
          <li class="nav-item {{ in_array('instructors', request()->segments()) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{ __('lang.instructors') }}
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('instructors') }}" class="nav-link {{ request()->is('instructors') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('lang.view_instructors') }}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('instructors/create') }}" class="nav-link {{ request()->is('instructors/create') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{ __('lang.add_instructor') }}</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
      
    </div>
    <!-- /.sidebar -->
  </aside>