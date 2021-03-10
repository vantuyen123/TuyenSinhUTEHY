<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ImportRecipes;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class studentController extends Controller
{
    //
    public function addItem(Request $request)
    {
       // Excel::import(new ImportRecipes,request()->file('file'));
        Excel::load($request->file, function($reader) {
        })->get();
        //return back();
    }
    public function import(Request $request)
    {
        // Excel::import(new ImportRecipes,request()->file('file'));
        Excel::load($request->file, function($reader) {
        })->get();
        //return back();
    }
}
