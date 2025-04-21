    <div class="aside_container">
        <div class="aside_logo">
            <img src="{{ asset('assets/images/logo.png') }}" width="40px" height="40px" alt="logo">
            <a href="{{ route('home')}}" target="_blank">Vogue</a>
        </div>

        <div class="aside_links">
            <ul>
                <li class="{{ request()->routeIs('admin_dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin_dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                
                <li class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('shop.*') ? 'active' : '' }}">
                    <a href="{{ route('shop.index') }}">
                        <i class="fas fa-tools"></i>
                        <span>Shop</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('orders.*') ? 'active' : '' }}">
                    <a href="{{ route('orders.index') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>


                <li class="{{ request()->routeIs('blog.*') ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-blog"></i>
                        <span>Blogs</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('messages.*') ? 'active' : '' }}">
                    <a href="{{ route('messages.index') }}">
                        <i class="fas fa-comments"></i>
                        <span>Messages</span>
                    </a>
                </li>

            </ul>
        </div>

        <div class="user">
            <div class="image">
                <img src="{{ asset('assets/images/user.png') }}" alt="avator">
            </div>

            <div class="name">
                <a href="{{ route('profile.edit')}}">{{ Auth::User()->names }}</a>
            </div>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="logout">Log out</button>
            </form>
        </div>
    </div>
