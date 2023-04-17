<aside class="sidenav bg-somon navbar navbar-vertical navbar-expand-xs border border-dark border-1 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
      <!-- <img src="./img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> -->
      <h4><span class="ms-1 font-weight-bold text-white">Sections</span></h4>
    </a>
  </div>
  <hr class="horizontal light mt-0">
  <div class="w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      {{-- <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link {{ str_contains(request()->url(), 'user-management') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'user-management']) }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-bullet-list-67 text-white text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1 text-white">User Management</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1 text-white">Profile</span>
        </a>
      </li>
      {{-- <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Pages</h6>
      </li> --}}
    </ul>
  </div>
</aside>