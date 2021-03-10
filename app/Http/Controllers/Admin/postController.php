<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categoryModel;
use App\Models\localModel;
use App\Models\postModel;
use Illuminate\Http\Request;

class postController extends Controller
{
    //
    private $category,$post;
    public function __construct()
    {
        $this->category=new categoryModel();
        $this->post= new postModel();

    }
    public function listAll()
    {
        $data['items']=$this->post->listAll();
        return view('Admin.posts',$data);
    }
    public function addShow()
    {
        $data['itemsCategory']=$this->category->listAll();
        return view('Admin.editPost',$data);
    }
    public function addItem(Request $request)
    {
        $check=$this->post->addItem($request);
        if($check)
        {
            return redirect()->intended('admin/post');
        }
        else{
            return dd('error post');
        }
    }
    public function updateShow($id)
    {
        $data['itemsCategory']=$this->category->listAll();
        $data['item']=$this->post->updateShow($id);
        return view('Admin.editPost',$data);
    }
    public function updateItem(Request $request, $id)
    {
        $check=$this->post->updateItem($request,$id);
        if($check)
        {
            return redirect()->intended('admin/post');
        }
        else{
            dd('loi');
        }
    }
    public function deleteItem($id)
    {
        $check=$this->post->deleteItem($id);
        if($check)
        {
            return redirect()->intended('admin/post');
        }
        else{
            dd('loi');
        }
    }
}
