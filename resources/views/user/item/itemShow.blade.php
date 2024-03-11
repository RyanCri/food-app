@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Viewing Item') }}
</h2>
@endsection

@section('content')
<h2 class="text-4xl font-extrabold dark:text-white">{{ $item->name }}</h2>

<svg width="100" height="100">
    <circle cx="50" cy="50" r="40" stroke="green" stroke-width="4" fill="{{ $item->icon_color }}" />
</svg>

<h3 class="text-4xl font-extrabold dark:text-white">{{ $item->expiry_date }}</h3>

<div>
    <a href="{{ route('user.item.edit', $item->id)}}">Edit</a>

    <form method="POST" action="{{ route('user.item.destroy', $item->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>

    </form>
</div>

@endsection