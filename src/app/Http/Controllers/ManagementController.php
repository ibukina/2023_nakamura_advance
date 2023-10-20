<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Contact;

class ManagementController extends Controller
{
    public function index()
    {
        // $managements=Management::$contacts->all();

        return view('management', compact('contacts'));
    }

    public function search(Request $request)
    {
        $contacts=Management::FullnameSearch($request->fullname)->GenderSearch($request->gender)->Created_atSearch($request->created_at)->EmailSearch($request->email)->get();

        $contacts=Managements::Paginate(10);

        return view('management', compact('contacts'));
    }

    public function destroy(Request $request)
    {
        Management::find($request->id)->delete();

        return redirect('/managements');
    }
}
