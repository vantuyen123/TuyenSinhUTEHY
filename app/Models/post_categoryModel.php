<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post_categoryModel extends Model
{
    //
    protected $table="postcategory";
    public function addItem(Request $request)
    {
        $item= new post_categoryModel();
        $item->idpost=$request->idpost;
        $item->idcategory=$request->idcategory;
        $item->save();
        return $item;
    }
    public function listAll()
    {
        $items=post_categoryModel::all();
        return $items;
    }
    public function updateShow($id)
    {
        $item=post_categoryModel::find($id);
        return $item;
    }
    public function updateItem(Request $request,$id)
    {
        $item=post_categoryModel::find($id);
        $item->idpost=$request->idpost;
        $item->idcategory=$request->idcategory;
        $item->save();
        return true;
    }
    public function deleteItem($id)
    {
        $item=post_categoryModel::find($id);
        $item->delete();
        return true;
    }
}
