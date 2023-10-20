<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ManagementController extends Controller
{
    public function index()
    {
        $contacts=Contact::all();

        return view('management', compact('contacts'));
    }

    public function search(Request $request)
    {
        $contacts=Contact::FullnameSearch($request->fullname)->GenderSearch($request->gender)->Created_atSearch($request->created_at)->EmailSearch($request->email)->get();

        return view('management', compact('contacts'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/managements');
    }
}
