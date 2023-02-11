@extends('admin.layouts.master')

@section('title', 'Order Detail')

@section('content')
    <div class="p-3 pt-10 md:p-8 lg:p-16 relative">
        <a href="{{ route('order#listPage') }}"
            class="absolute left-2 md:left-6 lg:left-10 top-3 lg:top-10 flex items-center">
            <i class="fa-solid fa-left-long text-md lg:text-xl mr-2"></i>
            <span class="font-semibold">Back</span>
        </a>
        <div class="p-5 rounded-lg shadow-lg inline-block bg-white mt-5 w-full md:w-[500px]">
            <h1 class="text-3xl font-bold tracking-wider uppercase">Order Info</h1>
            <div class="text-[#FFA500]  text-sm font-semibold mt-1">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <span>Include Delivery Charges</span>
            </div>
            <div class="mt-5 space-y-2">
                <div class="flex items-center justify-between text-md md:text-lg font-semibold">
                    <div>
                        <i class="fa-solid fa-user mr-1"></i>
                        <span>Name</span>
                    </div>
                    <h3>{{ $orderList[0]->user_name }}</h3>
                </div>
                <div class="flex items-center justify-between text-md md:text-lg font-semibold">
                    <div>
                        <i class="fa-solid fa-barcode mr-1"></i>
                        <span>Order Code</span>
                    </div>
                    <h3>{{ $orderList[0]->order_code }}</h3>
                </div>
                <div class="flex items-center justify-between text-md md:text-lg font-semibold">
                    <div>
                        <i class="fa-solid fa-clock mr-1"></i>
                        <span>Order Date</span>
                    </div>
                    <h3>{{ $orderList[0]->created_at->format('j-F-Y') }}</h3>
                </div>
                <div class="flex items-center justify-between text-md md:text-lg font-semibold">
                    <div>
                        <i class="fa-solid fa-money-check-dollar mr-1"></i>
                        <span>Total</span>
                    </div>
                    <h3>{{ $order->total_price }} MMK</h3>
                </div>
            </div>
        </div>
        <div class="overflow-x-scroll lg:overflow-visible mt-10">
            <table class="mt-5 lg:mt-10 w-[140%] md:w-[120%] lg:w-[100%] text-center" id="dataTable">
                <tr class="columns-12">
                    <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Order Id</th>
                    <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Product Image</th>
                    <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Product Name</th>
                    <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Order Date</th>
                    <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Qty</th>
                    <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Amount</th>
                    <th class=""></th>
                </tr>
                <tbody>
                    @foreach ($orderList as $o)
                        <tr class="border columns-12 h-20 lg:h-32">
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">
                                {{ $o->id }}
                            </td>
                            <td class="">
                            <img src="{{ asset('storage/' . $o->product_image) }}" alt="" class="w-20 md:w-32 mx-auto">
                            </td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">
                                {{ $o->product_name }}
                            </td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">
                                {{ $o->created_at->format('j-F-Y') }}
                            </td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">
                                {{ $o->qty }}
                            </td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">
                                {{ $o->total }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
