@extends('user.layouts.master')

@section('title', 'Change Password')

@section('content')
    <div class="flex items-center justify-center relative px-3 md:px-5 lg:px-0">
        <a href="{{ route('user#homePage') }}" class="absolute left-2 md:left-6 lg:left-60 top-10 flex items-center">
            <i class="fa-solid fa-left-long text-xl mr-2"></i>
            <span class="font-semibold">Back</span>
        </a>
        <div class="bg-white shadow-lg rounded-2xl py-16 px-10 mt-20 w-full lg:w-[600px] relative">
            @if (session('passwordNOtMatch'))
                <div class="flex justify-start lg:justify-end">
                    <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200 w-full" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3  text-sm font-medium text-red-700 dark:text-red-800">
                            {{ session('passwordNOtMatch') }}
                        </div>
                        <button type="button"
                            class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300"
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
            @if (session('passwordMatch'))
                <div class="flex justify-start lg:justify-end">
                    <div id="alert-2" class="flex  p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200 w-full"
                        role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3  text-sm font-medium text-green-700 dark:text-green-800">
                            {{ session('passwordMatch') }}
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

            <h1 class="text-3xl  font-semibold border-b pb-5 text-center cursor-default">Change Your Password</h1>
            <form action="" method="get">
                @csrf
                <div class="mt-10">
                    <label for="oldPassword" class="text-lg font-semibold text-slate-600">Old Password</label>
                    <input type="password" name="oldPassword" id="oldPassword"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('oldPassword') is-invalid @enderror"
                        placeholder="Enter Old Password">
                </div>
                @error('oldPassword')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <div class="mt-5">
                    <label for="newPassword" class="text-lg font-semibold text-slate-600">New Password</label>
                    <input type="password" name="newPassword" id="newPassword"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('newPassword') is-invalid @enderror"
                        placeholder="Enter New Password">
                </div>
                @error('newPassword')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <div class="mt-5">
                    <label for="confirmPassword" class="text-lg font-semibold text-slate-600">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('confirmPassword') is-invalid @enderror"
                        placeholder="Enter Confirm Password">
                </div>
                @error('confirmPassword')
                    <span class="text-[#ff0000] text-sm">{{ $message }}</span>
                @enderror
                <button class="w-full rounded-xl bg-black/90 text-white text-xl font-semibold text-center px-5 py-3 mt-10"
                    type="submit">Change</button>
            </form>
        </div>
    </div>
@endsection
