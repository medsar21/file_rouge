<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>

<body>
<x-navbar />
    <div class="font-[sans-serif] text-[#333] max-w-7xl mx-auto  max-h-screen overflow-none">
        <div class="grid md:grid-cols-2 items-center gap-8 h-[70vh] mb-6">
            <form action="/register" method="post" class="max-w-lg max-md:mx-auto w-full p-6">
                @csrf
                <div class="mb-10">
                    <h3 class="text-4xl font-extrabold">Sign Up</h3>
                  
                </div>
                <div class="text-red-500 text-[20px] w-full text-center">
                    @if ($errors->any())
                        <div>{{ $errors->first() }}</div>
                    @endif
                </div>
               

                <div>
                    <label class="text-[15px] mb-3 block">Full Name</label>
                    <div class="relative flex items-center">
                        <input name="name" type="text" 
                            class="w-full text-sm bg-gray-100 px-4 py-4 rounded-md outline-blue-600"
                            placeholder="Username" />

                    </div>
                </div>
                <div>
                    <label class="text-[15px] mb-3 block">Email</label>
                    <div class="relative flex items-center">
                        <input name="email" type="email" 
                            class="w-full text-sm bg-gray-100 px-4 py-4 rounded-md outline-blue-600"
                            placeholder="example@gmail.com" />

                    </div>
                </div>
                <div class="mt-6">
                    <label class="text-[15px] mb-3 block">Password</label>
                    <div class="relative flex items-center">
                        <input name="password" type="password" 
                            class="w-full text-sm bg-gray-100 px-4 py-4 rounded-md outline-blue-600"
                            placeholder="Enter password" />
                    </div>
                </div>
                <div class="mt-10">
                    <button type="submit"
                        class="w-full shadow-xl py-3 px-4 text-sm font-semibold rounded text-white bg-[#0017e3] hover:bg-[#E98765] focus:outline-none">
                        Register
                    </button>
                </div>
                <p class="text-sm mt-10 text-center">Don't have an account <a href="{{ route('register') }}"
                        class="text-[#0017e3] font-semibold hover:underline ml-1">Register here</a></p>
            </form>
            <div
                class="md:h-[85%] md:py-6  flex items-center relative max-md:before:hidden before:absolute before:bg-gradient-to-r before:from-gray-50 before:via-[#0017e3] before:to-[#0017e3] before:h-full before:w-3/4 before:right-0 before:z-0">
                <img src="https://www.44foods.com/cdn/shop/files/Site_cover_xmas_23_mobile_1000_x_1400_px.png"
                    class="rounded-md lg:w-4/5 md:w-11/12 h-[80%] z-50 relative" alt="Dining Experience" />
            </div>
        </div>
    </div>

</body>

</html>