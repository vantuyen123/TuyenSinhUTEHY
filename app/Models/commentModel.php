<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class commentModel extends Model
{
    //
    protected $table="comments";
    public function addItem(Request $request,$idquestion)
    {
        $item= new commentModel();
        $item->comment=$request->comment;
        $item->iduser=Auth::user()->id;
        $item->idquestion=$idquestion;
        $item->parentid=$request->parentid;
        $item->save();
        return true;
    }
    public function listAll()
    {
        $items=commentModel::all();
        return $items;
    }
    public function listcomment($id)
    {
        $items=DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.iduser')
            ->where('idquestion',$id)
            ->select('*','comments.id as idcomment')
            ->get();
        return $items;
    }
    public function updateShow($id)
    {
        $item=commentModel::find($id);
        return $item;
    }
    public function updateItem(Request $request,$id)
    {
        $item=commentModel::find($id);
        $item->comment=$request->comment;
        $item->iduser=Auth::user()->id;
        $item->idquestion=$request->idquestion;
        $item->parentid=$request->parentid;
        $item->save();
        return true;
    }
    public function deleteItem($id)
    {
        $item=commentModel::find($id);
        $item->delete();
        return true;
    }
}
