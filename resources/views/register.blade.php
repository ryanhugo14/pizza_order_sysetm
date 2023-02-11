@extends('layouts.master')

@section('title', 'Register Page')

@section('content')

    <body class="bg-slate-100  py-5 relative ">
        <a href="{{ route('auth#loginPage') }}">
            <i class="fa-solid fa-left-long text-2xl px-3 md:px-10 lg:px-20 mb-5 cursor-pointer"></i>
        </a>
        <div class="flex items-center ">
            <section class="bg-slate-50 shadow-2xl w-11/12 lg:w-10/12 mx-auto  mb-5 lg:mb-0  rounded-2xl overflow-hidden">
                <div class="flex justify-between relative">
                    <div style="width: 25%;"
                        class="hidden  h-20 md:h-28 md:flex items-center justify-center px-10 border-yellow-400 border-b-2">
                        <img src="{{ asset('admin/assets/img/Pizza.png') }}"
                            alt="" class="w-14 md:w-32">
                    </div>
                    <div style=""
                        class="w-full md:w-[75%] cursor-default bg-yellow-400 flex items-center justify-center md:absolute right-0 h-20 md:h-28 relative overflow-hidden">
                        <?xml version="1.0" standalone="no"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto"><path fill="#F7B32B" fill-opacity="1" d="M0,0L21.8,32C43.6,64,87,128,131,128C174.5,128,218,64,262,48C305.5,32,349,64,393,117.3C436.4,171,480,245,524,240C567.3,235,611,149,655,106.7C698.2,64,742,64,785,96C829.1,128,873,192,916,197.3C960,203,1004,149,1047,138.7C1090.9,128,1135,160,1178,192C1221.8,224,1265,256,1309,245.3C1352.7,235,1396,181,1418,154.7L1440,128L1440,320L1418.2,320C1396.4,320,1353,320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>
                        <h1 class="text-3xl md:text-5xl text-white font-semibold text-center ml-3 md:ml-10 absolute">Create An
                            Account</h1>
                    </div>
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    @error('terms')
                        <small class="text-red-600">{{ $message }}</small>
                    @enderror
                    <div class="py-10 px-3 md:px-10 lg:px-20 lg:py-14 mt-5 md:mt-10">
                        <div class=" grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-14">
                            <div class="h-20">
                                <div class="flex">
                                    <div class=" justify-center w-14 md:w-20 p-3 flex items-center">
                                        <i class="fa-solid fa-user-tie text-black text-3xl lg:text-6xl"></i>
                                    </div>
                                    <div class="py-3 px-5 flex items-center bg-white w-full">
                                        <input type="text" placeholder="Username" name="name"
                                            class="focus:outline-none ring-white border-none focus:ring-0 w-full text-lg md:text-xl tracking-wider">
                                    </div>
                                </div>
                                @error('name')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="h-20">
                                <div class="flex">
                                    <div class=" justify-center w-14 md:w-20 flex items-center p-3">
                                        <i class="fa-regular fa-envelope text-3xl lg:text-6xl text-black"></i>
                                    </div>
                                    <div class="py-3 px-5 flex items-center bg-white w-full">
                                        <input type="email" placeholder="Email Address" name="email"
                                            class="focus:outline-none ring-white border-none focus:ring-0 w-full text-lg md:text-xl tracking-wider">
                                    </div>
                                </div>
                                @error('email')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="h-20">
                                <div class="flex">
                                    <div class=" justify-center w-14 md:w-20 flex items-center p-3">
                                        <i class="fa-solid fa-location-dot text-3xl lg:text-6xl text-black"></i>
                                    </div>
                                    <div class="py-3 px-5 flex items-center bg-white w-full">
                                        <input type="text" placeholder="Address" name="address"
                                            class="focus:outline-none ring-white border-none focus:ring-0 w-full text-lg md:text-xl tracking-wider">
                                    </div>
                                </div>
                                @error('address')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="h-20">
                                <div class="flex">
                                    <div class=" justify-center w-14 md:w-20 flex items-center p-3">
                                        <i class="fa-solid fa-phone text-3xl lg:text-6xl text-black"></i>
                                    </div>
                                    <div class="py-3 px-5 flex items-center bg-white w-full">
                                        <input type="text" placeholder="Phone Number" name="phone"
                                            class="focus:outline-none ring-white border-none focus:ring-0 w-full text-lg md:text-xl tracking-wider">
                                    </div>
                                </div>
                                @error('phone')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="h-20">
                                <div class="flex">
                                    <div class=" justify-center w-14 md:w-20 flex items-center p-3">
                                        <i class="fa-solid fa-key text-3xl lg:text-6xl text-black"></i>
                                    </div>
                                    <div class="py-3 px-5 flex items-center bg-white w-full">
                                        <input type="password" placeholder="Password" name="password"
                                            class="focus:outline-none ring-white border-none focus:ring-0 w-full text-lg md:text-xl tracking-wider">
                                    </div>
                                </div>
                                @error('password')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="h-20">
                                <div class="flex">
                                    <div class=" justify-center w-14 md:w-20 flex items-center p-3">
                                        <i class="fa-solid fa-key text-3xl lg:text-6xl text-black"></i>
                                    </div>
                                    <div class="py-3 px-5 flex items-center bg-white w-full">
                                        <input type="password" placeholder="ReEnter Password" name="password_confirmation"
                                            class="focus:outline-none ring-white border-none focus:ring-0 w-full text-lg md:text-xl tracking-wider">
                                    </div>
                                </div>
                                @error('password_confirmation')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-10 md:mt-20 flex justify-end">
                            <button
                                class="w-46 px-8 py-3 md:py-5 hover:bg-yellow-600 bg-[#F7B32B] text-white text-lg md:text-xl font-semibold rounded-2xl"
                                type="submit">
                                Sign-up now
                            </button>
                        </div>
                    </div>
                </form>
            </section>
    </body>
@endsection
