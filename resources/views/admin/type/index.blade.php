@extends('layouts.app')

@section('header')
    <h2>types</h2>
@endsection

@section('content')
    <a href="{{ route('admin.type.create')}}">create</a>

    <br>
    <br>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Type ID
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

                @forelse($types as $type)

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $type->id }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $type->type }}
                    </th>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('admin.type.show', $type->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                    </td>
                </tr>

                @empty
                    <h4>No Types found</h4>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $types->links() }}
    
    

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