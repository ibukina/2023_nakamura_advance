<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Validation\Validator;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        // $validator=Validator::make($request->all(),[
            // 'fullname'=>['required', 'string', 'max:255',],
            // 'gender'=>['required',],
            // 'email'=>['required','string', 'email', 'max:255',],
            // 'postcode'=>['required', 'max:8',],
            // 'address'=>['required', 'string', 'max:255',],
            // 'building_name'=>['string', 'max:255', 'nullable',],
            // 'opinion'=>['string', 'required', 'max:120'],
        // ]);
        // $validator->validate();

        // $request->validate([
            // 'fullname'=>['required', 'string', 'max:255'],
            // 'gender'=>['required'],
            // 'email'=>['required','string', 'email', 'max:255'],
            // 'postcode'=>['required', 'max:8'],
            // 'address'=>['required', 'string', 'max:255'],
            // 'building_name'=>['string', 'max:255', 'nullable'],
            // 'opinion'=>['string', 'required', 'max:120'],
        // ]);
        
        // $contact = $request->all();
        $contact = $request->only(['fullname','gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        // $result=count($contact);
        // echo $result;

        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->all();

        Contact::create($contact);

        return view('thanks');
    }
}
