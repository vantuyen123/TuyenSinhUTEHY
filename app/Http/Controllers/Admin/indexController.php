<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //
    public function listAll()
    {
        return view('Admin.index');
    }
}
