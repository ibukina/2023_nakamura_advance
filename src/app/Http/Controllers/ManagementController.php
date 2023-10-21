<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Management;
use App\Models\Contact;

class ManagementController extends Controller
{
    public function index()
    {
        return view('management');
    }

    public function search(Request $request)
    {
        $managements=Management::FullnameSearch($request->fullname)->GenderSearch($request->gender)->Created_atSearch($request->created_at)->EmailSearch($request->email)->get();

        $managements=Managements::Paginate(10);

        // $result=count($managements);
        // echo $result;
        info($managements);

        return view('management', compact('managements'));
    }

    public function destroy(Request $request)
    {
        Management::find($request->id)->delete();

        return redirect('/managements');
    }
}
