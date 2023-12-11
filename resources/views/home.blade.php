@extends('layouts.main')
@section('content')
@include('layouts.header')
<div class="container mx-auto mt-7 grid">
    <div class="flex justify-center space-x-4">
        <a href="#" class="bg-gray-300 text-lg font-semibold inline-block rounded-md  hover:rounded-white">#ai</a>
        <a href="#" class="bg-gray-300 text-lg font-semibold inline-block rounded-md  hover:rounded-white">#web</a>
        <a href="#" class="bg-gray-300 text-lg font-semibold inline-block rounded-md  hover:rounded-white">#progrmming</a>
        <a href="#" class="bg-gray-300 text-lg font-semibold inline-block rounded-md  hover:rounded-white">#api</a>
        <a href="#" class="bg-gray-300 text-lg font-semibold inline-block rounded-md  hover:rounded-white">#graphql</a>
    </div>
    <x-blog-card />
</div>
@endsection