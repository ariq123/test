<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Movie App</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🎬</text></svg>">

    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background-color: #0a0a0a;
            color: white;
            /* Background Statis (Bening) */
            background-image:
                radial-gradient(circle at center, rgba(80, 80, 120, 0.15) 0%, transparent 70%),
                url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)' opacity='0.05'/%3E%3C/svg%3E");
            background-size: cover;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            width: 100%;
        }

        .form-control {
            background: rgba(0, 0, 0, 0.4) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: white !important;
            border-radius: 50px;
            padding: 25px 20px;
        }

        .form-control:focus {
            background: rgba(0, 0, 0, 0.6) !important;
            border-color: #E50914 !important;
            box-shadow: 0 0 10px rgba(229, 9, 20, 0.4) !important;
        }

        .btn-login {
            background: #E50914;
            border: none;
            color: white;
            border-radius: 50px;
            padding: 12px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.3s;
        }

        .btn-login:hover {
            background: #f40612;
            transform: translateY(-2px);
            color: white;
        }

    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-md-6 col-lg-4">

                <div class="glass-card text-center">
                    <div class="mb-4">
                        <span style="font-size: 3.5rem;">🎬</span>
                        <h4 class="font-weight-bold mt-3 text-white">Movie Login</h4>
                    </div>

                    <form method="POST" action="/login">
                        {{ csrf_field() }}

                        <div class="form-group mb-3">
                            <input class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>

                        <div class="form-group mb-4">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <button class="btn btn-login btn-block mb-3">
                            Login
                        </button>

                        <div class="text-left ml-2">
                            <label class="small text-muted" style="cursor: pointer;">
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            @if(session('notification'))
            Swal.fire({
                toast: true
                , position: 'top'
                , icon: 'info'
                , title: "{{ session('notification') }}"
                , showConfirmButton: false
                , timer: 3000
                , background: '#333'
                , color: '#fff'
            });
            @endif

            @if(session('error'))
            Swal.fire({
                toast: true
                , position: 'top'
                , icon: 'error'
                , title: "{{ session('error') }}"
                , showConfirmButton: false
                , timer: 3000
                , background: '#333'
                , color: '#ff4444'
            });
            @endif
        });

    </script>
</body>

</html>
