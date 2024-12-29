<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">Menu</li>
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}">
                          <i class="bi bi-grid"></i>
                          <span>Dashboard</span>
                        </a>
                      </li><!-- End Dashboard Nav -->
                      @if (auth()->check() && auth()->user()->role == 'Admin')
                      <li class="nav-item">
                        <a href="{{ url('/data-staff') }}" class="nav-link {{ Request::is('data-staff*') ? '' : 'collapsed' }}">
                            <i class="bi bi-person-fill"></i>
                            <span>Data Karyawan</span>
                        </a>
                    </li><!-- End Nav -->
                      @endif

                      @if (auth()->check() && auth()->user()->role == 'Admin')
                      <li class="nav-item">
                          <a href="{{ url('/data-product') }}" class="nav-link {{ Request::is('data-product*') ? '' : 'collapsed' }}">
                              <i class="bi bi-cart"></i>
                              <span>Data Product</span>
                          </a>
                      </li><!-- End Nav -->
                      @endif

                      @if (auth()->check() && auth()->user()->role == 'Admin')
                      <li class="nav-item">
                          <a href="{{ url('/data-customer') }}" class="nav-link {{ Request::is('data-customer*') ? '' : 'collapsed' }}">
                              <i class="bi bi-people-fill"></i>
                              <span>Data Customer</span>
                          </a>
                      </li><!-- End Nav -->
                      @endif

                      @if (auth()->check() && auth()->user()->role == 'Admin')
                      <li class="nav-item">
                          <a href="{{ url('/data-supplier') }}" class="nav-link {{ Request::is('data-supplier*') ? '' : 'collapsed' }}">
                              <i class="bi bi-truck"></i>
                              <span>Data Supplier</span>
                          </a>
                      </li><!-- End Nav -->
                      @endif
                      
                    <li class="nav-item">
                        <a href="{{ url('/data-transaction') }}" class="nav-link {{ Request::is('data-transaction*') ? '' : 'collapsed' }}">
                            <i class="bi bi-receipt"></i>
                            <span>Data Transaction</span>
                        </a>
                    </li><!-- End Nav -->
                    <li class="nav-item">
                        <a href="{{ url('/data-transactiondetail') }}" class="nav-link {{ Request::is('data-transactiondetail*') ? '' : 'collapsed' }}">
                            <i class="bi bi-list-ul"></i>
                            <span>Data Transaction Detail</span>
                        </a>
                    </li><!-- End Nav -->

                    
                </ul>
            </div>
        </nav>
    </div>
</div>
