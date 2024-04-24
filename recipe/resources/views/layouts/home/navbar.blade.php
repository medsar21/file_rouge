<style>
    .no-style {
        /* Add any specific styles you want to override or reset here */
        /* For example, to remove padding and background color: */
        padding: 0;
        background-color: transparent;
    }
</style>
<nav class="navbar">
    <div class="nav-center">
        <div class="nav-header">
            <a href="{{ route('starter.index') }}" class="nav-logo">
                <img src="{{ asset('assets/logo.svg') }}" alt="SimplyRecipes" />
            </a>
            <button class="nav-btn btn">
                <i class="fas fa-align-justify"></i>
            </button>
        </div>
        <div class="nav-links">
            <a href="{{ route('starter.index') }}" class="nav-link">Home</a>
            <a href="{{ route('starter.about') }}" class="nav-link">About</a>
            <a href="{{ route('starter.tags') }}" class="nav-link">Tags</a>
            <a href="{{ route('starter.categories') }}" class="nav-link">Categories</a>
            <a href="{{ route('starter.recipes') }}" class="nav-link">Recipes</a>
            <a href="{{ route('starter.contact') }}" class="nav-link">Contact</a>

            <!-- Wrap login and signup buttons in a div and align them to the left -->
            <div class="login-signup-wrapper">
                @guest
                    <a href="{{ route('login') }}" class="nav-button login-button btn">Login</a>
                    <a href="{{ route('register') }}" class="nav-button signup-button btn">Signup</a>
                @endguest

                <!-- If the user is authenticated, you can display a logout button instead -->
                @auth

                    <div class="dropdown-menu show no-style" aria-labelledby="userDropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                    </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </div>

        </div>
    </div>
</nav>
