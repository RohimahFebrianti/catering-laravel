<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        @auth
        <a href="/dashboard" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>Viima Catering</span></h1>
        </a>
        @else
        <a class="logo d-flex align-items-center me-auto me-lg-0 disabled-link">
            <h1>Viima Catering</span></h1>
        </a>
        @endauth

        <nav id="navbar" class="navbar">
            <ul>
                @auth
                <li><a href="/dashboard">Beranda</a></li>
                <li><a href="/menu">Menu</a></li>
                <li><a href="/jenis">Jenis Langganan</a></li>
                <li><a href="/contact">Kontak</a></li>
                <li><a href="/status">Status Riwayat</a></li>
                @else
                <li><a href="javascript:void(0);" onclick="showAlert()">Beranda</a></li>
                <li><a href="javascript:void(0);" onclick="showAlert()">Menu</a></li>
                <li><a href="javascript:void(0);" onclick="showAlert()">Jenis Langganan</a></li>
                <li><a href="javascript:void(0);" onclick="showAlert()">Kontak</a></li>
                <li><a href="javascript:void(0);" onclick="showAlert()">Status Riwayat</a></li>
                @endauth
            </ul>
        </nav><!-- .navbar -->
        
        <script>
        function showAlert() {
            alert("Anda harus login terlebih dahulu.");
        }
        </script>
        
        @if (Route::has('login'))
            {{-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> --}}
            @auth

                <li class="nav-item dropdown" style="color: white">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                        <img width="50px" class="img-profile rounded-circle"
                            src="{{ asset('assets/admin/img/undraw_profile.svg') }}">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a href="/profile" class="dropdown-item">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>

                            Profile
                        </a>
                        <a href="/logout" class="dropdown-item">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout

                            <form method="POST" action="{{ route('logout') }}">
                                {{ csrf_field() }}
                                @method('POST')
                            </form>
                        </a>


                    </div>

                </li>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold btn-pesan-sekarang text-white-600 hover:text-white-900 dark:text-white-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                    in</a>
            @endauth
    </div>
    @endif
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header><!-- End Header -->
