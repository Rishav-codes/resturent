<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN PANEL |Foodie- Taste Better</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>

<body>

    <div class="navbar navbar-expand-lg bg-dark navbar-dark text-dark">
        <div class="container">
            <a href="" class="navbar-brand">ADMIN PANEL | {{ env('APP_NAME') }}</a>

            <div class="navbar-nav nav">
                <a href="" class="nav-link nav-item">Home</a>
                <a href="{{route('adminlogout')}}" class="nav-link nav-item">Logout</a>
            </div>
        </div>
    </div>

    <div class="navbar navbar-expand-lg navbar-dark bg-secondary p-0 small">
        <div class="container">
            <div class="navbar-nav nav">
                <a href="{{ route('admin.dashboard') }}" class="nav-link nav-item">Home</a>
                <a href="{{ route('admin.category') }}" class="nav-link nav-item">Manage Category</a>
                <a href="{{ route('admin.cart.index') }}" class="nav-link nav-item">Manage Carts</a>
                <a href="{{ route('admin.product.index') }}" class="nav-link nav-item">Manage Products</a>
                <a href="{{ route('admin.product.insert') }}" class="nav-link nav-item">Insert Product</a>
            </div>
        </div>
    </div>

    @section('content')
    @show
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
        <script>
            toastr.options = {
                "closeButton": true,
            }
            @if (session('error'))
                toastr.error("{{ session('error') }}")
            @endif
            @if (session('success'))
                toastr.success("{{ session('success') }}")
            @endif
        </script>
</body>

</html>
