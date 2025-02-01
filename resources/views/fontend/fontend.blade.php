<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">WB Software</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <div class="botton-sub">
                        @auth('customer')
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::guard('customer')->user()->username }}
                            </button>
                            <div class="dropdown-menu">
                                <!-- Profile Link -->
                                <a class="dropdown-item" href="">Profile</a>

                                <!-- Logout Form -->
                                <a class="dropdown-item" href="{{ route('customer.logout') }}">Log out</a>
                            </div>
                        </div>
                        @else
                        <!-- Sign Up Link -->
                        <a href="{{ route('login_page') }}" class="btn-subscribe">Sign Up</a>
                        @endauth
                    </div>

                    <li class="nav-item">
                        <a class="nav-link" href="" id="cart-icon">
                            <i class="bi bi-cart"></i> Cart (<span id="cart-count">{{ session('cart_count', 0) }}</span>)
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <!-- Product Card -->
            @foreach (App\Models\Product::all() as $product)
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text"> Price:$ {{ $product->price }}</p>
                        <a class="btn btn-primary add-to-cart" href="{{ route('add.to.cart', $product->id) }}">Add to Cart</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS (Includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
