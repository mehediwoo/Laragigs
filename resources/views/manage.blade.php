@extends('layout.app')
@section('title','Manage Gig')
@section('content')
<main>
    <div class="mx-4">
        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
            <header>
                <h1
                    class="text-3xl text-center font-bold my-6 uppercase"
                >
                    Manage Gigs
                </h1>
            </header>

            <table class="w-full table-auto rounded-sm">
                <tbody>
                    @if (count($ManageGig) > 0)
                        @foreach ($ManageGig as $iteam)
                        <tr class="border-gray-300">
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a href="show.html">
                                    {{ $iteam->title }}
                                </a>
                            </td>
                            <td
                                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                            >
                                <a
                                    href="{{ url('/ViewGig/'.$iteam->id) }}"
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
                                <form action="{{ url('delete/'.$iteam->id) }}" method="post">
                                    @csrf
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
                        @else
                        <p>Gig Not Found</p>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
