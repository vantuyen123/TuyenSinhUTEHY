<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mediaModel extends Model
{
    //
    protected $table="media";
    public function addItem(Request $request)
    {
        $item= new mediaModel();
        $item->name=$request->name;
        $item->describe=$request->describe;
        $item->url=$request->url;
        $item->status=$request->status;
        $item->iduser=$request->iduser;
        $item->idpost=$request->idpost;
        $item->save();
        return $item;
    }
    public function listAll()
    {
        $items=mediaModel::all();
        return $items;
    }
    public function updateShow($id)
    {
        $item=mediaModel::find($id);
        return $item;
    }
    public function updateItem(Request $request,$id)
    {
        $item=mediaModel::find($id);
        $item->name=$request->name;
        $item->describe=$request->describe;
        $item->url=$request->url;
        $item->status=$request->status;
        $item->iduser=$request->iduser;
        $item->idpost=$request->idpost;
        $item->save();
        return true;
    }
    public function deleteItem($id)
    {
        $item=mediaModel::find($id);
        $item->delete();
        return true;
    }
}
