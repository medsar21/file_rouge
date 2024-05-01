<style>
/* Navbar styles */
.navbar {
    background-color: #1a202c; /* Updated background color */
    color: #ffffff; /* Text color */
    padding: 1rem 0; /* Add padding */
}

.nav-center {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 1rem; /* Add horizontal padding */
}

.nav-header {
    display: flex;
    align-items: center;
}

.nav-logo img {
    width: 120px; /* Updated logo size */
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 1.5rem; /* Adjust space between links */
}

.nav-link {
    text-decoration: none;
    color: #ffffff; /* Link color */
    transition: color 0.3s ease;
    font-size: 0.9rem; /* Updated font size */
}

.nav-link:hover {
    color: #cbd5e0; /* Hover color */
}

/* Responsive styles */
@media (max-width: 768px) {
    .nav-links {
        display: none;
    }

    .nav-header {
        justify-content: space-between;
        width: 100%;
    }

    .nav-links.show {
        display: flex;
        flex-direction: column;
        position: absolute;
        top: 60px; /* Adjust the top position as needed */
        left: 0;
        width: 100%;
        background-color: #1a202c; /* Updated background color */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        z-index: 1;
    }

    .nav-link {
        margin-right: 0;
        margin-bottom: 1rem;
    }
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
            <a href="{{ route('starter.categories') }}" class="nav-link">Categories</a>
            <a href="{{ route('starter.recipes') }}" class="nav-link">Recipes</a>
            <a href="{{ route('starter.contact') }}" class="nav-link">Contact</a>
            <a href="/recipes/upload-recipe" class="nav-link">Add Recipe</a>

            <!-- Wrap login and signup buttons in a div and align them to the left -->
            <div class="login-signup-wrapper">
                @guest
                    <a href="{{ route('login') }}" class="nav-button login-button btn">Login</a>
                    <a href="{{ route('register') }}" class="nav-button signup-button btn">Signup</a>
                @endguest

                <!-- If the user is authenticated, you can display a logout button instead -->
                @auth

                <div class="dropdown-menu show no-style bg-gray-100 border border-gray-200 rounded-lg">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu " aria-labelledby="userDropdown">
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
