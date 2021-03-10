<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\roleModel;
use App\Models\userModel;
use App\Models\users;
use Illuminate\Http\Request;

class userController extends Controller
{
    //
    private $user;
    public function __construct()
    {
        $this->user=new userModel();
    }
    public function listAll()
    {
        $data['items']=$this->user->listall();
        return view('Admin.user',$data);
    }
    public function addShow(){
        $data['itemRoles']=$this->role->listAll();
        return view('Admin.editUsers',$data);
    }
    public function addItem(Request $request)
    {
        $check=$this->user->addItem($request);
        if($check)
        {
            return redirect()->intended('admin/users');
        }
        else{
            dd('them that bai');
        }
    }
    public function updateShow($id)
    {
        $data['itemRoles']=$this->role->listAll();
        $data['item']=$this->user->updateShow($id);
        return view('Admin.editUsers',$data);
    }
    public function updateItem(Request $request,$id)
    {
        $check=$this->user->updateItem($request,$id);
        if($check)
        {
            return redirect()->intended('admin/users');
        }
        else{
            dd('update error !');
        }
    }
    public function deleteItem($id)
    {
        $check=$this->user->deleteItem($id);
        if($check)
        {
            return redirect()->intended('admin/users');
        }
        else{
            dd('update error !');
        }
    }

}
