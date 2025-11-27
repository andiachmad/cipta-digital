<nav>
    <a href="{{ url('/') }}" class="logo-header">
        <img src="{{ asset('images/logo (2).png') }}" alt="Cipta Digital">
    </a>
    <div class="menu" id="navMenu">
        <a href="{{ route('homepage.products') }}">Products</a>
        <a href="{{ route('homepage.cart') }}">Cart</a>
        <a href="{{ route('homepage.index') }}">Home</a>
        <a href="#">About Us</a>
        <a class="login" href="#">Login</a>
    </div>
    <div class="mobile-toggle" id="mobileToggle">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>