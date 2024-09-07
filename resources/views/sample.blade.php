<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
    <header class="bg-white">
        <nav class="flex justify-between items-center w-[92%] mx-auto">
            <div>
                <img class="w-16 h-16" src="https://static.vecteezy.com/system/resources/thumbnails/000/578/617/small/logoyy48-01.jpg" alt="..">
            </div>
            <div class="nav-links md:static absolute bg-white md:min-h-fit min-h-[20vh] left-0 top-[9%] w-full flex items-center px-5 p">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-6">
                    <li>
                        <a class="hover:text-gray-500" href="">Home</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="">About</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="">Contact</a>
                    </li>
    
                </ul>
            </div>
            <div class="flex items-center gap-6">
                <button class="bg-blue-600 text-white px-5 p-2 rounded-full hover:bg-blue-300">Sign in</button>
                <span class="text-3xl cursor-pointer md:hidden" onclick="onToggleMenu(this)">
    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </span>

            </div>
        </nav>
    </header>
            @inertia
    <script>
        const navLinks = document.querySelector('.nav-links')
        function onToggleMenu(e){
            e.name= 'close';
            // e.name = e.name === 'menu' ? 'close' : 
            // navLinks.classList.toggle('top-[9%]')
            // console.log('test');
        }
    </script>
    </body>
</html>
