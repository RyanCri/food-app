@extends('layouts.app')

@section('header')
<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
    {{ __('Viewing Type') }}
</h2>
@endsection

@section('content')
<h2 class="text-4xl font-extrabold dark:text-white">{{ $type->type }}</h2>

<div>
    <a href="{{ route('admin.type.edit', $type->id)}}">Edit</a>

    <form method="POST" action="{{ route('admin.type.destroy', $item->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Delete</button>

    </form>
</div>

@endsection