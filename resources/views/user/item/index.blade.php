@extends('layouts.app')

@section('header')
    <h2>items</h2>
@endsection

{{-- current date variable --}}
{{ $ldate = date('Y-m-d') }} 

@section('content')
    <a href="{{ route('user.item.create')}}">create</a>

    <br>
    <br>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        User ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Expiry Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Icon Colour
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Icon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>

                @forelse($items as $item)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->user_id }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->name }}
                    </th>
                    @if($item->expiry_date > $ldate)
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->expiry_date }}
                    </th>
                    @else
                    <th scope="row" class="px-6 py-4 bg-[ff0000] font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->expiry_date }}
                    </th>
                    @endif
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $item->icon_color }}
                        <svg width="60" height="10" class="whitespace-nowrap dark:text-white">
                            <rect width="60" height="10" x="0" y="0" fill="{{ $item->icon_color }}" />
                        </svg>
                    </th>
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
                        @foreach($types as $type)
                                @if($type->id == $item->type_id)
                                    {{$type->type}}
                                    @continue
                                @endif
                            @endforeach
                    </th>
                    {{-- <td class="px-6 py-4 text-right">
                        <a href="{{ route('user.item.show', $item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td> --}}
                    @if($item->expiry_date > $ldate)
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('user.item.show', $item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td>
                    @else
                    {{-- <td class="px-6 py-4 text-right">
                        <a href="{{ route('user.item.show', $item->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td> --}}
                    <td class="px-6 py-4 text-right">
                        <form method="POST" action="{{ route('user.item.destroy', $item->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete</button>
                        </form>                    
                    </td>
                    @endif
                </tr>

                @empty
                    <h4>No Items found</h4>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $items->links() }}
    
    

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