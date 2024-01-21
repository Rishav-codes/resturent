<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for responsiveness -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title -->
    <title>{{ env('APP_NAME') }} - Taste Better</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <!-- Custom Styles -->
    <style>
        .navbar-nav .nav-link {
            color: white;
            margin-right: 1rem;
        }

        .h3 {
            color: white;
            font-size: 2rem;
        }

        /* Additional CSS for responsiveness */
        .navbar-brand img {
            width: 100%;
            /* Make the logo responsive */
            max-width: 110px;
            /* Limit max-width for larger screens */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark text-dark">
        <div class="container">
            <!-- Navbar Brand -->
            <a href="#" class="navbar-brand">
                <img src="https://www.hotandsweets.in/assets/logo-light.png" alt="">
            </a>

            <!-- Toggler/collapsibe Button for smaller screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <div class="navbar-nav">
                    <a href="{{ route('home.index') }}" class="nav-link nav-item">Home</a>
                    @auth
                        <a href="{{ route('cart') }}" class="nav-link nav-item">Cart</a>
                        <a href="#" class="nav-link nav-item text-capitalize text-success">{{ auth()->user()->name }}</a>
                        <a href="{{ route('myOrder') }}" class="nav-link nav-item">My Order</a>
                        <a href="{{ route('logout') }}" class="nav-link nav-item">Logout</a>
                    @endauth

                    @guest
                        <a href="{{ route('signup') }}" class="nav-link nav-item">Signup</a>
                        <a href="{{ route('login') }}" class="nav-link nav-item">Login</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    @section('content')
    @show

    <!-- Toastr Notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>
        toastr.options = {
            "closeButton": true,
        }

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
    </script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
