@extends('user.layouts.master')
@section('title', 'home')

@section('cart')
    <div class="flex items-center">
        <div class="relative">
            <div
                class="w-4 md:w-6 h-4 rounded-full bg-red-500 flex items-center justify-center absolute right-1 md:right-1 -top-3 md:-top-2">
                <span class="text-white text-[10px] font-bold">{{ $cart->total() }}</span>
            </div>
            <a class="p-1 w-6 h-6 md:w-10 md:h-10 flex justify-center items-center text-[#FFA500] mr-3 cursor-pointer"
                href="{{ route('user#cartPage') }}">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </div>
        <div class="relative">
            <div
                class="w-4 md:w-6 h-4 rounded-full bg-red-500 flex items-center justify-center absolute right-1 md:right-1 -top-3 md:-top-2">
                <span class="text-white text-[10px] font-bold">{{ $order->total() }}</span>
            </div>
            <a class="p-1 w-6 h-6 md:w-10 md:h-10 flex justify-center items-center text-[#FFA500] mr-3 cursor-pointer"
                href="{{ route('user#orderHistory') }}">
                <i class="fa-solid fa-clock-rotate-left"></i>
            </a>
        </div>
    </div>
@endsection

@section('content')
    {{-- Main s --}}
    <section class=" relative overflow-x-hidden bg-slate-50 -z-20 md:py-10 lg:py-3">
        <div class="">
            <img src="{{ asset('user/image/Icon Grid.svg') }}" alt=""
                class="absolute -z-10 opacity-10 hidden md:inline-block">
        </div>
        <div class="mt-10 lg:mt-20 flex justify-between items-center px-8 md:px-10 text-center md:text-left">
            <div class="">
                <h2
                    class="text-2xl md:text-3xl lg:text-4xl font-normal text-[#FFA500] md:tracking-wider cursor-default pacifico">
                    Eat Sleep And
                </h2>
                <h1
                    class="text-4xl md:text-5xl lg:text-7xl font-bold md:font-extrabold max-w-2xl lg:max-w-2xl lg:leading-[110px] leading-[50px] mt-5 md:mt-3 cursor-default">
                    Super Delicious Pizza in town!
                </h1>
                <p
                    class="text-md md:text-lg lg:text-2xl max-w-xl mt-5 lg:leading-10 leading-[30px] text-slate-800 cursor-default">
                    Food is any substance consumed to provide nutritional support for an organism</p>
            </div>
            <div class="hidden md:inline-block relative">
                <img src="{{ asset('user/image/food-img-01 (1).png') }}" alt="" class="w-[600px] lg:w-[700px]">
                <img src="{{ asset('user/image/slider-off.png') }}"
                    class="absolute w-20 lg:w-44 top-0 hidden md:inline-block" alt="">
            </div>
        </div>
    </section>
    {{-- Main e --}}

    {{-- About section s --}}
    <section class="mt-20 lg:mt-32 px-3 md:px-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div
            class="p-7 md:p-10 bg-white shadow-lg md:shadow-2xl space-y-5 rounded-lg before:w-1 hover:before:h-full before:h-0 before:p-0 before:bg-[#FFA500] relative before:absolute before:left-0 before:top-0 h-auto before:duration-200 before:ease-in hover:cursor-default">
            <img src="{{ asset('user/image/features-icon-1.svg') }}" class="ml-5" alt="">
            <h2 class="text-2xl font-semibold">Premium Quality</h2>
            <p class="text-lg text-slate-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit beatae
                vero earum</p>
        </div>
        <div
            class="p-7 md:p-10 bg-white shadow-lg md:shadow-2xl space-y-5 rounded-lg before:w-1 hover:before:h-full before:h-0 before:p-0 before:bg-[#FFA500] relative before:absolute before:left-0 before:top-0 h-auto before:duration-200 before:ease-in hover:cursor-default">
            <img src="{{ asset('user/image/features-icon-2.svg') }}" class="ml-5" alt="">
            <h2 class="text-2xl font-semibold">100% ECO Ingredients</h2>
            <p class="text-lg text-slate-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit beatae
                vero earum</p>
        </div>
        <div
            class="p-7 md:p-10 bg-white shadow-lg md:shadow-2xl space-y-5 rounded-lg before:w-1 hover:before:h-full before:h-0 before:p-0 before:bg-[#FFA500] relative before:absolute before:left-0 before:top-0 h-auto before:duration-200 before:ease-in hover:cursor-default">
            <img src="{{ asset('user/image/features-icon-3.svg') }}" class="ml-5" alt="">
            <h2 class="text-2xl font-semibold">Wood Burned Grill</h2>
            <p class="text-lg text-slate-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit beatae
                vero earum</p>
        </div>
    </section>
    {{-- About section e --}}

    {{-- content section s --}}
    <section class=" py-32 px-3 md:px-10 lg:px-20 bg-cover bg-no-repeat w-full mt-32"
        style="background-image: url({{ asset('user/image/info-slider.png') }}); background-position: center; background-attachement: fixed;">
        <h4 class="text-lg font-semibold font-italic text-white text-center">We Just Love Pizza!</h4>
        <h2 class="text-3xl font-bold text-white mt-5 text-center">We maintain our commitment to quality and
            authenticity</h2>
    </section>
    {{-- contente section e --}}

    {{-- Menu section s --}}
    <section class="px-3 md:px-10 mt-20 py-10">
        <div class="flex justify-center">
            <h1 class="text-5xl font-normal text-center border-b-4 border-[#FFA500] inline-block tracking-wider pacifico">
                Menu
            </h1>
        </div>
        <div class="flex flex-col lg:flex-row  lg:space-x-14 mt-20">
            {{-- left --}}
            <div class="w-full md:w-96 lg:w-[25%]">
                <h1 class="text-3xl font-bold cursor-default ml-3 md:ml-0">FILTER BY CATEGORY</h1>
                <div class="p-8 bg-white shadow-lg rounded-lg mt-3">
                    <div class="bg-[#FFA500] p-3 flex items-center justify-between rounded-md">
                        <h1 class="text-2xl font-semibold cursor-default">Categories</h1>
                        <div class="w-5 h-5 flex items-center justify-center bg-black text-white">
                            <h3 class="font-semibold cursor-default">{{ $category->total() }}</h3>
                        </div>
                    </div>
                    <a href="{{ route('user#homePage') }}">
                        <h1 class="text-md text-slate-600 font-semibold cursor-pointer mt-3">All</h1>
                    </a>
                    <ul class="mt-4 space-y-2">
                        @foreach ($category as $c)
                            <li class="text-md text-slate-600 font-semibold cursor-pointer">
                                <a href="{{ route('user#filter', $c->id) }}">{{ $c->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{-- right --}}
            @if ($pizza->count() != 0)
                <div class="w-full lg:w-[75%] mt-14 lg:mt-0">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-center space-y-3 md:space-y-0">
                        <form action="">
                            @csrf
                            <div class="flex ">
                                <input name="key" type="text" placeholder="Search" value=""
                                    class="px-5 py-2 focus:ring-0  rounded-r-none rounded-lg focus:border-yellow-500 h-10">
                                <button type="submit" class="px-3 py-2 bg-black text-white rounded-l-none rounded-lg h-10">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </form>
                        <div>
                            <select name="sorting" id="sorting" class="border-none shadow-lg  py-2 rounded-lg">
                                <option value="">Sorting</option>
                                <option value="asc">Ascending</option>
                                <option value="desc">Descending</option>
                            </select>

                        </div>
                    </div>
                    {{-- pizzas --}}
                    <div id="data_table">
                        <div class="grid grid-cols-2 md:grid-cols-3 mt-10 gap-7" id="dataList">
                            @foreach ($pizza as $p)
                                <div class="w-full lg:w-72 shadow-lg overflow-hidden rounded-lg">
                                    <div class="w-full lg:w-72 md:h-52 h-32 relative mainShowIcon" id="mainShowIcon">
                                        <img src="{{ asset('storage/' . $p->image) }}"
                                            class="w-full lg:w-72 object-cover md:h-52  h-32" alt="">
                                        <div
                                            class="bg-white/50 lg:w-72 md:h-52 w-full h-32 absolute top-0 flex justify-center items-center space-x-2 iconHidden showIcon transition duration-100 ease-in-out">
                                            <a class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg "
                                                href="#">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                            <a class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg "
                                                href="{{ route('pizza#detailPage', $p->id) }}" id="info">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                            <input type="hidden" value="{{ $p->id }}" id="pizzaId">
                                        </div>
                                    </div>
                                    <div class="px-4 py-2 pb-3">
                                        <h1 class="text-2xl font-semibold mt-5 cursor-default">{{ $p->name }}</h1>
                                        <h3 class="text-md font-semibold text-slate-600 mt-2 cursor-default">
                                            {{ $p->price }} MMK</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-5">
                            {{ $pizza->links() }}
                        </div>
                    </div>
                </div>
            @else
                <div class="w-full lg:w-[75%] mt-14 lg:mt-0 lg:h-72 flex items-center justify-center">
                    <h1 class="text-3xl md:text-5xl font-bold text-slate-700">There is no Item here!</h1>
                </div>
            @endif
        </div>
    </section>
    {{-- Menu section e --}}

    {{-- Love section s --}}
    {{-- <section class="mt-10 lg:mt-10 px-3 md:px-10 md:flex flex-col md:flex-row space-y-10 md:space-y-0 items-center hidden">
        <div class="space-y-5">
            <h6 class="text-[#FFA500] text-lg font-semibold cursor-default">WE PUT 100% OF LOVE AND DEDICATION</h6>
            <h1 class="text-4xl font-bold md:font-extrabold text-[rgba(34,34,34,1.5)] max-w-xl cursor-default">Panpie,
                Burgers, And Best Pizzas In Town</h1>
            <p class="max-w-2xl text-slate-600 cursor-default">Lorem Ipsum has been the industry's standard dummy text
                ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type
                specimen book.</p>
            <ul class="text-slate-600 space-y-2">
                <li class="flex items-center space-x-2">
                    <div
                        class="w-5 h-5 flex items-center justify-center rounded-full bg-[#FFA500] text-white font-semibold text-xs">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <span class="text-slate-600 cursor-default">Additional charge for premium toppings</span>
                </li>
                <li class="flex items-center space-x-2">
                    <div
                        class="w-5 h-5 flex items-center justify-center rounded-full bg-[#FFA500] text-white font-semibold text-xs">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <span class="text-slate-600 cursor-default">Minimum of 2 required.</span>
                </li>
                <li class="flex items-center space-x-2">
                    <div
                        class="w-5 h-5 flex items-center justify-center rounded-full bg-[#FFA500] text-white font-semibold text-xs">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <span class="text-slate-600 cursor-default">Premium toppings are fixed</span>
                </li>
            </ul>
        </div>
        <div class="flex justify-center items-center md:ml-20">
            <img src="{{ asset('user/image/special-pro_1_bg.png') }}" alt="" class="w-[450px]">
        </div>
    </section> --}}
    {{-- Love section e --}}

@endsection

@section('js')
    <script>
        $(document).ready(function() {

            // view count
            $('#info').click(function() {
                $pizzaId = $('#pizzaId').val();
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/increase/viewCount',
                    data: {
                        'productId': $pizzaId
                    },
                    dataType: 'json',
                })
            })

            // // show & hidden icons
            // $(".mainShowIcon").each(function(index, row) {
            //     $(row).on("mouseenter", () => {
            //         $showIcon = $(row).find(".showIcon");
            //         $showIcon.removeClass("iconHidden");
            //     });
            // })

            // $(".mainShowIcon").each(function(index, row) {
            //     $(row).on("mouseleave", () => {
            //         $showIcon = $(row).find(".showIcon");
            //         $showIcon.addClass("iconHidden");
            //     });
            // })

            // sorting products
            $('#sorting').change(function() {
                $sortingOption = $('#sorting').val();
                if ($sortingOption == 'asc') {
                    $.ajax({
                        type: 'get',
                        url: 'http://localhost:8000/user/ajax/pizza/list',
                        data: {
                            'status': 'asc'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $list = ''
                            for ($i = 0; $i < response.length; $i++) {

                                $list += `
                                 <div class="w-full lg:w-72 shadow-lg overflow-hidden rounded-lg">
                                <div class="w-full lg:w-72 md:h-52 h-32 relative mainShowIcon">
                                    <img src="{{ asset('storage/${response[$i].image}') }}"
                                        class="w-full lg:w-72 object-cover md:h-52  h-32" alt="">
                                        <div
                                            class="bg-white/50 lg:w-72 md:h-52 w-full h-32 absolute top-0 flex justify-center items-center space-x-2 iconHidden showIcon transition duration-100 ease-in-out">
                                            <a class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg "
                                                href="#">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                            <a class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg "
                                                href="{{ route('pizza#detailPage', $p->id) }}" id="info">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                            <input type="hidden" value="${response[$i].id}" id="pizzaId">
                                        </div>
                                </div>
                                <div class="px-4 py-2 pb-3">
                                    <h1 class="text-2xl font-semibold mt-5 cursor-default">${response[$i].name}</h1>
                                    <h3 class="text-md font-semibold text-slate-600 mt-2 cursor-default">
                                        ${response[$i].price} MMK</h3>
                                </div>
                            </div>
                                `
                            }
                            $('#dataList').html($list);
                        }
                    })
                }
                if ($sortingOption == 'desc') {
                    $.ajax({
                        type: 'get',
                        url: 'http://localhost:8000/user/ajax/pizza/list',
                        data: {
                            'status': 'desc'
                        },
                        dataType: 'json',
                        success: function(response) {
                            $list = ''
                            for ($i = 0; $i < response.length; $i++) {
                                $list += `
                                 <div class="w-full lg:w-72 shadow-lg overflow-hidden rounded-lg">
                                <div class="w-full lg:w-72 md:h-52 h-32 relative mainShowIcon">
                                    <img src="{{ asset('storage/${response[$i].image}') }}"
                                        class="w-full lg:w-72 object-cover md:h-52  h-32" alt="">
                                     <div
                                            class="bg-white/50 lg:w-72 md:h-52 w-full h-32 absolute top-0 flex justify-center items-center space-x-2 iconHidden showIcon transition duration-100 ease-in-out">
                                            <a class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg "
                                                href="#">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                            </a>
                                            <a class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg "
                                                href="{{ route('pizza#detailPage', $p->id) }}" id="info">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                            <input type="hidden" value="${response[$i].id}" id="pizzaId">
                                    </div>
                                </div>
                                <div class="px-4 py-2 pb-3">
                                    <h1 class="text-2xl font-semibold mt-5 cursor-default">${response[$i].name}</h1>
                                    <h3 class="text-md font-semibold text-slate-600 mt-2 cursor-default">
                                        ${response[$i].price} MMK</h3>
                                </div>
                            </div>
                                `
                            }
                            $('#dataList').html($list);
                        }
                    })
                } else {

                }
            })
        })
    </script>
    <script type="text/javascript">
        //pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            $page = $(this).attr('href').split('page=')[1]


            $.ajax({
                url: 'ajax/paginate?page=' + $page,
                success: function(res) {
                    $('#data_table').html(res);
                }
            })
        })
    </script>
@endsection
