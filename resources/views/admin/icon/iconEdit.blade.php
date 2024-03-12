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
            <input type="text" name="name" id="name" value="{{old('icon') ? : {$icon->name}}}"/>
            @if($errors->has('name'))
            <span>{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div>
            <label>
                Icon Name
            </label>
            <input type="text" name="svg" id="svg" value="{{old('icon') ? : {$icon->svg}}}"/>
            @if($errors->has('svg'))
            <span>{{ $errors->first('svg') }}</span>
            @endif
        </div>
        
        
        <button type="submit">Create Icon</button>
    </form>
@endsection