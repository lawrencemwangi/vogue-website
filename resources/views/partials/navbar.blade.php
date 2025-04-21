<div class="navbar_container">
    <div class="nav_logo">
        <div class="logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="{{ ('app.name') }}">
        </div>
        
        <div class="home">
            <a href="{{ route('home') }}">{{ config('app.name') }}</a>
        </div>
    </div>

    <div class="nav_links" id="navLinks">
        <ul>
            @if(Auth::check() && (Auth::user()->user_level == 1 || Auth::user()->user_level == 0))
                <li>
                    <a href="{{ route('admin_dashboard') }}" target="_blank">Dashboard</a>
                </li>
            
            @elseif(Auth::user() && Auth::user()->user_level == 2)
                <li>
                    <a href="{{ route('dash_board') }}">Dashboard</a>
                </li>
            @endif
            
            <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                <a href="{{ route('about') }}">About</a>
            </li>

            <li class="{{ request()->routeIs('shop') ? 'active' : '' }}">
                <a href="{{ route('shop') }}">Shop</a>
            </li>

            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                <a href="{{ route('contact') }}">Contact</a>
            </li>

            <li><a href="{{ route('cart.view') }}">
                    <i class="fas fa-cart-plus">
                    <span>{{ Session::get('cart_count', 0) }}</span></i>
                </a>
            </li>

            <li class="profile">
                @if(Auth::user())
                    <a href="{{ route('profile.edit') }}" class="profiles">
                        <i class="fa fa-user"></i>
                    </a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="logout">Log out</button>
                    </form>
                @else
                    <button><a href="{{ route('login') }}" class="btn">Login</a></button>
                @endif
            </li>
        </ul>
    </div>

    <div class="burger" id="burgerIcon">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>