<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
<nav class="bg-white shadow dark:bg-gray-800">
    <div class="container flex items-center justify-center p-6 mx-auto text-gray-600 capitalize dark:text-gray-300">
        <a href="{{url('show_recipe')}}" Show product class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-blue-500 mx-1.5 sm:mx-6">home</a>

        <a href="#" class="border-b-2 border-transparent hover:text-gray-800 dark:hover:text-gray-200 hover:border-blue-500 mx-1.5 sm:mx-6">Creat recipe</a>




        <form action="/search" method="get"
              class="bg-white text-black mt-6 flex px-1 py-1 rounded-full border border-[#B03000] overflow-hidden max-w-md mx-auto font-[sans-serif]">
            <input type='search' name ="search" placeholder='Search Something...'
                   class="w-full outline-none bg-white pl-4 text-sm" />
            <button type='submit'
                    class="bg-[#B03000] hover:bg-[#B04000] transition-all text-white text-sm rounded-full px-5 py-2.5">Search</button>
        </form>
    </div>
</nav>


    <div class="relative flex flex-col justify-center overflow-hidden bg-gray- py-6 sm:py-12">
        <div class="mx-auto max-w-screen px-4 w-full">
            <h2 class="mb-4 font-bold text-xl text-gray-600">Look for the recipe you love</h2>
            <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">
                @foreach($data as $data)
                <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                    <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </a>
                    <a href="" class="z-20 absolute h-full w-full top-0 left-0 ">&nbsp;</a>
                    <div class="h-auto overflow-hidden">
                        <div class="h-44 overflow-hidden relative">
                            <img src="recipe/{{$data->image}}" alt="">
                        </div>
                    </div>
                    <div class="bg-white py-4 px-3">
                        <h3 class="text-xs mb-2 font-medium">{{$data->name}}</h3>
                        <div class="flex justify-between items-center">
                            <p class="text-xs text-gray-400">
                                {{$data->description}}
                            </p>
                            <div class="relative z-40 flex items-center gap-2">
                                <a onclick="return confirm('are you sure you want to delete this recipe');" href="{{url('delete_recipe',$data->id)}}" class="text-orange-600 hover:text-blue-500" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                </a>
                                <a onclick="return " href="{{url('update_recipe',$data->id)}}" class="text-orange-600 hover:text-blue-500" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>






</body>
</html>
