<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="#">Hadi_Mulya_Toko</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
      
              <li class="nav-item dropdown pe-3">
      
                {{-- <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  @if (auth()->user()->jenis_kelamin == 'L')
                    <img src="{{ asset('assets/img/profile laki.jpg') }}" alt="Profile" class="rounded-circle">
                  @else
                    <img src="{{ asset('assets/img/profile perempuan.jpg') }}" alt="Profile" class="rounded-circle">
                  @endif
                  <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->nama }}</span>
                </a><!-- End Profile Iamge Icon --> --}}
      
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                  <img src="{{ auth()->user()->profile ? asset('assets/img/profile/' . auth()->user()->profile) : asset('default-profile.png') }}" class="rounded-circle" width="35" height="35" alt="" />
                  <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                </a><!-- End Profile Iamge Icon -->
      
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                  <li class="dropdown-header">
                    {{-- <img src="{{ auth()->user()->profile ? asset('assets/img/profile/' . auth()->user()->profile) : asset('default-profile.png') }}" class="rounded-circle" width="80" height="80" alt="" /> --}}
                    <h6>{{ auth()->user()->name }}</h6>
                    <span>{{ auth()->user()->role }}</span>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                 
                  <li>
                    <hr class="dropdown-divider">
                  </li>
      
                  <li>
                    <a class="dropdown-item d-flex align-items-center" href="/logout">
                      <i class="bi bi-box-arrow-right"></i>
                      <span>Sign Out</span>
                    </a>
                  </li>
      
                </ul><!-- End Profile Dropdown Items -->
              </li><!-- End Profile Nav -->
      
            </ul>
          </nav><!-- End Icons Navigation -->
    </nav>
</div>
