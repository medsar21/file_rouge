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



    </div>
</nav>


<div class="relative flex flex-col justify-center overflow-hidden bg-gray- py-6 sm:py-12">
    <div class="mx-auto max-w-screen px-4 w-full">
        <h2 class="mb-4 font-bold text-xl text-gray-600">Is this what you were looking for :</h2>
        <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach($recipes as $recipes)
                <div class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                    <a href="" class="hover:text-orange-600 absolute z-30 top-2 right-0 mt-2 mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                        </svg>
                    </a>
                    <a href="" class="z-20 absolute h-full w-full top-0 left-0 ">&nbsp;</a>
                    <div class="h-auto overflow-hidden">
                        <div class="h-44 overflow-hidden relative">
                            <img src="recipe/{{$recipes->image}}" alt="">
                        </div>
                    </div>
                    <div class="bg-white py-4 px-3">
                        <h3 class="text-xs mb-2 font-medium">{{$recipes->name}}</h3>
                        <div class="flex justify-between items-center">
                            <p class="text-xs text-gray-400">
                                {{$recipes->description}}
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>



</body>
</html>
