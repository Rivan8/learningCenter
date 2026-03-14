<div class="wrapper">
  @php
    $assetBase = rtrim(request()->getBasePath(), '\/');
  @endphp
  <!-- Sidebar -->
  <div class="sidebar" data-background-color="light">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header pt-3 pb-3" data-background-color="dark">
        <a href="{{ route('dashboard') }}" class="logo">
          @if(request()->routeIs('dashboard'))
            <img src="{{ $assetBase }}/assets/img/logo/logo_equip.png" alt="DCT Logo" class="navbar-brand" height="70">
          @elseif(request()->routeIs('equip'))
            <img src="{{ $assetBase }}/assets/img/logoproduct.svg" alt="Equip Logo" class="navbar-brand" height="70">
          @else
            <img src="{{ $assetBase }}/assets/img/logo/logo_equip.png" alt="Equip Logo" class="navbar-brand" height="70">
          @endif
        </a>


        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <!-- {{-- Tanggal dan jam --}}
    <div class="container d-flex flex-column justify-content-center align-items-center">
      <div id="clock" style="color: rgb(255, 255, 255); font-size: 15px;"></div>
      <div id="date" style="color: rgb(255, 255, 255); font-size: 18px;"></div>
    </div> -->

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          @if(auth()->check() && auth()->user()->role === 'admin')
            <li class="nav-item {{ request()->routeIs(('member')) ? 'active' : '' }}">
              <a href="{{ route('member') }}">
                <i class="fas fa-home"></i>
                <p>Home</p>
              </a>
            </li>
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <a href="{{ route('dashboard') }}">
                <i class="fas fa-user-tag"></i>
                <p>Disciples Community</p>
              </a>
            </li>
            <li class="nav-item {{ request()->routeIs('equipClass.index') ? 'active' : '' }}">
              <a href="{{ route('equipClass.index') }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>FC1 & MC</p>
              </a>
            </li>
            <li class="nav-item {{ request()->routeIs('equipPlant.index') ? 'active' : '' }}">
              <a href="{{ route('equipPlant.index') }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>FC 2 & FC 3</p>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Components</h4>
            </li>
          @else
            <li class="nav-item {{ request()->routeIs(('home')) ? 'active' : '' }}">
              <a href="{{ route('member') }}">
                <i class="fas fa-home"></i>
                <p>Home</p>
              </a>
            </li>
            {{-- Disciples Community --}}
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <a href="{{ route('dashboard') }}">
                <i class="fas fa-th-large"></i>
                <p>Disciples Community</p>
              </a>
            </li>
            {{-- Equip Class --}}
            <li class="nav-item {{ request()->routeIs('equipClass.index') ? 'active' : '' }}">
              <a href="{{ route('equipClass.index') }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>FC1 & MC</p>
              </a>
            </li>
            <li class="nav-item {{ request()->routeIs('equipPlant.index') ? 'active' : '' }}">
              <a href="{{ route('equipPlant.index') }}">
                <i class="fas fa-chalkboard-teacher"></i>
                <p>FC 2 & FC 3</p>
              </a>
            </li>
          @endif
