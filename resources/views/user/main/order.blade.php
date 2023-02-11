@extends('user.layouts.master')
@section('title', 'Order History')

@section('content')
    <div class="relative px-3 md:px-10 py-10 w-full">
        <a href="{{ route('user#homePage') }}" class="mb-5 left-2 md:left-6 lg:left-10 top-0 flex items-center  ">
            <i class="fa-solid fa-left-long text-xl mr-2"></i>
            <span class="font-semibold">Back</span>
        </a>
        @if (count($order) != 0)
        <table class="w-full table-auto h-[400px]" id="dataTable">
            <thead class="bg-black text-white">
                <tr class="h-10 bg-black">
                    <th class="text-[13px] md:text-base w-20 md:w-auto">Date</th>
                    <th class="text-[13px] md:text-base">OrderId</th>
                    <th class="text-[13px] md:text-base">Total</th>
                    <th class="text-[13px] md:text-base w-20 md:w-auto">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $o)
                    <tr class="h-20 bg-slate-100 border-b text-center">
                        <td class="text-xs md:text-sm">{{ $o->created_at->format('j-F-Y') }}</td>
                        <td class="text-xs md:text-sm">{{ $o->order_code }}</td>
                        <td class="text-xs md:text-sm">{{ $o->total_price }} MMK</td>
                        <td class="text-xs md:text-sm">
                            @if ($o->status == 0)
                                <span class="text-[#FFA500] font-semibold">Pending</span>
                            @elseif ($o->status == 1)
                                <span class="text-green-600 font-semibold">Success</span>
                            @else
                                <span class="text-red-600 font-semibold">Reject</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
                <h1
                    class="text-3xl mb-10 md:mb-0 md:text-4xl font-bold text-slate-700 h-full w-full flex items-center justify-center">
                    There is no order history here!</h1>
            @endif
    </div>
@endsection
