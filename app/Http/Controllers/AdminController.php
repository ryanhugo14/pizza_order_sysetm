<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Storage;

class AdminController extends Controller
{
    // admin password change page
    public function passwordChangePage()
    {
        return view('admin.account.change');
    }

    // admin password change
    public function passwordChange(Request $request)
    {
        $this->checkValidation($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbPassword = $user->password;
        if (Hash::check($request->oldPassword, $dbPassword)) {
            User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->newPassword)]);
            return back()->with(['passwordMatch' => 'Your password is changed.']);
        }
        return back()->with(['passwordNOtMatch' => 'The old password is wrong!']);
    }

    // admin detail page
    public function details()
    {
        $profile = Auth::user();
        return view('admin.account.details', compact('profile'));
    }

    // admin edit
    public function edit()
    {
        $profile = Auth::user();
        return view('admin.account.edit', compact('profile'));
    }

    // admin image upload
    public function upload($id, Request $request)
    {

        $this->checkImageValidation($request);
        if ($request->hasfile('image')) {
            $dbImage = User::where('id', $id)->first();
            $dbImage = $dbImage->image;

            if ($dbImage != null) {
                Storage::delete('public/' . $dbImage);
            }

            $fileName = uniqid() . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/', $fileName);
            $updateData['image'] = $fileName;
        }
        User::where('id', $id)->update($updateData);
        return redirect()->route('admin#details')->with(['uploadSuccess' => 'Your photo has been uploaded.']);

    }

    // admin update
    public function update(Request $request)
    {
        $this->checkUpdateDataValidation($request);
        $updateData = $this->requestUpdateData($request);
        User::where('id', $request->updateUserId)->update($updateData);
        return redirect()->route('admin#details')->with(['updateSuccess' => 'Your detail has been updated.']);
    }

    // admin list page
    public function listPage()
    {
        $admin = User::when(request('key'), function ($query) {
            $query->orWhere('role', 'like', '%' . request('key') . '%')
            ->orWhere('email', 'like', '%' . request('key') . '%')
            ->orWhere('phone', 'like', '%' . request('key') . '%')
            ->orWhere('address', 'like', '%' . request('key') . '%');
        })
            ->where('role', 'admin')->paginate(4);
        $admin->appends(request()->all());
        return view('admin.account.list', compact('admin'));
    }

    // admin delete
    public function delete($id) {
     User::where('id',$id)->delete();
     return back()->with(['deleteSuccess' => 'You have been deleted!']);
    }

    // admin remove page
    public function removePage($id) {
     $admin = User::where('id',$id)->first();
     return view('admin.account.remove', compact('admin'));
    }

    // admin remove
    public function remove(Request $request) {
     $role = $this->adminRoleCheck($request);
     User::where('id', $request->id)->update($role);
     return redirect()->route('admin#listPage')->with(['removeSuccess' => 'You have been removed!']);
    }

    // private function
    // check validation
    private function checkValidation($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required|min:6|max:12',
            'newPassword' => 'required|min:6|max:12',
            'confirmPassword' => 'required|min:6|max:12|same:newPassword',
        ])->validate();
    }

    // check update data validation
    private function checkUpdateDataValidation($request)
    {
        Validator::make($request->all(), [
            'updateUserName' => 'required|unique:users,name,' . $request->updateUserId,
            'updateEmail' => 'required|unique:users,email,' . $request->updateUserId,
            'updatePhone' => 'required|unique:users,phone,' . $request->updateUserId,
            'updateAddress' => 'required',
            'gender' => 'required',
        ])->validate();
    }

    // request update data
    private function requestUpdateData($request)
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
            'image' => 'required|mimes:jpeg,png,jpg,jfjf|file',
        ])->validate();
    }

    // admin role check
    private function adminRoleCheck($request) {
     return [
      'role' => $request->role
     ];
    }

}
