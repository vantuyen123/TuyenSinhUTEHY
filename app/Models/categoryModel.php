<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class categoryModel extends Model
{
    //
    protected $table="category";
    public function addItem(Request $request)
    {
        $item= new categoryModel();
        $item->title=$request->title;
        $item->codeid=$request->codeid;
        $item->status=$request->status;
        $item->description=$request->description;
        $item->save();
        return true;
    }
    public function listAll()
    {
        $items=categoryModel::all();
        return $items;
    }
    public function updateShow($id)
    {
        $item=categoryModel::find($id);
        return $item;
    }
    public function updateItem(Request $request,$id)
    {
        $item=categoryModel::find($id);
        $item->title=$request->title;
        $item->codeid=$request->codeid;
        $item->status=$request->status;
        $item->description=$request->description;
        $item->save();
        return true;
    }
    public function deleteItem($id)
    {
        $item=categoryModel::find($id);
        $item->delete();
        return true;
    }
}
