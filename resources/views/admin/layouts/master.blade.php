<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite('resources/css/app.css')

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    td {
        background-color: white;
        padding: 10px;
    }

    .is-invalid {
        border-color: #ff0000 !important;
    }

    .active {
        display: inline-block !important;
        color: black;
    }
</style>

<body class="overflow-x-hidden">
    <div class="flex min-h-screen bg-gray-100 relative">
        <!-- sidebar s -->
        <aside class="z-20 h-screen sticky top-0 hidden md:block  w-56 lg:w-60 bg-white flex-shrink-0">
            <!-- logo -->
            <div class="flex  items-center ml-2 cursor-default ">
                <img src="{{ asset('admin/assets/img/Pizza.png') }}"
                    style="width: 80px;" class="" alt="">
                <h4 class="text-2xl font-semibold  lg:flex">MON<span class="text-yellow-500">DAY</span></h4>
            </div>
            <!-- menu -->
            <ul class="mt-10 space-y-3">
                <a href="{{ route('category#list') }}" class="">
                    <li
                        class="relative flex items-center space-x-5 font-semibold cursor-pointer text-gray-500 hover:text-black h-14">
                        <span
                            class="absolute  inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg hidden {{ request()->is('category*') ? 'active' : '' }}"></span>
                        <i class="fa-solid fa-bars-staggered"></i>
                        <span>Category</span>
                    </li>
                </a>
                <a href="{{ route('product#list') }}" class="">
                    <li
                        class="relative flex items-center space-x-5 font-semibold cursor-pointer text-gray-500 hover:text-black h-14">
                        <span
                            class="absolute  inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg  hidden {{ request()->is('products*') ? 'active' : '' }}"></span>
                        <i class="fa-solid fa-pizza-slice"></i>
                        <span>Product</span>
                    </li>
                </a>
                <a href="{{ route('admin#details') }}" class="">
                    <li
                        class="relative flex items-center space-x-5 font-semibold cursor-pointer text-gray-500 hover:text-black h-14">
                        <span
                            class="absolute  inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg  hidden {{ request()->is('admin*') ? 'active' : '' }}"></span>
                        <i class="fa-solid fa-user"></i>
                        <span>Profile</span>
                    </li>
                </a>
                <a href="{{ route('order#listPage') }}" class="">
                    <li
                        class="relative flex items-center space-x-5 font-semibold cursor-pointer text-gray-500 hover:text-black h-14">
                        <span
                            class="absolute  inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg  hidden {{ request()->is('order*') ? 'active' : '' }}"></span>
                        <i class="fa-solid fa-list-ul"></i>
                        <span>Order List</span>
                    </li>
                </a>
                <a href="{{ route('admin#userList') }}" class="">
                    <li
                        class="relative flex items-center space-x-5 font-semibold cursor-pointer text-gray-500 hover:text-black h-14">
                        <span
                            class="absolute  inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg  hidden {{ request()->is('user*') ? 'active' : '' }}"></span>
                        <i class="fa-solid fa-users"></i>
                        <span>Users List</span>
                    </li>
                </a>
                <a href="{{ route('user#message') }}" class="">
                    <li
                        class="relative flex items-center space-x-5 font-semibold cursor-pointer text-gray-500 hover:text-black h-14">
                        <span
                            class="absolute  inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg  hidden {{ request()->is('customer*') ? 'active' : '' }}"></span>
                        <i class="fa-sharp fa-solid fa-pen-nib"></i>
                        <span>Customer Message</span>
                    </li>
                </a>
            </ul>
        </aside>
        <!-- siderbar e -->

        <!-- mobile sidebar s -->
        <div class="fixed inset-0 z-10 hidden items-end bg-black bg-opacity-50 sm:items-center sm:justify-center  md:hidden "
            id="backgrounBlack"></div>
        <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white hidden  md:hidden"
            id="sideBar">
            <div class="py-4 text-gray-500 ">
                <div class="flex items-center ml-3">
                    <img src="{{ asset('admin/assets/img/Pizza.png') }}"
                        style="width: 50px;" class="" alt="">
                    <h4 class="text-2xl font-semibold text-black">MON<span class="text-yellow-500">DAY</span></h4>
                </div>
                <ul class="mt-6">
                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg {{ request()->is('category*') ? 'active' : '' }} hidden"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800  "
                            href="{{ route('category#list') }}">
                            <i class="fa-solid fa-bars-staggered"></i>
                            <span class="ml-4">Category</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg {{ request()->is('products*') ? 'active' : '' }} hidden"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800  "
                            href="{{ route('product#list') }}">
                            <i class="fa-solid fa-pizza-slice"></i>
                            <span class="ml-4">Product</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg {{ request()->is('admin*') ? 'active' : '' }} hidden"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800  "
                            href="{{ route('admin#details') }}">
                            <i class="fa-solid fa-user"></i>
                            <span class="ml-4">Profile</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg {{ request()->is('order*') ? 'active' : '' }} hidden"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800  "
                            href="{{ route('order#listPage') }}">
                            <i class="fa-solid fa-list-ul"></i>
                            <span class="ml-4">Order List</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg {{ request()->is('order*') ? 'active' : '' }} hidden"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800  "
                            href="{{ route('admin#userList') }}">
                            <i class="fa-solid fa-list-ul"></i>
                            <span class="ml-4">Users List</span>
                        </a>
                    </li>
                    <li class="relative px-6 py-3">
                        <span
                            class="absolute inset-y-0 left-0 w-1 bg-yellow-500 rounded-tr-lg rounded-br-lg {{ request()->is('customer*') ? 'active' : '' }} hidden"
                            aria-hidden="true"></span>
                        <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800  "
                            href="{{ route('user#message') }}">
                            <i class="fa-sharp fa-solid fa-pen-nib"></i>
                            <span class="ml-4">Customer Message</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- mobile siderbar e -->

        <div class="w-full">
            <!-- navbar s -->
            <div class="flex flex-col flex-1 w-full sticky top-0 z-20">
                <header class="z-10  py-4 bg-white px-2 lg:px-10">
                    <div class=" flex items-center justify-between h-full  md:px-6 mx-auto">
                        <!-- Mobile hamburger -->
                        <div class="md:hidden flex items-center ">
                            <div>
                                <button class="rounded-md  md:hidden w-10" id="siderBarOpen">
                                    <i class="fa-solid fa-bars text-lg text-slate-800"></i>
                                </button>
                                <button class="rounded-md  hidden md:hidden w-10" id="siderBarClose">
                                    <i class="fa-solid fa-xmark text-lg text-slate-800"></i>
                                </button>
                            </div>
                        </div>
                        <!-- search -->
                        <div class="">
                            <h1 class="text-xl md:text-2xl font-semibold cursor-default">Admin Dashboard Panel</h1>
                        </div>
                        <!-- profile -->
                        <div class="  cursor-pointer relative" id="dropDownIcon">
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
                                <h5 class="font-semibold text-slate-500 text-md hidden md:block">
                                    {{ Auth::user()->name }}</h5>
                            </div>
                            <div class="absolute bg-white p-5 w-48 md:w-60 -left-28 md:-left-20 -translate-x-10 lg:-bottom-[270px] lg:-left-20 space-y-10 hidden shadow-xl"
                                id="dropDownMenu">
                                <a href="{{ route('admin#details') }}">
                                    <div
                                        class="flex items-center space-x-5 text-sm md:text-md text-slate-500 hover:text-black font-semibold h-12">
                                        <i class="fa-solid fa-user"></i>
                                        <h3>Account</h3>
                                    </div>
                                </a>
                                <a href="{{ route('admin#listPage') }}">
                                    <div
                                        class="flex items-center space-x-5 text-sm md:text-md text-slate-500 hover:text-black font-semibold h-12">
                                        <i class="fa-solid fa-users"></i>
                                        <h3>Admin List</h3>
                                    </div>
                                </a>
                                <a href="{{ route('admin#passwordChangePage') }}">
                                    <div
                                        class="flex items-center space-x-5 text-sm md:text-md text-slate-500 hover:text-black font-semibold h-12">
                                        <i class="fa-solid fa-gear"></i>
                                        <h3>Change Password</h3>
                                    </div>
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button
                                        class="flex items-center justify-center space-x-5 text-sm md:text-md text-white rounded-2xl font-semibold h-12 bg-black hover:bg-black/80 px-3 py-1 w-full"
                                        type="submit">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <h3>Logout</h3>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </header>
            </div>

            {{-- main content --}}
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>



</body>
<script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('js')

</html>
