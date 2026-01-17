<!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/profile">
            <h3 class="text-primary">{{ Auth::user()->name }}</h3>
            <div>
              <h6 class="text-dark">{{ Auth::user()->email }}</h6>
            </div>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
              <span class="hide-menu">MASTER</span>
            </li>
                @if (Auth::check() &&  Auth::user()->role === 'admin')
            <li class="sidebar-item">
              <a class="sidebar-link" href="/category" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:checklist-linear" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Category</span>
              </a>
            </li>
            @endif
            <li class="sidebar-item">
              <a class="sidebar-link" href="/product" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:box-minimalistic-broken" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Product</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/transactions" aria-expanded="false">
                <span>
                  <iconify-icon icon="solar:add-square-broken" class="fs-6"></iconify-icon>
                </span>
                <span class="hide-menu">Transactions</span>
              </a>
            </li>
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->