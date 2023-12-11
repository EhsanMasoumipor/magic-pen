<div class="container mx-auto mt-3 flex justify-between h-20 p-5">
    <nav class="flex ml-10  space-x-8">
        <a href="#" class="text-white font-semibold  hover:text-purple-700">Home</a>
        <a href="#" class="text-white font-semibold  hover:text-purple-700">About</a>
        <a href="#" class="text-white font-semibold  hover:text-purple-700">Contact</a>
    </nav>
    <input class="border-2 border-gray-700 bg-gray-800 h-10 px-5 pr-16 rounded-lg text-sm font-bold text-white focus:outline-none focus:shadow-sm focus:shadow-gray-700" type="search" name="search" placeholder="Search...">
    <div class="items-end mr-5 ">
        @guest()
        <a href="{{ route('auth.login.form') }}" class="text-white font-semibold  hover:text-purple-700">Login</a>
        @endguest
        @auth
        <a href="{{ route('auth.logout') }}" class="font-bold text-red-700 mr-2 ml-3  hover:shadow-red-800">Logout</a>
        <a href="{{ route('profile.show') }}" class="font-bold text-white mr-2 ml-3  hover:shadow-red-800">Dashboard</a>
        @endauth
    </div>
</div>