<aside class="sidenav bg-somon navbar navbar-vertical navbar-expand-xs border-radius-xl my-3 fixed-start ms-3" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
      <!-- <img src="./img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> -->
      <h4><span class="ms-1 font-weight-bold text-white">Sections</span></h4>
    </a>
  </div>
  <hr class="horizontal light mt-0 ">
  <div class="w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{  str_contains(request()->url(), 'tests') == true ? 'active' : '' }}" href="{{ route('tests') }}">
          <div class="icon icon-shape icon-shape i icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-credit-card text-white text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1 text-white">Tests</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{  str_contains(request()->url(), 'mes-resultats') == true ? 'active' : '' }}" href="{{ route('mes-resultats') }}">
          <div class="icon icon-shape icon-shape i icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-paper-diploma text-white text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1 text-white">Mes Resultats</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
          <div class="icon icon-shape icon-shape i icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-single-02 text-white text-sm opacity-10"></i>
          </div>
          <span class="nav-link-text ms-1 text-white">Profile</span>
        </a>
      </li>
    </ul>
  </div>
</aside>