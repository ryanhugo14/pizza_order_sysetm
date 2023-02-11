<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;

class UserController extends Controller
{
    // home page
    public function homePage()
    {
        $category = Category::paginate();
        $pizza = Product::orderBy('created_at', 'desc')->paginate(6);
        $cart = Cart::paginate();
        $order = Order::where('user_id', Auth::user()->id)->paginate();
        return view('user.main.home', compact('category', 'pizza', 'cart', 'order'));
    }

    // filter
    public function filter($categoryId)
    {
        $category = Category::paginate();
        $pizza = Product::where('category_id', $categoryId)->orderBy('created_at', 'desc')->paginate(9);
        $cart = Cart::paginate();
        $order = Order::where('id', Auth::user()->id)->paginate();
        return view('user.main.home', compact('category', 'pizza', 'cart', 'order'));

    }

    // account detail page
    public function detailPage()
    {
        $profile = User::where('id', Auth::user()->id)->first();
        return view('user.account.detail', compact('profile'));
    }

    // account edit page
    public function editPage()
    {
        $profile = User::where('id', Auth::user()->id)->first();
        return view('user.account.edit', compact('profile'));
    }

    // account update
    public function update(Request $request)
    {
        $this->checkValidation($request);
        $data = $this->requestData($request);
        User::where('id', $request->id)->update($data);
        return redirect()->route('user#detailPage')->with(['updateSuccess' => 'Your account has been updated!']);
    }

    // upload photo
    public function upload($id, Request $request)
    {
        $this->checkImageValidation($request);
        if ($request->hasFile('image')) {
            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/', $fileName);
            $image['image'] = $fileName;
        }

        User::where('id', $id)->update($image);
        return redirect()->route('user#detailPage')->with(['uploadSuccess' => 'Your photo has been uploaded!']);
    }

    // password change page
    public function changePasswordPage()
    {
        return view('user.account.change');
    }

    // password change
    public function passwordChange(Request $request)
    {
        $this->checkPasswordValidation($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbPassword = $user->password;
        if (Hash::check($request->oldPassword, $dbPassword)) {
            User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->newPassword)]);
            return back()->with(['passwordMatch' => 'Your password is changed.']);
        }
        return back()->with(['passwordNOtMatch' => 'The old password is wrong!']);

    }

    // pizza detail page
    public function pizzaDetailPage($id)
    {
        $pizza = Product::where('id', $id)->first();
        $otherPizzas = Product::where('id', '!=', $id)->inRandomOrder()->take(5)->get();
        return view('user.main.detail', compact('pizza', 'otherPizzas'));
    }

    // order history
    public function orderHistory()
    {
        $order = Order::where('user_id', Auth::user()->id)->paginate(6);
        return view('user.main.order', compact('order'));
    }

    // user list in admin panel
    public function userList()
    {
        $users = User::where('role', 'user')->paginate(6);

        return view('admin.other.userList', compact('users'));
    }

    // user role change
    public function userRoleChange(Request $request)
    {
        User::where('id', $request->userId)->update(
            ['role' => $request->role]
        );

        $success = [
            'status' => 'success',
        ];

        return response()->json([$success, 200]);
    }

    // user message
    public function userMessage()
    {
        $message = Contact::when(request('key'), function ($query) {
            $query->orWhere('name', 'like', '%' . request('key') . '%')
                ->orWhere('email', 'like', '%' . request('key') . '%');
        })->orderBy('id', 'desc')->paginate(6);
        $message->appends(request()->all());
        return view('admin.other.customerMessage', compact('message'));
    }

    // private function
    // check validation
    private function checkPasswordValidation($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6|max:12',
            'newPassword' => 'required|min:6|max:12',
            'confirmPassword' => 'required|min:6|max:12|same:newPassword',
        ])->validate();
    }

    // check validation
    private function checkValidation($request)
    {
        Validator::make($request->all(), [
            'updateUserName' => 'required',
            'updateEmail' => 'required',
            'updatePhone' => 'required|min:9|max:11',
            'updateAddress' => 'required',
            'gender' => 'required',
        ])->validate();
    }

    // requestData
    private function requestData($request)
    {
        return [
            'name' => $request->updateUserName,
            'email' => $request->updateEmail,
            'phone' => $request->updatePhone,
            'address' => $request->updateAddress,
            'gender' => $request->gender,
        ];
    }

    // check image validation
    private function checkImageValidation($request)
    {
        Validator::make($request->all(), [
            'image' => 'required|mimes:png,jpg,jpeg|file',
        ])->validate();
    }
}
