@extends('layouts.mobile')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Edit Item') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('user.item.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Name</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name') ? : $item->name}}"/>
            @if($errors->has('name'))
            <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expiry Date</label>

            {{-- <input type="date" name="expiry_date" id="expiry_date" value="{{old('expiry_date')}}"/> --}}
            <input type="date" name="expiry_date" id="expiry_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name"  value="{{old('expiry_date') ? : $item->expiry_date}}"/>
            @if($errors->has('expiry_date'))
            <span>{{ $errors->first('expiry_date') }}</span>
            @endif
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon Colour</label>

            {{-- <input type="color" name="icon_color" id="icon_color" value="{{old('icon_color')}}"/> --}}

            <input type="color" name="icon_color" id="icon_color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full my-2 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" value="{{old('icon_color') ? : $item->icon_colour}}"/>
            @if($errors->has('icon_color'))
            <span>{{ $errors->first('icon_color') }}</span>
            @endif
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>

            {{-- <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
            </select> --}}
            
            <select name="type_id" id="type_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
            </select>
            @if($errors->has('type'))
            <span>{{ $errors->first('type') }}</span>
            @endif
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon</label>

            {{-- <select name="icon_id" id="icon_id">
                @foreach ($icons as $icon)
                    <option value="{{$icon->id}}">{{$icon->name}}</option>
                @endforeach
            </select> --}}
            <select name="icon_id" id="icon_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($icons as $icon)
                    <option value="{{$icon->id}}">{{$icon->name}}</option>
                @endforeach
            </select>
            @if($errors->has('type'))
            <span>{{ $errors->first('type') }}</span>
            @endif
        </div>
        <div>
            <input type="hidden" name="user_id" id="user_id" value="{{ $item->user_id}}"/>
        </div>

        <br>
        
        <button type="submit" class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">Edit Item</button>
    </form>
@endsection