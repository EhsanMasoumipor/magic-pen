@extends('layouts.main')
@section('content')
<form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="p-2 mt-12 ml-48 mb-9 border rounded-md border-purple-800  shadow-md shadow-gray-700 bg-gradient-to-br from-purple-700 to-gray-700  w-9/12  justify-between">
        <div class="ml-7 p-5">
            <img src="/img/users_profile/{{ Auth::user()->image }}" class="mt-14 float-right border rounded-2xl w-1/2 h-1/2 object-cover font-light" alt="User profile">
            <div class="float-right ml-9 mt-6 relative">
                <label for="image" class="absolute left-60 mt-9  hover:bg-purple-700 text-black hover:rounded-lg hover:border-purple-950 font-bold px-2 py-1 rounded-md cursor-pointer">
                    Change
                    <input type="file" id="image" name="image" class="hidden">
                </label>
            </div>
        </div>
        <div class="ml-5 p-5">
            <label class="block mb-2 text-white font-semibold">name:</label>
            <input name="name" class="ml-8 p-2 bg-gray-700 focus:bg-gray-400 focus:text-black border-2  rounded-md border-purple-900 text-white font-bold  shadow-sm shadow-purple-800 h-10" type="text" value="{{ Auth::user()->name }}">
        </div>
        <div class="ml-5 p-5">
            <label class="block mb-2 text-white font-semibold">bio:</label>
            <textarea class="border-2 focus:bg-gray-400 focus:text-black border-purple-900 rounded-3xl text-white p-2 font-bold bg-gray-700 shadow-md shadow-purple-800" name="bio" id="bio" cols="30" rows="8">
            @if (empty(Auth::user()->bio))
                Hi i'm {{ Auth::user()->name }}
            @else
                {{ Auth::user()->bio }}
            @endif
            </textarea>
        </div>
        <button class="bg-purple-700 hover:bg-purple-600 hover:to-purple-300 p-2 border w-40  rounded-md border-purple-950 ml-72 mt-3 mb-3" type="submit">update</button>
    </div>
</form>
@endsection