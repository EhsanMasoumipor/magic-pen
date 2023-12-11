@extends('layouts.main')
@section('content')
<div class="flex justify-center mt-36 rounded-md">
    <div class="bg-slate-800 rounded-md p-6 shadow-md shadow-slate-600">
        <h3 class="text-2xl text-purple-700 font-semibold text-center mb-6">Register</h3>
        <form action="{{ route('auth.register') }}" method="post">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-bold text-white mb-2">name</label>
                <input type="text" id="name" name="name" class="w-full px-3 py-1 border rounded-md text-balck bg-gray-200 focus:outline-none focus:border-2 focus:border-purple-700" placeholder="Example name" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-white mb-2">E-mail</label>
                <input type="email" id="email" name="email" class="w-full px-3 py-1 border rounded-md text-balck bg-gray-200 focus:outline-none focus:border-2 focus:border-purple-700" placeholder="example@gmail.com" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-bold text-white mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-1 border rounded-md text-balck bg-gray-200 focus:outline-none focus:border-2 focus:border-purple-700" required>
            </div>
            <button type="submit" class="w-full mt-3 bg-purple-500 text-white py-2 rounded-md hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                register
            </button>
        </form>
        <div class="mt-4 ml-12 text-purple-600 font-bold">
            <a href="{{ route('auth.login.form') }}" class="hover:text-purple-400 hover:font-bold">
                do you have an account?
            </a>
        </div>
    </div>

</div>
@endsection