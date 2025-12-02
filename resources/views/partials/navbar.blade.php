<nav>
    <a href="{{ url('/') }}" class="logo-header">
        <img src="{{ asset('images/logo (2).png') }}" alt="Cipta Digital">
    </a>
    <div class="menu" id="navMenu">
        <a href="{{ route('homepage.products') }}">Products</a>
        <a href="{{ route('homepage.cart') }}">Cart</a>
        <a href="{{ route('homepage.index') }}">Home</a>
        
        @auth
            <div class="user-menu" style="display: inline-block; margin-left: 20px;">
                <span style="color: #333; font-weight: 600; margin-right: 10px;">Hi, {{ Auth::user()->nama }}</span>
                <form action="{{ route('auth.logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn" style="background: none; border: 1px solid #dc3545; color: #dc3545; padding: 5px 10px; border-radius: 5px; cursor: pointer;">Logout</button>
                </form>
            </div>
        @else
            <a class="login" href="{{ route('auth.login') }}">Login</a>
        @endauth
    </div>
    <div class="mobile-toggle" id="mobileToggle">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>