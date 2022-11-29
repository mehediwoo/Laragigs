@extends('layout.app')
@section('title','Search Gigs')
@section('content')


<main>
    <!-- Search -->
    <form action="{{ url('/search') }}" method="get">
        <div class="relative border-2 border-gray-100 m-4 rounded-lg">
            <div class="absolute top-4 left-3">
                <i
                    class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                ></i>
            </div>
            <input
                type="text"
                name="search"
                class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                placeholder="Search Laravel Gigs..."
            />
            <div class="absolute top-2 right-2">
                <button
                    type="submit"
                    class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                >
                    Search
                </button>
            </div>
        </div>
    </form>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        <!-- Item 1 -->
        @foreach ($Getsearch as $iteam)
        <div class="bg-gray-50 border border-gray-200 rounded p-6">
            <div class="flex">
                <img
                    class="hidden w-48 mr-6 md:block"
                    src="{{ asset('storage/logo/'.$iteam->logo) }}"
                    alt=""
                />
                <div>
                    <h3 class="text-2xl">
                        <a href="{{ url('/viewGigs/'.$iteam->id) }}">{{ $iteam->title }}</a>
                    </h3>
                    <div class="text-xl font-bold mb-4">{{ $iteam->companyName }}</div>
                    <ul class="flex">
                        @foreach(explode(',', $iteam->Tags) as $tags)
                            <li
                            class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                        >
                            <a href="/search?{{ 'search='.$tags }}">{{ $tags }}</a>
                        </li>
                        @endforeach

                    </ul>
                    <div class="text-lg mt-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $iteam->jobLocation }}
                    </div>
                </div>
            </div>
        </div>

        @endforeach

        {{-- <p style="left: 0;">{{ $Getsearch->links() }}</p> --}}
    </div>
</main>

@endsection
