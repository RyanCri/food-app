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
@endsection