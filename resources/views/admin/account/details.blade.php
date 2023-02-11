@extends('admin.layouts.master')

@section('title', 'Details')

@section('content')
    <div class="mt-8 flex justify-center relative p-3 md:p-10 lg:px-32 ">
        <div class="w-full">
            @if (session('updateSuccess'))
                <div class="flex justify-start lg:justify-end">
                    <div id="alert-2"
                        class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200 w-full md:w-[60%] lg:w-[40%]"
                        role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3  text-sm font-medium text-green-700 dark:text-green-800">
                            {{ session('updateSuccess') }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            @if (session('uploadSuccess'))
                <div class="flex justify-start lg:justify-end">
                    <div id="alert-2"
                        class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200 w-full md:w-[60%] lg:w-[40%]"
                        role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3  text-sm font-medium text-green-700 dark:text-green-800">
                            {{ session('uploadSuccess') }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300"
                            data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            @endif
            <div class="w-full bg-white p-10 pt-16 pb-10 rounded-lg">
                <div class="flex justify-center">
                    <h1 class="text-center text-5xl font-bold border-b-4 pb-2 border-yellow-500 inline-block ">Your Details
                    </h1>
                </div>
                <div
                    class="mt-20 flex flex-col lg:flex-row items-center justify-center space-y-14 lg:space-y-0 lg:space-x-32">
                    <div class="flex  flex-col space-y-20 items-center justify-center">
                        @if (Auth::user()->image == null)
                            @if (Auth::user()->gender == 'male')
                                <img src="{{ asset('image/default_male.jpg') }}" alt=""
                                    class="bg-contain w-48  h-48   rounded-full ">
                            @else
                                <img src="{{ asset('image/default_female.jpg') }}" alt=""
                                    class="bg-contain w-48  h-48   rounded-full ">
                            @endif
                        @else
                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt=""
                                class="bg-contain w-48  h-48   rounded-full ">
                        @endif
                        <a href="{{ route('admin#edit') }}" class="hidden lg:inline-block">
                            <button class="w-44  px-3 py-2 bg-yellow-500 font-semibold text-white rounded-lg">Edit
                                Details</button>
                        </a>
                    </div>
                    <div class="space-y-5">
                        <div class="font-bold space-x-3">
                            <i class="fa-solid fa-user text-3xl"></i>
                            <span class="text-xl capitalize">{{ $profile->name }}</span>
                        </div>
                        <div class="font-bold space-x-4">
                            <i class="fa-solid fa-envelope text-3xl"></i>
                            <span class="text-xl ">{{ $profile->email }}</span>
                        </div>
                        <div class="font-bold space-x-4">
                            <i class="fa-solid fa-phone text-3xl"></i>
                            <span class="text-xl ">{{ $profile->phone }}</span>
                        </div>
                        <div class="font-bold space-x-4">
                            <i class="fa-solid fa-location-dot text-3xl"></i>
                            <span class="text-xl ">{{ $profile->address }}</span>
                        </div>
                        <div class="font-bold space-x-4">
                            <i class="fa-solid fa-venus-mars text-3xl"></i>
                            <span class="text-xl capitalize">
                                @if ($profile->gender == null)
                                    ?
                                @else
                                    {{ $profile->gender }}
                                @endif
                            </span>
                        </div>
                        <div class="font-bold space-x-4">
                            <i class="fa-solid fa-pen-to-square text-3xl"></i>
                            <span class="text-xl ">{{ $profile->role }}</span>
                        </div>
                        <div class="font-bold space-x-4">
                            <i class="fa-solid fa-paperclip text-3xl"></i>
                            <span class="text-xl ">{{ $profile->created_at->format('j F Y') }}</span>
                        </div>
                    </div>
                    <div class="lg:hidden mt-16 w-full">
                        <a href="{{ route('admin#edit') }}">
                            <button class="w-full  px-3 py-2 bg-yellow-500 font-semibold text-white rounded-lg">Edit
                                Details</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
