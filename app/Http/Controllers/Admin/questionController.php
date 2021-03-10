<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\commentModel;
use App\Models\questionModel;
use Illuminate\Http\Request;

class questionController extends Controller
{
    //
    private $question,$comment;
    public function __construct()
    {
        $this->question=new questionModel();
        $this->comment=new commentModel();
    }
    public function listAll()
    {
        $data['items']=$this->question->listAll();
        return view('Admin.question',$data);
    }
    public function addItem(Request $request)
    {
        if($this->question->addItem($request))
        {
            return back();
        }
        else
        {
            dd('err add Item');
        }
    }
    public function deleteItem($id)
    {
        if($this->question->deleteItem($id))
        {
            return back();
        }
        else{
            dd('err delete !!!');
        }
    }
    public function detaiItem($id)
    {
        $data['itemsComment']=$this->question->detail($id);
        $data['items']=$this->question->listAll();
        return view('Admin.question',$data);
    }
    public function addComment(Request $request,$id)
    {
        $this->comment->addItem($request,$id);
        return back();
    }
}
