@extends('layouts.app')

@section('header')
    <h2>icons</h2>
@endsection

@section('content')
    <a href="{{ route('admin.icon.create')}}">create</a>

    <br>
    <br>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Icon ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Icon
                    </th>
                    <th scope="col" class="px-6 py-3">
                        SVG
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>

                @forelse($icons as $icon)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $icon->id }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $icon->name }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap dark:text-white">
                        <svg width="30" height="30" fill="{{ $icon->default_color}}" class="text-red-400">
                            <image width="30" height="30"  href="{{asset('storage/images/' . $icon->svg)}}" alt="{{ $icon->svg }}" fill="#00ff00">
                            {{-- <circle cx="15" cy="15" r="15" /> --}}
                        </svg>
                    </th>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.icon.show', $icon->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td>
                </tr>

                @empty
                    <h4>No Icons found</h4>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $icons->links() }}
    
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