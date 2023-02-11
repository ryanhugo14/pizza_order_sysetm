@extends('layouts.master')

@section('title', 'Login Page')

@section('content')

    <body class="bg-slate-50">
        <section
            class=" bg-white shadow-2xl w-11/12 lg:w-10/12 mx-auto mt-8 mb-5 lg:mb-0 lg:mt-14 p-10 lg:px-20 lg:py-14 rounded-3xl">
            <div class="flex flex-col lg:flex-row lg:justify-between">
                <!-- left -->
            <div class="flex flex-col justify-center items-center mx-auto lg:w-[50%] mb-16 md:mb-8 lg:mb-0">
                <img src="{{ asset('admin/assets/img/Pizza.png') }}" alt=""
                    class="w-[400px] lg:w-[500px] h-auto">

            </div>
            <!-- right -->
            <div class="lg:flex lg:justify-center lg:w-[50%]">
                <div class="w-full md:px-20">
                    <h1 class="text-6xl font-bold mb-20 text-center cursor-default">Login</h1>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class=" border-b  pb-3 mb-10 ">
                            <label for="">
                                <i class="fa-solid fa-user text-lg mr-3"></i>
                            </label>
                            <input type="email" name="email" placeholder="Email"
                                class="text-lg focus:outline-none rounded-2xl focus:ring-0 border-none bg-none focus:ring-ring-white ring-white">
                        </div>
                        <div class=" border-b mb-8 pb-3 ">
                            <label for="">
                                <i class="fa-solid fa-lock text-lg mr-3"></i>
                            </label>
                            <input type="password" placeholder="Password" name="password"
                                class="text-lg focus:outline-none rounded-2xl focus:ring-0 border-none bg-none focus:ring-ring-white ring-white">
                        </div>
                        <div class="mb-10 flex items-center">
                            <input type="checkbox" name="" id="" class="w-4 h-4 mr-3" checked>
                            <span>Remember me</span>
                        </div>
                        <button
                            class="px-3 py-3 rounded-2xl bg-black text-white font-bold text-lg lg:w-36 w-full mb-10 md:mb-16 lg:mb-32"
                            type='submit'>Login</button>
                    </form>
                </div>
            </div>
            </div>
            <div class="flex flex-col md:flex-row md:justify-around md:items-center md:space-y-0 space-y-5">
                        <a href="{{ route('auth#registerPage') }}">
                            <h3
                                class="text-lg border-b border-spacing-0 border-black cursor-pointer font-bold text-slate-600  inline-block ">
                                Create an account
                            </h3>
                        </a>
                        <div class="md:flex md:items-center">
                            <span
                            class="block md:inline-block text-lg text-slate-600 font-bold mb-2 mr-5  md:mb-0 cursor-default">Or
                            login with</span>
                        <a href="">
                            <button class="w-10 h-10 bg-blue-700 text-white rounded-xl mr-2">
                                <i class="fa-brands fa-facebook-f"></i>
                            </button>
                        </a>
                        <a href="">
                            <button class="w-10 h-10 bg-cyan-500 text-white rounded-xl mr-2">
                                <i class="fa-brands fa-twitter"></i>
                            </button>
                        </a>
                        <a href="">
                            <button class="w-10 h-10 bg-red-500 text-white rounded-xl">
                                <i class="fa-brands fa-google"></i>
                            </button>
                        </a>
                        </div>
                    </div>
        </section>
    </body>
@endsection
