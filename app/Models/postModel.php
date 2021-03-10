<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
class postModel extends Model
{
    //
    protected $table='posts';
    public function __construct()
    {
    }
    public function listAll(){
        $item=postModel::all();
        return $item;
    }
    public function addItem($request)
    {
        $item=new postModel();
        $item->title=$request->title;
        $item->tag=$request->tag;
        $item->description=$request->description;
        $item->contents=$request->contents;
        if ($request->hasFile('coverimg')) {
            $filename = $request->coverimg->getClientOriginalName();
            $item->coverimg = $filename;
            $request->coverimg->move('public/media', $filename);
        }
        $item->status=$request->status;
        $item->iduser=Auth::user()->id;
        $item->save();
        return true;
    }
    public function updateShow($id)
    {
        $item=postModel::find($id);
        return $item;
    }
    public function updateItem(Request $request, $id)
    {
        $item=postModel::find($id);
        $item->title=$request->title;
        $item->tag=$request->tag;
        $item->description=$request->description;
        $item->contents=$request->contents;
        if ($request->hasFile('coverimg')) {
            $filename = $request->coverimg->getClientOriginalName();
            $item->coverimg = $filename;
            $request->coverimg->move('public/media', $filename);
            //$request->coverimg->storeAs('media',$filename);
        }
        $item->status=$request->status;
        $item->iduser=Auth::user()->id;
        $item->save();
        return true;
    }
    public function deleteItem($id)
    {
        $item=postModel::find($id);
        $item->delete();
        return true;
    }
    public function statistics()
    {
        $item=DB::table('posts')->join('comments', 'posts.id', '=', 'comments.idpost')->groupBy('posts.created_at')->select('posts.created_at', DB::raw("count(posts.id) as count"),DB::raw('SUM(comments.id) as totalComment'))->get();
        return $item;
    }
    public function filterDate($ondate,$enddate)
    {
        $item=DB::table('posts')->join('comments', 'posts.id', '=', 'comments.idpost') ->whereBetween('posts.created_at', [$ondate,$enddate])->groupBy('posts.created_at')->select('posts.created_at', DB::raw("count(posts.id) as count"),DB::raw('SUM(comments.id) as totalComment'))->get();
        return $item;
    }
}
