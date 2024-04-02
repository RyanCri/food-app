@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Create Type') }}
    </h2>
@endsection

@section('content')
    <form action="{{ route('admin.type.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label>
                Type
            </label>
            <input type="text" name="type" id="type" value="{{old('type') ? : $type->type}}"/>
            @if($errors->has('type'))
            <span>{{ $errors->first('type') }}</span>
            @endif
        </div>
        
        
        <button type="submit">Create Type</button>
    </form>
@endsection