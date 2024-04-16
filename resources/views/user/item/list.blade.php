@extends('layouts.mobile')

@section('header')
    <div class="text-3xl font-bold">Your List</div>
@endsection

@section('content')
    <div class="w-full">
        <a href="{{ route('user.item.create')}}" class="block text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-2 mb-2 w-full">create</a>
    </div>

    <br>

    <div class="overflow-auto hidden md:block">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <tbody>

                @forelse($items as $item)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach($icons as $icon)
                            @if($icon->id == $item->icon_id)
                                <svg width="30" height="30" fill="{{ $icon->default_color}}" class="text-red-400">
                                    <image width="30" height="30"  href="{{asset('storage/images/' . $icon->svg)}}" alt="{{ $icon->svg }}" fill="#00ff00">
                                    {{-- <circle cx="15" cy="15" r="15" /> --}}
                                </svg>
                                @continue
                            @endif
                        @endforeach
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->name }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->expiry_date }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @foreach($types as $type)
                                @if($type->id == $item->type_id)
                                    {{$type->type}}
                                    @continue
                                @endif
                            @endforeach
                    </th>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('user.item.show', $item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td>
                </tr>

                @empty
                    <h4>No Items found</h4>
                @endforelse
            </tbody>
        </table>
    </div>    
    


    <div class="grid grid-cols-1 gap-4 md:hidden">
        @forelse($items as $item)

        <div class="bg-white space-y-3 p-4 rounded-lg shadow">

            <div class="flex items-center space-x-2 text-sm">
                <div>
                    @foreach($icons as $icon)
                        @if($icon->id == $item->icon_id)
                            <svg width="30" height="30" fill="{{ $icon->default_color}}" class="text-red-400">
                                <image width="30" height="30"  href="{{asset('storage/images/' . $icon->svg)}}" alt="{{ $icon->svg }}" fill="#00ff00">
                                {{-- <circle cx="15" cy="15" r="15" /> --}}
                            </svg>
                            @continue
                        @endif
                    @endforeach
                </div>
                <div class="font-bold">
                    @foreach($types as $type)
                        @if($type->id == $item->type_id)
                            {{$type->type}}
                            @continue
                        @endif
                    @endforeach    
                </div>
                <div>{{ date('j F, Y', strtotime($item->expiry_date)) }}</div>
            </div>
            <div class="font-bold text-xl">{{ $item->name }}</div>
            <div>
                <a href="{{ route('user.item.show', $item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
            </div>

            
        </div>

        @empty
            <h4>No Items found</h4>
        @endforelse
    </div>

    

    @if(session('status'))
        <div class="flash" id="alert" style="background-color:red">
            {{ session('status') }}
        </div>
    @endif

    <script>
       let alert = document.getElementById('alert')
       setTimeout(() => {
        alert.remove();
       }, 5000);
    </script>
@endsection