@if(auth()->check() && auth()->user()->role === 'admin')
  @php
    $pendingAccessRequests = \App\Models\AccessRequest::where('status', 'pending')->count();
    $pendingFc1McRequests = \App\Models\Fc1McRequest::where('status', 'pending')->count();
  @endphp
  <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
    <a href="{{ route('users.index') }}">
      <i class="fas fa-users"></i>
      <p>Users</p>
    </a>
  </li>
  <li class="nav-item {{ request()->routeIs('admin.access-requests') ? 'active' : '' }}">
    <a href="{{ route('admin.access-requests') }}" class="d-flex align-items-center justify-content-between">
      <span>
        <i class="fas fa-envelope-open-text"></i>
        <p class="d-inline ms-2 mb-0">Request Peserta</p>
      </span>
      @if($pendingAccessRequests > 0)
        <span class="badge" style="background:#7c3aed;color:#fff;font-weight:600;border-radius:10px;padding:4px 12px;font-size:0.85em;">Baru</span>
      @endif
    </a>
  </li>
  <li class="nav-item {{ request()->routeIs('admin.fc1mc-requests') ? 'active' : '' }}">
    <a href="{{ route('admin.fc1mc-requests') }}" class="d-flex align-items-center justify-content-between">
      <span>
        <i class="fas fa-graduation-cap"></i>
        <p class="d-inline ms-2 mb-0">Request FC1/MC</p>
      </span>
      @if($pendingFc1McRequests > 0)
        <span class="badge" style="background:#7c3aed;color:#fff;font-weight:600;border-radius:10px;padding:4px 12px;font-size:0.85em;">Baru</span>
      @endif
    </a>
  </li>
@endif

          {{-- <!-- <li class="nav-item {{ request()->routeIs(('books.index')) ? 'active' : '' }}">
            <a href="{{ route('books.index') }}">
              <i class="fas fa-book"></i>
              <p>Buku</p>
              {{-- <span class="badge badge-success">4</span> --}}
            </a>
          {{-- </li>
          <li class="nav-item {{ request()->routeIs('categories.index') ? 'active' : '' }}">
            <a href="{{ route('categories.index') }}">
              <i class="fas fa-layer-group"></i>
              <p>Categories</p>
              {{-- <span class="badge badge-secondary">1</span> --}}
            </a>
          </li> --}}

          {{-- <li class="nav-item {{ request()->routeIs('borrowings.index') ? 'active' : '' }}">
            <a href="{{ route('borrowings.index') }}">
                <i class="bi bi-bookmark-check-fill"></i>
              <p>Peminjaman</p>
              {{-- <span class="badge badge-secondary">1</span> --}}
            </a>
          </li> --}}
          {{-- <li class="nav-item">
            <a data-bs-toggle="collapse" href="#submenu">
              <i class="fas fa-bars"></i>
              <p>Menu Levels</p>
              <span class="caret"></span>
            </a>
            <div class="collapse" id="submenu">
              <ul class="nav nav-collapse">
                <li>
                  <a data-bs-toggle="collapse" href="#subnav1">
                    <span class="sub-item">Level 1</span>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="subnav1">
                    <ul class="nav nav-collapse subnav">
                      <li>
                        <a href="#">
                          <span class="sub-item">Level 2</span>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <span class="sub-item">Level 2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a data-bs-toggle="collapse" href="#subnav2">
                    <span class="sub-item">Level 1</span>
                    <span class="caret"></span>
                  </a>
                  <div class="collapse" id="subnav2">
                    <ul class="nav nav-collapse subnav">
                      <li>
                        <a href="#">
                          <span class="sub-item">Level 2</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a href="#">
                    <span class="sub-item">Level 1</span>
                  </a>
                </li>
              </ul>
            </div>
          </li> --> --}} --}}
          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->
  <script>
    function updateClock() {
        const clockElement = document.getElementById('clock');
        if (clockElement) {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');

            // Clear previous content
            clockElement.innerHTML = '';

            // Add time without seconds
            const timeText = document.createTextNode(`${hours}:${minutes}:`);
            clockElement.appendChild(timeText);

            // Add seconds with special styling
            const secondsElement = document.createElement('span');
            secondsElement.textContent = seconds;
            secondsElement.style.color = '#FA812F';
            clockElement.appendChild(secondsElement);
        }
    }

    function updateDate() {
        const dateElement = document.getElementById('date');
        if (dateElement) {
            const now = new Date();
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            dateElement.textContent = now.toLocaleDateString('id-ID', options);
        }
    }

    // Only run clock and date updates if elements exist
    if (document.getElementById('clock')) {
        setInterval(updateClock, 1000);
        updateClock();
    }

    if (document.getElementById('date')) {
        updateDate();
    }
</script>
