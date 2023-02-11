@extends('user.layouts.master')
@section('title', 'Pizza Detail')

@section('content')
    <div class="relative px-3 md:px-10 py-10">
        <a href="{{ route('user#homePage') }}" class="mb-5 left-2 md:left-6 lg:left-10 top-10 flex items-center  ">
            <i class="fa-solid fa-left-long text-xl mr-2"></i>
            <span class="font-semibold">Back</span>
        </a>
        <div class="flex flex-col md:flex-row lg:h-[400px] md:space-x-10 space-y-5 md:space-y-0  ">
            {{-- left --}}
            <div>
                <img src="{{ asset('storage/' . $pizza->image) }}" alt=""
                    class="w-96 md:w-[500px] lg:w-[600px] lg:h-[400px] object-cover object-no-repeat rounded-md">
            </div>
            {{-- right --}}
            <div class="bg-slate-100 p-7 rounded-md space-y-5 md:w-[700px] h-full">
                <h1 class="text-3xl font-bold mb-2">{{ $pizza->name }}</h1>
                <div class="flex items-center space-x-3">
                    <h4 class="text-md font-semibold">{{ $pizza->view_count }}</h4>
                    <i class="fa-solid fa-eye text-md font-semibold"></i>
                </div>
                <h2 class="text-xl font-semibold">{{ $pizza->price }} MMK</h2>
                <p class="text-lg font-semibold text-slate-700">{{ $pizza->description }}</p>
                <div class="flex items-center space-x-5 md:space-x-10 h-10">
                    <div class="flex items-center">
                        <input type="hidden" value="{{ Auth::user()->id }}" id="userId">
                        <input type="hidden" value="{{ $pizza->id }}" id="pizzaId">
                        <button
                            class="p-3 w-10 bg-[#FFA500] hover:bg-[#FFA500]/80 text-black rounded-l-lg focus:border-2 focus:border-black text-md font-semibold"
                            id="minus">-</button>
                        <input type="text"
                            class="p-3 border-none w-10 text-center bg-white text-md font-semibold cursor-default"
                            value="1" min="1" max="20" id="count">
                        <button
                            class="p-3 w-10 bg-[#FFA500] hover:bg-[#FFA500]/80 text-black rounded-r-lg focus:border-2 focus:border-black text-md font-semibold"
                            id="plus">+</button>
                    </div>
                    <button type="button"
                        class="bg-[#FFA500] px-5 py-3 rounded-lg text-md font-semibold hover:bg-[#FFA500]/80"
                        id="addToCart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Add to Cart</span>
                    </button>
                </div>
                <div class="text-md font-semibold text-black flex items-center space-x-5">
                    <h3 class="mr-2 cursor-default">Share on:</h3>
                    <i class="fa-brands fa-facebook-f w-3 h-3 cursor-pointer hover:text-[#FFA500] duration-300"></i>
                    <i class="fa-brands fa-twitter w-3 h-3 cursor-pointer hover:text-[#FFA500] duration-300"></i>
                    <i class="fa-brands fa-instagram w-3 h-3 cursor-pointer hover:text-[#FFA500] duration-300"></i>
                </div>
            </div>
        </div>
        <div class="mt-36">
            <h1 class="text-3xl font-bold  ">You May Also Like:</h1>
            <div class=" swiper">
                <div class="swiper-wrapper space-x-6">
                    @foreach ($otherPizzas as $op)
                        <div class="mt-10 flex flex-col space-y-5 bg-slate-50 shadow-lg swiper-slide">
                            <div class="w-full  overflow-hidden ">
                                <div class="w-full md:h-52 h-32 relative mainShowIcon" id="mainShowIcon">
                                    <img src="{{ asset('storage/' . $op->image) }}"
                                        class="w-full object-cover md:h-52  h-32" alt="">
                                    <div
                                        class="bg-white/50  md:h-52 w-full h-32 absolute top-0 flex justify-center items-center space-x-2 iconHidden showIcon">
                                        <div
                                            class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg ">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                        </div>
                                        <a class="p-1 w-10 h-10 flex justify-center items-center border border-black hover:bg-black hover:text-[#FFA500] text-black rounded-lg "
                                            href="{{ route('pizza#detailPage', $op->id) }}">
                                            <i class="fa-solid fa-circle-info"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-5 text-center">
                                    <h1 class="text-lg font-bold mb-3">{{ $op->name }}</h1>
                                    <h3 class="text-xl font-semibold">{{ $op->price }} MMK</h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            centerSlides: true,
            slidesPerView: 3,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },
        });

        // plus minus function
        const minusButton = document.getElementById('minus');
        const plusButton = document.getElementById('plus');
        const inputField = document.getElementById('count');

        minusButton.addEventListener('click', () => {
            const currentValue = Number(inputField.value) || 0;
            inputField.value = currentValue - 1;

            if(inputField.value < '0') {
                inputField.value = 0
            }
        })
        plusButton.addEventListener('click', () => {
            const currentValue = Number(inputField.value) || 0;
            inputField.value = currentValue + 1;
        })


        // ajax
        $(document).ready(function() {

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

            // add to cart
            $('#addToCart').click(() => {
                $source = {
                    userId : $('#userId').val(),
                    pizzaId : $('#pizzaId').val(),
                    count : $('#count').val(),
                }

                $.ajax({
                    type : 'get',
                    url : 'http://localhost:8000/user/ajax/addToCart',
                    dataType : 'json',
                    data : $source,
                    success : function(response){
                        if(response.status == 'success') {
                            window.location.href = "http://localhost:8000/user/homePage";
                        }
                    }
                })
            })
        })
    </script>
@endsection
