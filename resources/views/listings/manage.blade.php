@extends('layout')
@section('content')
@include('partials/_hero')
@include('partials/_search')

{{-- <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"> --}}
    <x-card>
@if(count($listings) == 0)
<tr class="border-gray-300">
    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
        <p class="text-center">No Listings Were Found</p>
    </td>
</tr>
<h2>Currently there are no listings</h2>
@else 
<header>
    <h1
        class="text-3xl text-center font-bold my-6 uppercase"
    >
        Manage Gigs
    </h1>
</header>

<table class="w-full table-auto rounded-sm">
    <tbody>
        @foreach($listings as $listing)
        
        <tr class="border-gray-300">
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <a href="listings/show">
                  {{$listing->title}}
                </a>
            </td>
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <a
                    href="{{$listing->id}}/edit"
                    class="text-blue-400 px-6 py-2 rounded-xl"
                    ><i
                        class="fa-solid fa-pen-to-square"
                    ></i>
                    Edit</a
                >
            </td>
            <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
                <form method="POST" action="/listings/{{$listing->id}}">
                    @csrf
                    @method('delete')
                    <button class="text-red-600">
                        <i
                            class="fa-solid fa-trash-can"
                        ></i>
                        Delete
                    </button>
                </form>
            </td>
        </tr>

        @endforeach
    </tbody>
</table>
</div>
</x-card>
{{-- @foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
@endforeach --}}
@endif
{{-- <div class="mt-6 p-4">
    {{$listings->links()}}
</div> --}}
@endsection
