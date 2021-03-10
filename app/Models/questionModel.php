<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class questionModel extends Model
{
    //
    protected $table="question";
    private $comment;
    public function __construct()
    {
     $this->comment=new commentModel();
    }
    public function addItem(Request $request)
    {
        $item= new questionModel();
        $item->title=$request->title;
        $item->contents=$request->contents;
        $item->status=$request->status;
        $item->iduser=Auth::user()->id;
        $item->save();
        return true;
    }
    public function listAll()
    {
        $items=DB::table('question')->orderBy('created_at','desc')->get();
        return $items;
    }
    public function updateShow($id)
    {
        $item=questionModel::find($id);
        return $item;
    }
    public function updateItem(Request $request,$id)
    {
        $item=questionModel::find($id);
        $item->title=$request->title;
        $item->contents=$request->contents;
        $item->status=$request->status;
        $item->iduser=Auth::user()->id;
        $item->save();
        return true;
    }
    public function deleteItem($id)
    {
        $item=questionModel::find($id);
        $item->delete();
        return true;
    }
    public function detail($id)
    {
        $items=$this->comment->listcomment($id);
        return $items;
    }
}
