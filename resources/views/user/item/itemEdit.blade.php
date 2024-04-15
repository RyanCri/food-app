@extends('layouts.app')

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
            <label>
                Name
            </label>
            <input type="text" name="name" id="name" value="{{old('name') ? : $item->name}}"/>
            @if($errors->has('name'))
            <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div>
            <label>
                Expiry Date
            </label>
            <input type="date" name="expiry_date" id="expiry_date" value="{{old('expiry_date') ? : $item->expiry_date}}"/>
            @if($errors->has('expiry_date'))
            <span>{{ $errors->first('expiry_date') }}</span>
            @endif
        </div>
        <div>
            <label>
                Icon Colour
            </label>
            <input type="color" name="icon_color" id="icon_color" value="{{old('icon_color') ? : $item->icon_colour}}"/>
            @if($errors->has('icon_color'))
            <span>{{ $errors->first('icon_color') }}</span>
            @endif
        </div>
        <div>
            <label>
                Type
            </label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{$type->id}}">{{$type->type}}</option>
                @endforeach
            </select>
            @if($errors->has('type'))
            <span>{{ $errors->first('type') }}</span>
            @endif
        </div>
        <div>
            <label>
                Icon
            </label>
            <select name="icon_id" id="icon_id">
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
        
        <button type="submit">Edit Item</button>
    </form>
@endsection