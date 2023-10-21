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
        $fullname=$request->only(['fullname'['last_name'],'fullname'['first_name']]);
        $contacts = $fullname . $request->only(['gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        // $result=count($contact);
        // echo $result;
        // var_dump($contact);

        return view('confirm', compact('contacts'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->all();

        Contact::create($contact);

        return view('thanks');
    }
}
