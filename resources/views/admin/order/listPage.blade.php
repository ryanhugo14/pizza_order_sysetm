@extends('admin.layouts.master')

@section('title', 'Order List')

@section('content')

    <div class="p-3 pt-10 md:p-8 lg:p-16 ">
        <div class="mt-5 flex flex-col md:flex-row md:justify-between md:items-center space-y-3 md:space-y-0">
            <div class="flex items-center">
                <h3 class="text-xl font-semibold flex md:justify-center items-center">Total -</h3>
                <h3
                    class="text-xl font-semibold ml-2 bg-black rounded-full w-9 h-9 text-white flex items-center justify-center">
                    <span></span>{{ $order->total() }}
                </h3>
            </div>
            <form action="{{ route('order#sortingStatus') }}" method="GET">
                @csrf
                <div class="flex">
                    <select name="orderStatus"
                        class="px-5 py-2 focus:ring-0  rounded-r-none rounded-lg focus:border-yellow-500 w-56 font-semibold text-[12px] md:text-sm lg:text-lg">
                        <option class="font-semibold" @if (request('orderStatus') == '') selected @endif value="">All
                        </option>
                        <option class="font-semibold" @if (request('orderStatus') == '0') selected @endif value="0">
                            Pending</option>
                        <option class="font-semibold" @if (request('orderStatus') == '1') selected @endif value="1">
                            Success</option>
                        <option class="font-semibold" @if (request('orderStatus') == '2') selected @endif value="2">
                            Reject</option>
                    </select>
                    <button type="submit" class="px-3 py-2 bg-black text-white rounded-l-none rounded-lg">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>


        @if (count($order) != 0)
            <div class=" overflow-x-scroll">
                <table class="mt-5 lg:mt-10 w-[100%] text-center  table-auto" id="dataTable">
                    <tr class="columns-12">
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Date</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">UserName</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">OrderCode</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Amount</th>
                        <th class="uppercase text-[12px] md:text-sm lg:text-lg cursor-default">Status</th>
                        <th class=""></th>
                    </tr>
                    @foreach ($order as $o)
                        <tr class="border columns-12 h-20 lg:h-32">
                            <input type="hidden" value="{{ $o->id }}" id="orderId">
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">{{ $o->created_at->format('j-F-Y') }}</td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">{{ $o->user_name }}</td>
                            <td class="text-[12px] md:text-sm lg:text-lg text-blue-600">
                                <a href="{{ route('order#detail', $o->order_code  )}}">{{ $o->order_code }}</a>
                            </td>
                            <td class="text-[12px] md:text-sm lg:text-lg cursor-default">{{ $o->total_price }} MMK</td>
                            <td class="cursor-default">
                                <select
                                    class="text-[12px] md:text-sm lg:text-lg font-semibold shadow-lg border-none status">
                                    <option class="text-[#FFA500] font-semibold" value="0"
                                        @if ($o->status == '0') selected @endif>Pending</option>
                                    <option class="text-green-600 font-semibold" value="1"
                                        @if ($o->status == '1') selected @endif>Success</option>
                                    <option class="text-red-600 font-semibold" value="2"
                                        @if ($o->status == '2') selected @endif>Reject</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="mt-5">
                {{ $order->links() }}
            </div>
        @else
            <h1 class="text-5xl font-bold text-slate-500 mt-20 text-center">There is no Order here.</h1>
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.status').change(function() {
                $status = $(this).val();
                $parentNode = $(this).parents('tr');
                $orderId = $parentNode.find('#orderId').val();

                $data = {
                    'orderId': $orderId,
                    'status': $status
                }

                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/order/ajax/change/status',
                    data: $data,
                    dataType: 'json',
                    success: function(response) {
                        if (response[0].status == 'success') {
                            window.location.href = "http://localhost:8000/order/list/page";
                        }
                    }
                })
            })
        })
    </script>
@endsection
