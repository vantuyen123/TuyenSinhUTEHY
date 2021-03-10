<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\commentModel;
use App\Models\postModel;
use App\Models\userModel;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //
    private $blog,$comment,$user;
    public function __construct()
    {

    }
    public function index()
    {
        return view('FrontEnd.index');
    }

    public function searchItem($search)
    {

    }

    public function addcomment(Request $request, $id)
    {

    }
    public function album()
    {
    }
    public function login()
    {
        return view('Admin.login');
    }
    public function checkLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($arr)) {
            return redirect()->intended('admin');
        }
        else{
            return 'that bai nhe';
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->intended('login');
    }

}
