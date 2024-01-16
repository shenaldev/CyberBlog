<!---------------------
Navigation Bar For Mobile And Tablets
------------------------------------->
<nav class="navbar navbar-expand-lg navbar-mobile">
    <div class="container-fluid">
        <div class="row navbar-row">
            <div class="col-6 mobile-logo">
                <a href="{{ route('index') }}"> <img src="{{ asset(config('global.logo')) }}" alt="Logo"> </a>
            </div>
            <div class="col-6 navbar-icons">
                <div class="row justify-content-center">
                    <div class="col">
                        <!-- <img src="{{ asset('img/icons/user-avatar.svg') }}" alt="account" id="user-icon-nav" class="menu-icon"> -->
                    </div>
                    <div class="col">
                        <!-- <img src="{{ asset('img/icons/search.svg') }}" alt="search" class="menu-icon" id="search-icon"> -->
                    </div>
                    <div class="col">
                        <svg class="menu-icon menu-list-icon" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 78.1 59.4">
                            <title>menu</title>
                            <path d="M4.8,10H73.2c6.4,0,6.4-10,0-10H4.8c-6.4,0-6.4,10,0,10Z" fill="#00b9ff" />
                            <path d="M4.8,34.7H73.2c6.4,0,6.4-10,0-10H4.8c-6.4,0-6.4,10,0,10Z" fill="#00b9ff" />
                            <path d="M5,59.4H73.3c6.4,0,6.4-10,0-10H5c-6.5,0-6.5,10,0,10Z" fill="#00b9ff" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="mobile-menu-div">
    <div class="menu-div-inner">
        <ul>
            <li>
                <a href="{{ route('index') }}">Home</a>
            </li>
            <li>
                <a href="#">About Us</a>
            </li>
            <li>
                <a href="{{ route('contact-us') }}">Contact Us</a>
            </li>
            <li>
                <a href="{{ route('categories') }}">Categories</a>
            </li>
            <li>
                <a href="#">Author</a>
            </li>
            @guest
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}">Register</a>
            </li>
            @else(Auth::check())
            <li>
                <a href="{{ route('myaccount') }}">My Account</a>
            </li>
            @if(Auth::user()->admin)
            <li>
                <a href="{{ route('dashboard') }}">Admin Panel</a>
            </li>
            @endif
            <li>
                <a href="#" onclick="$('#logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endif
        </ul>
        <ul class="search-ul">
            <li>
                <div class="search-mobile">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="form-group">
                            <input type="text" name="query" placeholder="Search Here..." class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn-blue btn" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>

<!---------------------
Navigation Bar For Desktops
------------------------------------->

<nav class="navbar-desktop">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 logo-col">
                <a href="{{ route('index') }}"> <img src="{{ asset(config('global.logo')) }}" alt="Logo"> </a>
            </div>
            <div class="col-9 nav-bg">
                <div class="row">
                    <div class="col-10 nav-menu">
                        <ul>
                            <li>
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li>
                                <a href="#">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('contact-us') }}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('categories') }}">Categories</a>
                            </li>
                            <li>
                                <a href="#">Author</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-2 nav-icons">
                        <span class="menu-icon" alt="account" id="user-icon-nav">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 110.9">
                                <title>user</title>
                                <path
                                    d="M0,110.9H100s-.3-18.1-4.9-22.6-7.4-7.5-25.4-13.4A3.3,3.3,0,0,1,67.6,73l-1.2-2.8a1.8,1.8,0,0,0-1.6-1H62.5l.2-6.9.3-2.5,1.3-5.5h0A3.8,3.8,0,0,0,67.8,52c1-2.6,2.4-6.7,2.2-10a3,3,0,0,0-1.1-2.3l-.3-.2.5-2.5s4.5-13.6-3-21.5a24.2,24.2,0,0,0-7-5.3,9.3,9.3,0,0,0-5.2-1.5H50.8a2,2,0,0,1-1.9-1.2L45.2,0S35.8,3.9,33.8,11.6l-.4,1.8a3.4,3.4,0,0,1-2.5-4.7s-2,4.3-1,7.8c0,0-3.6,4.3-3.6,6.5h1.2S26.3,33,28,37.2l.5,2.1h0a1.8,1.8,0,0,0-1.4,1.9c0,3.7.5,13.2,4.9,13.3L33.2,61l.5,3.4.7,4.8H32.6a2,2,0,0,0-1.7,1.2,18.3,18.3,0,0,1-1.4,2.8c-2.4,3.7-22,9.1-25,13.2S-.2,99.7,0,110.9Z"
                                    fill="#00b9ff" />
                            </svg>
                        </span>
                        <span class="menu-icon search-icon" alt="search" id="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100.3">
                                <title>search</title>
                                <path
                                    d="M71.5,63.1H66.9L65,61.3h-.1A37.8,37.8,0,1,0,61,65.2h0l1.9,1.8v4.8l28.4,28.4,8.7-8.7ZM37,63.2A25.8,25.8,0,1,1,62.8,37.4,25.8,25.8,0,0,1,37,63.2Z"
                                    fill="#00b9ff" />
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container-auth">
    <div class="auth-inner">
        <ul>
            @guest
            <li>
                <a href="{{ route('login') }}">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}">Register</a>
            </li>
            @else(Auth::check())
            <li>
                <a href="{{ route('myaccount') }}">My Account</a>
            </li>
            @if(Auth::user()->admin)
            <li>
                <a href="{{ route('dashboard') }}">Admin Panel</a>
            </li>
            @endif
            <li>
                <a href="#" onclick="$('#logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endif
        </ul>
    </div>
</div>

<div class="container-search">
    <div class="search-inner">
        <div>
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="query" placeholder="Type Here...">
            </form>
        </div>
    </div>
</div>