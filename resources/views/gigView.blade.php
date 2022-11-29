@extends('layout.app')
@section('title','Edit Gig')
@section('content')
<main>
    <div class="mx-4">
        <div
            class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
        >
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit Gig
                </h2>
                <p class="mb-4">Edit: {{ $getGig->title }}</p>
            </header>

            <form action="{{ url('/update/'.$getGig->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label
                        for="company"
                        class="inline-block text-lg mb-2"
                        >Company Name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="company" value="{{ $getGig->companyName }}" placeholder="Company Name"
                    />
                    @error('company')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2"
                        >Job Title</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="title" value="{{ $getGig->title }}"
                        placeholder="Example: Senior Laravel Developer"
                    />
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="location"
                        class="inline-block text-lg mb-2"
                        >Job Location</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="location" value="{{ $getGig->jobLocation }}"
                        placeholder="Example: Remote, Boston MA, etc"
                    />
                    @error('location')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2"
                        >Contact Email</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="email" value="{{ $getGig->contactEmail }}"
                    />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label
                        for="website"
                        class="inline-block text-lg mb-2"
                    >
                        Website/Application URL
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="website" value="{{ $getGig->webURL }}"
                    />
                    @error('website')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="tags" class="inline-block text-lg mb-2">
                        Tags (Comma Separated)
                    </label>
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="tags" value="{{ $getGig->Tags }}"
                        placeholder="Example: Laravel, Backend, Postgres, etc"
                    />
                    @error('tags')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="logo" class="inline-block text-lg mb-2">
                        Company Logo
                    </label>
                    <input
                        type="file"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="logo"
                    />
                </div>

                <div class="mb-6">
                    <label
                        for="description"
                        class="inline-block text-lg mb-2"
                    >
                        Job Description
                    </label>
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="description"
                        rows="10"
                        placeholder="Include tasks, requirements, salary, etc"
                    >{{ $getGig->JobDesc }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button
                        class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                    >
                        Update Gig
                    </button>

                    <a href="/" class="text-black ml-4"> Back </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection