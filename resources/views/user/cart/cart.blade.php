@extends('user.layouts.master')
@section('title', 'Cart')

@section('content')
    <div class="relative px-3 md:px-10 py-10 grid grid-cols-1 md:grid-cols-5 lg:grid-cols-3 gap-5 w-full">
        {{-- left --}}
        <div class=" md:col-span-3 lg:col-span-2">
            @if (count($cart) != 0)
                <table class="w-full table-fixed" id="dataTable">
                    <thead class="bg-black text-white">
                        <tr class="h-10 bg-black">
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $c)
                            <tr class="h-20 bg-slate-100 border-b text-center">
                                <input type="hidden" value="{{ $c->id }}" id="cartProductId">
                                <input type="hidden" value="{{ $c->product_id }}" class="productId">
                                <input type="hidden" value="{{ $c->user_id }}" class="userId">
                                <td class="text-sm">{{ $c->pizza_name }}</td>
                                <td class="text-sm" id="pizzaPrice">{{ $c->pizza_price }} MMK</td>
                                <td class="flex justify-center items-center h-20 text-sm quantity">
                                    <button
                                        class="p-1 w-6 bg-[#FFA500] hover:bg-[#FFA500]/80 text-black rounded-l-lg focus:border-2 focus:bg[#FFA500]/90 text-sm font-semibold minus"
                                        id="minus" type="button">-</button>
                                    <input type="text"
                                        class="p-1 border-none w-6 text-center bg-white text-sm font-semibold cursor-default count"
                                        value="{{ $c->qty }}" min="1" max="20" id="count">
                                    <button
                                        class="p-1 w-6 bg-[#FFA500] hover:bg-[#FFA500]/80 text-black rounded-r-lg focus:border-2 focus:bg[#FFA500]/90 text-sm font-semibold plus"
                                        id="plus" type="button">+</button>
                                </td>
                                <td class="text-sm" id="total">{{ $c->qty * $c->pizza_price }} MMK</td>
                                <td class="flex justify-center items-center h-20 text-sm">
                                    <button
                                        class="p-1 w-7 h-7 flex items-center justify-center rounded-lg bg-red-600 hover:bg-red-600/90 text-white removeBtn">
                                        <i class="fa-solid fa-xmark text-sm"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <table class="w-full table-fixed" id="dataTable">
                    <thead class="bg-black text-white">
                        <tr class="h-10 bg-black">
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                </table>
                <h1
                    class="text-3xl mb-10 md:mb-0 md:text-4xl font-bold text-slate-700 h-full w-full flex items-center justify-center">
                    There is no items here!</h1>
            @endif
        </div>
        {{-- right --}}
        <div class=" md:col-span-2 lg:col-span-1">
            <h1 class="text-2xl font-semibold">Cart Summary</h1>
            <div class="mt-3 p-7 bg-slate-100 space-y-5">
                <div class="flex justify-between">
                    <h3 class="text-lg font-[400]">Subtotal</h3>
                    <h3 class="text-lg font-[400]" id="subTotal">{{ $totalPrice }} MMK</h3>
                </div>
                <div class="flex justify-between">
                    <h3 class="text-lg font-[400]">Delivery</h3>
                    <h3 class="text-lg font-[400]">3000 MMK</h3>
                </div>
                <div class="border-b"></div>
                <div class="flex justify-between">
                    <h3 class="text-lg font-[600]">Total</h3>
                    @if (count($cart) == 0)
                        <h3 class="text-lg font-[600]" id="finalTotal">0 MMK</h3>
                    @else
                        <h3 class="text-lg font-[600]" id="finalTotal">{{ $totalPrice + 3000 }} MMK</h3>
                    @endif

                </div>
                <button class="text-md lg:text-lg text-white w-full p-3 font-semibold lg:font-bold bg-[#FFA500] hover:bg-[#FFA500]/90 duration-75 ease-in-out rounded-xl"
                    id="orderBtn">Process
                    To Checkout</button>
                <button class="text-md lg:text-lg text-white w-full p-3 font-semibold lg:font-bold bg-red-600 hover:bg-red-600/90 duration-75 ease-in-out rounded-xl"
                    id="deleteBtn">Clear Cart</button>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('user/js/cart.js') }}"></script>
    <script>
        $(document).ready(function() {
            // order
            $('#orderBtn').click(function() {
                $orderData = [];
                $randomNumber = Math.floor(Math.random() * 10000000001)
                $('#dataTable tbody tr').each((index, row) => {
                    $orderData.push({
                        productId: $(row).find('.productId').val(),
                        userId: $(row).find('.userId').val(),
                        qty: $(row).find('#count').val(),
                        total: $(row).find('#total').text().replace('MMK', '') * 1,
                        orderCode: 'POS' + $randomNumber
                    })
                })
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/order',
                    data: Object.assign({}, $orderData),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = "http://localhost:8000/user/homePage";
                        }
                    }
                })
            })

            // remove product
            $('.removeBtn').click(function() {
                $parentNode = $(this).parents('tr');
                $cartProductId = $parentNode.find('#cartProductId').val();
                $parentNode.remove();

                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/remove/product',
                    data: {
                        cartProductId: $cartProductId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = "http://localhost:8000/user/cart/page";
                        }
                    }
                })
            })

            // remove all orders
            $('#deleteBtn').click(() => {
                $('#dataTable tbody tr').remove();
                $.ajax({
                    type: 'get',
                    url: 'http://localhost:8000/user/ajax/remove/all/product',
                    data: {
                        delete: 'delete'
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == 'success') {
                            window.location.href = "http://localhost:8000/user/cart/page";
                        }
                    }
                })
            })
        })
    </script>
@endsection
