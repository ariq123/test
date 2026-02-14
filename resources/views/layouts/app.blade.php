<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🎬</text></svg>">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body.bg-main {
            background-color: black;
            color: #fff;
            overflow-x: hidden;
        }

        .navbar {
            padding-top: 8px !important;
            padding-bottom: 8px !important;
            min-height: 50px;
            background-color: #000 !important;
            transition: background-color 0.4s ease-in-out, backdrop-filter 0.4s ease-in-out, box-shadow 0.4s ease;
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* Putih dengan opasitas 30% */
            border-radius: 3px;
            /* Membuat sudut membulat agar lebih estetik */
            background-color: #343a40;
            /* Warna awal (bg-dark) */
        }

        /* Class ini akan ditambahkan via JavaScript saat di-scroll */
        .navbar.navbar-scrolled {
            background-color: rgba(52, 58, 64, 0.3) !important;
            /* Hitam transparan */
            backdrop-filter: blur(10px);
            /* Efek kaca/blur di belakangnya */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }


        /* Transisi dasar untuk navbar */
        .transition-navbar {
            transition: all 0.4s ease-in-out;
        }

        .dropdown-menu {
            background-color: #333;
            border: 1px solid #444;
        }

        .dropdown-item {
            color: #fff;
            padding: 5px !important;
        }

        .dropdown-item:hover {
            background-color: #e50914;
            color: #fff;
        }

    </style>
</head>

<body class="bg-main">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top transition-navbar">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="/movies">
                🎬 {{ __('app.movies') }}
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto align-items-center">
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="nav-link dropdown-toggle btn-glass mr-3" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height: fit-content;">
                            <i class="fas fa-globe"></i> {{ __('app.language') }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                            <a class="dropdown-item" href="{{ route('change.language', ['locale' => 'en']) }}">🇺🇸 English</a>
                            <a class="dropdown-item" href="{{ route('change.language', ['locale' => 'id']) }}">🇮🇩 Indonesia</a>
                        </div>
                    </li>

                    <li class="nav-item mr-2">
                        <a href="/favorites" class="btn btn-warning btn-sm">
                            <i class="fas fa-star"></i> {{ __('app.favorite') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/logout" class="btn btn-danger btn-sm">
                            <i class="fas fa-sign-out-alt"></i> {{ __('app.logout') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px; min-height: 80vh;">
        @yield('content')
    </div>

    <div aria-live="polite" aria-atomic="true" class="toast-container">
        @if(!empty($warningToast))
        <div class="toast custom-slide border-warning shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <div class="toast-header bg-warning text-dark">
                <strong class="mr-auto"><i class="fas fa-exclamation-circle"></i> {{ __('app.warning') }}</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body bg-white text-dark font-weight-bold">
                {{ $warningToast }}
            </div>
        </div>
        @endif
    </div>

    <footer class="text-center py-4 text-muted small mt-5">
        &copy; {{ date('Y') }} Movie App. All rights reserved.
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.toast').toast('show');
        });

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // 1. Init AOS
            AOS.init({
                once: true
                , duration: 800
                , offset: 100
            });

            // 2. Navbar Scroll Effect
            const navbar = document.querySelector('.navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('navbar-scrolled');
                    navbar.classList.remove('bg-dark');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                    navbar.classList.add('bg-dark');
                }
            });

            // 3. Toast Notifications
            @if(session('lang_changed'))
            showToast("{{ __('app.lang_changed') }}", "success");
            @endif

            @if(session('success'))
            showToast("{{ session('success') }}", "success");
            @endif

            @if(session('error'))
            showToast("{{ session('error') }}", "error");
            @endif

            @if(session('notification'))
            showToast("{{ session('notification') }}", "info");
            @endif
        });

    </script>
</body>
</html>
