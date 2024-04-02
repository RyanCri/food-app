@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Icon') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('admin.icon.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>
                Icon Name
            </label>
            <input type="text" name="name" id="name" value="{{old('icon') ? : $icon->name}}"/>
            @if($errors->has('name'))
            <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div>
            <label>
                SVG
            </label>
            <input type="file" name="svg" id="svg" value="{{old('svg')}}"/>
            @if($errors->has('svg'))
            <span>{{ $errors->first('svg') }}</span>
            @endif
        </div>
        <div>
            <label>
                Default Colour
            </label>
            <input type="color" name="default_color" id="default_color" value="{{old('default_color')}}"/>
            @if($errors->has('default_color'))
            <span>{{ $errors->first('default_color') }}</span>
            @endif
        </div>
        
        
        <button type="submit">Create Icon</button>
    </form>
@endsection