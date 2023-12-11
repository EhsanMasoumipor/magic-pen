@extends('layouts.main')
@section('content')
@include('layouts.header')
<div class="container mx-auto p-8">
    <div class="mx-auto w-5/6 bg-gradient-to-br from-gray-800 to-gray-700 rounded-md overflow-hidden  mt-12">
        <img src="/img/R.jpeg" alt="User Avatar" class="float-right rounded-md w-96  h-96 object-cover">
        <h2 class="font-semibold text-sm ml-4 mt-4">
            name: <span class="text-purple-700 font-bold text-lg">{{ Auth::user()->name }}</span>
        </h2>
        <h2 class="font-semibold text-sm ml-4 mt-4">
            email: <span class="text-purple-700 font-bold text-lg">{{ Auth::user()->email }}</span>
        </h2>
        <button class="bg-gradient-to-r from-purple-900 to-purple-600 hover:bg-gradient-to-r hover:from-purple-600 hover:to-purple-300 p-2 border w-40 hover:bg-purple-600 rounded-md border-purple-950 ml-5 mt-5">
            <a href="#" class="text-black ">Update</a>
        </button>
    </div>
</div>
@endsection