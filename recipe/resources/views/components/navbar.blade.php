


<nav class="bg-gray-800 shadow-lg">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <a href="{{ route('starter.index') }}" class="flex-shrink-0 flex items-center">
                <img class="h-8" src="{{ asset('assets/logo.svg') }}" alt="SimplyRecipes" />
            </a>
            
            <!-- Mobile Menu Button -->
            <button class="block md:hidden text-gray-500 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-4">
                <a href="{{ route('starter.index') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                <a href="{{ route('starter.about') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">About</a>
                <a href="{{ route('starter.categories') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Categories</a>
                <a href="{{ route('starter.recipes') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Recipes</a>
                <a href="{{ route('starter.contact') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                <a href="/recipes/upload-recipe" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Add Recipe</a>
                
                <!-- Auth Links -->
                <div class="login-signup-wrapper flex items-center space-x-4">
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a href="{{ route('register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Signup</a>
                    @endguest
                    
                    <!-- If the user is authenticated -->
                    @auth
                        <div class="relative">
                            <button id="userDropdown" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium focus:outline-none" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden" aria-labelledby="userDropdown">
                                <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Dashboard</a>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Edit Profile</a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
