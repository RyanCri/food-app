@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Viewing Item') }}
</h2>
@endsection

@section('content')
<h2 class="text-4xl font-extrabold dark:text-white">{{ $item->name }}</h2>

@foreach($icons as $icon)
    @if($icon->id == $item->icon_id)
        <svg width="100" height="100" fill="{{ $icon->default_color}}" class="text-red-400">
            <image width="100" height="100"  href="{{asset('storage/images/' . $icon->svg)}}" alt="{{ $icon->svg }}" fill="#00ff00">
            {{-- <circle cx="15" cy="15" r="15" /> --}}
        </svg>
        @continue
    @endif
@endforeach

<h3 class="text-4xl font-extrabold dark:text-white"> Expires {{ date('j F, Y', strtotime($item->expiry_date)) }}</h3>


<div>
    <br>
    <a href="{{ route('user.item.edit', $item->id)}}" class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Edit</a>

    <br><br>

    <form method="POST" action="{{ route('user.item.destroy', $item->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>

    </form>
</div>

@endsection