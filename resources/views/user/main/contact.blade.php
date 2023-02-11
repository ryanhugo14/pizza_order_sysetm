@extends('user.layouts.master')
@section('title', 'Contact')

@section('content')
    <div class="px-3 md:px-10 py-10 relative">
        <h1 class="text-3xl md:text-5xl font-bold tracking-wide md:tracking-wider leading-tight mb-5">Love to hear from you,
            <br>
            <span class="text-[#FFA500]">Get in touch</span> <img src="{{ asset('user/image/wavingHand.png') }}" alt=""
                class="w-10 h-10 inline-block">
        </h1>
        @if (session('sendSuccess'))
            <div class="flex justify-start lg:justify-end mt-5">
                <div id="alert-2"
                    class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200 w-full md:w-[60%] lg:w-[40%]"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <div class="ml-3  text-sm font-medium text-green-700 dark:text-green-800">{{ session('sendSuccess') }}
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
        <form action="{{ route('user#sendMail') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-1 md:gap-10">
                <div class="mt-10 w-full">
                    <label for="name" class="text-lg font-semibold text-slate-600">Your Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('name') is-invalid @enderror "
                        placeholder="Enter Your Name">
                    @error('name')
                        <small class="text-[#ff0000]">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-10 w-full">
                    <label for="email" class="text-lg font-semibold text-slate-600">Your Email</label>
                    <input type="email" name="email" id="email"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 @error('email') is-invalid @enderror "
                        placeholder="example@gmail.com">
                    @error('email')
                        <small class="text-[#ff0000]">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mt-10 w-full md:col-span-2">
                    <label for="message" class="text-lg font-semibold text-slate-600">Meassage</label>
                    <textarea name="message" id="message" cols="30" rows="10"
                        class="w-full py-3 px-5 mt-3 placeholder:text-md border border-slate-200 rounded-lg focus:ring-0  focus:border-yellow-500 text-slate-600 @error('message') is-invalid @enderror "
                        placeholder="Let tell us know your feedback!"></textarea>
                    @error('message')
                        <small class="text-[#ff0000]">{{ $message }}</small>
                    @enderror
                </div>
                <button class="rounded-xl bg-black/90 text-white text-xl font-semibold text-center px-5 py-3 mt-10"
                    type="submit">Just Send</button>
            </div>

        </form>
    </div>
@endsection
