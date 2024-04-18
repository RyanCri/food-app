@extends('layouts.mobile')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Item') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('user.item.store') }}" method="post" enctype="multipart/form-data" class="max-w-sm mx-auto">
        @csrf
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Name</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{old('name')}}" />

            @if($errors->has('name'))
            <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Expiry Date</label>

            {{-- <input type="date" name="expiry_date" id="expiry_date" value="{{old('expiry_date')}}"/> --}}
            <input type="date" name="expiry_date" id="expiry_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" value="{{old('expiry_date')}}" />

            @if($errors->has('expiry_date'))
            <span>{{ $errors->first('expiry_date') }}</span>
            @endif
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Icon Colour</label>

            {{-- <input type="color" name="icon_color" id="icon_color" value="{{old('icon_color')}}"/> --}}

            <input type="color" name="icon_color" id="icon_color" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full my-2 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name" value="{{old('icon_color')}}" />
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
            @if($errors->has('type_id'))
            <span>{{ $errors->first('type_id') }}</span>
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
            @if($errors->has('icon_id'))
            <span>{{ $errors->first('icon_id') }}</span>
            @endif
        </div>
        <div>
            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id}}"/>
        </div>

        <br>
        
        {{-- <button type="submit">Create Item</button> --}}
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Item</button>

    </form>
@endsection