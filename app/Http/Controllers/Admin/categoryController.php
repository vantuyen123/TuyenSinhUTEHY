<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoryModel;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    private $cate;
    public function __construct()
    {
        $this->cate= new categoryModel();
    }
    public function listAll()
    {
        $data['items']=$this->cate->listAll();
        return view('Admin.category',$data);
    }
    public function addItem(Request $request)
    {
        $check=$this->cate->addItem($request);
        if($check)
        {
            return redirect()->intended('admin/category');
        }
        else{
            dd('loi nhe');
        }
    }
    public function updateItem(Request $request)
    {
        $this->cate->updateItem($request,$request->id);
    }
    public function deleteItem($id)
    {
        $check=$this->cate->deleteItem($id);
        if($check)
        {
            return redirect()->intended('admin/category');
        }
    }
}
