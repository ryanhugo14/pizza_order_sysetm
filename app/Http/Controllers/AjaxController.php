<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderList;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{

    //paginate
    public function paginate(Request $request)
    {
        if ($request->ajax()) {
            $pizza = Product::orderBy('created_at', 'desc')->paginate(6);
            return view('user.main.paginate', compact('pizza'))->render();
        }

    }

    // return pizza list
    public function pizzaList(Request $request)
    {
        if ($request->status == 'desc') {
            $pizza = Product::orderBy('created_at', 'desc')->get();
        } else {
            $pizza = Product::orderBy('created_at', 'asc')->get();
        }
        return $pizza;
    }

    // addToCart
    public function addToCart(Request $request)
    {
        $data = $this->requestData($request);
        Cart::create($data);
        $data = [
            'message' => 'Add to cart completed!',
            'status' => 'success',
        ];
        return response($data, 200);
    }

    // order
    public function order(Request $request)
    {
        $totalPrice = 0;
        foreach ($request->all() as $item) {
            $data = OrderList::create([
                'user_id' => $item['userId'],
                'product_id' => $item['productId'],
                'order_code' => $item['orderCode'],
                'qty' => $item['qty'],
                'total' => $item['total'],
            ]);

            $totalPrice += $data->total;
        }

        Cart::where('user_id', Auth::user()->id)->delete();

        Order::create([
            'user_id' => Auth::user()->id,
            'order_code' => $data->order_code,
            'total_price' => $totalPrice + 3000,
        ]);

        $success = [
            'status' => 'success',
        ];
        return response($success, 200);
    }

    // remove product
    public function removeProduct(Request $request)
    {
        Cart::where('id', $request->cartProductId)->delete();
        $success = [
            'status' => 'success',
        ];
        return response($success, 200);
    }

    // remove all product
    public function removeAllProduct(Request $request)
    {
        if ($request->delete == 'delete') {
            Cart::where('user_id', Auth::user()->id)->delete();
        }
        $success = [
            'status' => 'success',
        ];
        return response($success, 200);
    }

    // increase view count
    public function increaseViewCount(Request $request)
    {
        $product = Product::where('id', $request->productId)->first();

        $data = [
            'view_count' => $product->view_count + 1,
        ];
        Product::where('id', $request->productId)->update($data);

    }

    // user message delete
    public function userMessageDelete(Request $request)
    {
        if ($request->delete == 'delete') {
            Contact::truncate();
        }
        $success = [
            'status' => 'success',
        ];
        return response($success, 200);

    }

    // private function
    // request data
    private function requestData($request)
    {
        return [
            'user_id' => $request->userId,
            'product_id' => $request->pizzaId,
            'qty' => $request->count,
        ];
    }
}
