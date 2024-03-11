@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Item') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('user.item.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>
                Name
            </label>
            <input type="text" name="name" id="name" value="{{old('name')}}"/>
            @if($errors->has('name'))
            <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div>
            <label>
                Expiry Date
            </label>
            <input type="date" name="expiry_date" id="expiry_date" value="{{old('expiry_date')}}"/>
            @if($errors->has('expiry_date'))
            <span>{{ $errors->first('expiry_date') }}</span>
            @endif
        </div>
        <div>
            <label>
                Icon Colour
            </label>
            <input type="color" name="icon_color" id="icon_color" value="{{old('icon_color')}}"/>
            @if($errors->has('icon_color'))
            <span>{{ $errors->first('icon_color') }}</span>
            @endif
        </div>
        <div>
            <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id}}"/>
        </div>
        
        <button type="submit">Create Item</button>
    </form>
@endsection