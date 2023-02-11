<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- swiper's css --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
</head>
<style>
    * {
        font-family: 'Noto Sans', sans-serif;
    }

    .pacifico {
        font-family: 'Pacifico', cursive;
    }

    .active {
        color: #FFA500;
        background-color: #222022;
    }

    .is-invalid {
        border-color: #ff0000 !important;
    }

    /* .iconHidden {
        visibility: hidden;
    } */

    .swiper {
        width: 100%;
    }

    .swiper-wrapper {
        width: 100%;
        height: auto;
        display: flex;
        align-items: center;
    }

    .swiper-slid:not(.swiper-slide-active) {
        filter: blur(1px);
    }

    td {
        padding: 9px;
    }

    .showIcon {
        visibility: hidden;
        opacity: 0;
    }

    .mainShowIcon:hover .showIcon {
        opacity: 1;
        visibility: visible;
    }
</style>

<body class="relative font-sans">
    {{-- Navbar s --}}
    <nav class="py-1 px-3 md:px-10 bg-[#222020] flex justify-between items-center z-20">
        <div class="flex items-center ">
            <img src="{{ asset('admin/assets/img/Pizza.png') }}" alt=""
                class="w-16 lg:w-24">
            <div class="flex justify-center -translate-x-1">
                <span
                    class="cursor-default text-2xl lg:text-4xl font-extrabold bg-[#FFA500] text-[rgba(34,34,34,1.5)] p-1">MON</span>
                <span class="cursor-default text-2xl lg:text-4xl font-extrabold text-[#FFA500]  p-1">DAY</span>
            </div>
        </div>
        <div class="fixed w-full h-1/3  -top-full right-0 bg-[#FFA500]  z-10 md:static md:w-auto md:h-auto md:top-auto md:right-auto md:bg-inherit animate__animated duration-500"
            id="mobileMenu">
            <div class="md:hidden rounded-full  bg-[rgba(34,34,34,1.5)] opacity-60 flex items-center justify-center w-10 h-10 absolute right-3 top-3 shadow-xl"
                id="closeMoblieMenu">
                <i class="fa-solid fa-x text-white "></i>
            </div>
            <ul
                class="flex flex-col md:flex-row justify-center items-center md:flex md:space-x-3 lg:space-x-5 space-y-5 md:space-y-0 mt-9 md:mt-0">
                <li
                    class="text-xl font-semibold text-white p-2 px-3 rounded-xl hover:text-[#FFA500] transition duration-200 cursor-pointer {{ request()->is('user/homePage') ? 'active' : '' }}">
                    <a href="{{ route('user#homePage') }}">Home</a>
                </li>
                <li
                    class="text-xl font-semibold text-white p-2 px-3 rounded-xl hover:text-[#FFA500] transition duration-200 cursor-pointer {{ request()->is('user/cart*') ? 'active' : '' }}">
                    <a href="{{ route('user#cartPage') }}">My Cart</a></li>
                <li
                    class="text-xl font-semibold text-white p-2 px-3 rounded-xl hover:text-[#FFA500] transition duration-200 cursor-pointer {{ request()->is('user/contact*') ? 'active' : '' }}">
                    <a href="{{ route('user#contactPage') }}">Contact</a></li>
            </ul>
        </div>
        <div class="flex space-x-1 items-center">
            @yield('cart')
            <div class="cursor-pointer relative " id="dropDownIcon">
                <div class="flex items-center md:space-x-3">
                    @if (Auth::user()->image == null)
                        @if (Auth::user()->gender == 'male')
                            <img src="{{ asset('image/default_male.jpg') }}" alt=""
                                class="rounded-full bg-cover w-9 h-9 md:w-12 md:h-12 mr-3 md:mr-auto ">
                        @else
                            <img src="{{ asset('image/default_female.jpg') }}" alt=""
                                class="rounded-full bg-cover w-9 h-9 md:w-12 md:h-12 mr-3 md:mr-auto ">
                        @endif
                    @else
                        <img src="{{ asset('storage/' . Auth::user()->image) }}" alt=""
                            class="rounded-full bg-cover w-9 h-9 md:w-12 md:h-12 mr-3 md:mr-auto ">
                    @endif
                    <h5 class="font-semibold text-white text-md hidden md:block">
                        {{ Auth::user()->name }}</h5>
                </div>
                <div class="absolute bg-white p-5 w-48 md:w-60 -left-28 md:-left-20 -translate-x-10 lg:-bottom-[220px] lg:-left-20 space-y-10 hidden shadow-xl z-10"
                    id="dropDownMenu">
                    <a href="{{ route('user#detailPage') }}">
                        <div
                            class="flex items-center space-x-5 text-sm md:text-md text-slate-500 hover:text-[rgba(34,34,34,1.5)] font-semibold h-12">
                            <i class="fa-solid fa-user"></i>
                            <h3>Account</h3>
                        </div>
                    </a>
                    <a href="{{ route('user#changePasswordPage') }}">
                        <div
                            class="flex items-center space-x-5 text-sm md:text-md text-slate-500 hover:text-[rgba(34,34,34,1.5)] font-semibold h-12">
                            <i class="fa-solid fa-gear"></i>
                            <h3>Change Password</h3>
                        </div>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            class="flex items-center justify-center space-x-5 text-sm md:text-md text-white rounded-2xl font-semibold h-12 bg-[rgba(34,34,34,1.5)] hover:bg-[rgba(34,34,34,1.5)]/80 px-3 py-1 w-full"
                            type="submit">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <h3>Logout</h3>
                        </button>
                    </form>
                </div>
            </div>
            <div class="md:hidden text-[#FFA500]" id="openMobileMenu">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

    </nav>
    {{-- Navbar e --}}

    @yield('content')

    {{-- footer s --}}
    <footer
        class="bg-[#222022] py-7 px-3 md:px-10 mt-24 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-x-10 gap-5 lg:gap-5 hover:text-black">
        <div class="">
            <div class="flex items-center relative">
                <img src="{{ asset('admin/assets/img/Pizza.png') }}" alt=""
                    class="w-20">
                <h3 class="text-3xl font-semibold cursor-default text-[#FFA500]">MONDAY</h3>
            </div>
            <p class="text-white text-md  mt-2 cursor-default">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Aliquam blanditiis eveniet temporibus hic et quasi fuga error? Ipsam fuga sed commodit
            </p>
            <ul class="flex items-center space-x-3 mt-5">
                <li
                    class="w-8 h-8 border border-white rounded-full text-white flex justify-center items-center hover:border-[#FFA500] hover:bg-[#FFA500] hover:text-black cursor-default">
                    <i class="fa-brands fa-facebook-f "></i>
                </li>
                <li
                    class="w-8 h-8 border border-white rounded-full text-white flex justify-center items-center hover:border-[#FFA500] hover:bg-[#FFA500] hover:text-black cursor-default">
                    <i class="fa-brands fa-twitter "></i>
                </li>
                <li
                    class="w-8 h-8 border border-white rounded-full text-white flex justify-center items-center hover:border-[#FFA500] hover:bg-[#FFA500] hover:text-black cursor-default">
                    <i class="fa-brands fa-instagram "></i>
                </li>
            </ul>
        </div>
        <div class=" lg:flex lg:justify-center mt-5">
            <div>
                <h2 class="text-2xl font-semibold text-white cursor-default">Contact Info</h2>
                <div class="flex items-center space-x-3 mt-5">
                    <i class="fa-solid fa-location-dot text-[#FFA500] text-md"></i>
                    <h3 class="text-md font-semibold text-white cursor-default">North Okkalapa Township, Yangon</h3>
                </div>
                <div class="flex items-center space-x-3 mt-3">
                    <i class="fa-solid fa-mobile-screen-button text-[#FFA500] text-md"></i>
                    <h3 class="text-md font-semibold text-white cursor-default">+959779905414</h3>
                </div>
                <div class="flex items-center space-x-3 mt-3">
                    <i class="fa-solid fa-envelope text-[#FFA500] text-md"></i>
                    <h3 class="text-md font-semibold text-white cursor-default">zarnithway813@gmail.com</h3>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <h2 class="text-2xl font-semibold text-white cursor-default">Opening Time</h2>
            <div class="flex items-center justify-between border-b border-dashed pb-2 mt-5">
                <h3 class="text-white font-semibold text-md cursor-default">Week days</h3>
                <h3 class="text-white font-semibold text-md cursor-default">9:00-22:00</h3>
            </div>
            <div class="flex items-center justify-between border-b border-dashed pb-2 mt-3">
                <h3 class="text-white font-semibold text-md cursor-default">Saturday</h3>
                <h3 class="text-white font-semibold text-md cursor-default">9:00-20:00</h3>
            </div>
            <div class="flex items-center justify-between mt-3">
                <h3 class="text-white font-semibold text-md cursor-default">Sunday</h3>
                <h3 class="text-white font-semibold text-md cursor-default">Day Off</h3>
            </div>
        </div>
    </footer>
    <div class="bg-black/80 flex flex-col md:flex-row space-y-3 md:space-y-0  justify-between px-3 md:px-10 py-3">
        <h3 class="text-md font-semibold text-white cursor-default">©2023-All Rights Reserved - Designed by Ryan</h3>
        <h3 class="text-md font-semibold text-white cursor-default">Terms & Conditions | Privacy Policy</h3>
    </div>
    {{-- footer e --}}
</body>
<script src="{{ asset('user/main.js') }}"></script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('js')

</html>
