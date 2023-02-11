<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
 // contact page
    public function contactPage() {
     return view('user.main.contact');
    }

    // user send mail
    public function sendMail(Request $request) {
     $data = $this->userSendMailRequest($request); 
     $this->userSendMailValidation($request);

     Contact::create($data);
     return redirect()->route('user#contactPage')->with(['sendSuccess' => 'You have been send successfuly!']);
    }

    // private function
    // user send mail request
    private function userSendMailRequest($request) {
     return [
      'name' => $request->name,
      'email' => $request->email,
      'message' => $request->message
     ];
    }

    // user send mail validation 
    private function userSendMailValidation($request) {
     Validator::make($request->all(),[
      'name' => 'required',
      'email' => 'required|email',
      'message' => 'required'
     ])->validate();
    }
}
