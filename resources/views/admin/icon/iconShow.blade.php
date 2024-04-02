@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Viewing Icon') }}
</h2>
@endsection

@section('content')
<h2 class="text-4xl font-extrabold dark:text-white">{{ $icon->name }}</h2>

<svg width="80" height="80" fill="{{ $icon->default_color}}" class="text-red-400">
    <image width="80" height="80"  href="{{asset('storage/images/' . $icon->svg)}}" alt="{{ $icon->svg }}" fill="#00ff00">
    {{-- <circle cx="15" cy="15" r="15" /> --}}
</svg>

<div>
    <a href="{{ route('admin.icon.edit', $icon->id)}}">Edit</a>

    <form method="POST" action="{{ route('admin.icon.destroy', $icon->id)}}">
        @csrf
        @method('DELETE')
        <button icon="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>

    </form>
</div>

@endsection