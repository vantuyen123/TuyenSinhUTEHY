<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use storage;
use DB;
use Illuminate\Database\Seeder;
class userModel extends Model
{
    //
    protected $table='users';
    protected $fillable=[
        'email','pass',
    ];
    public function listall()
    {
        $item=userModel::all();
        return $item;
    }
    public function addItem(Request $request)
    {
        $item=new userModel();
        if($request->hasFile('img'))
        {
            $filename=$request->img->getClientOriginalName();
            $item->img=$filename;
            $request->img->storeAs('media',$filename);
        }
        $item->username=$request->username;
        $item->password=bcrypt($request->password)  ;
        $item->phone=$request->phone;
        $item->status=$request->status;
        $item->email=$request->email;
        $item->describe=$request->describe;
        $item->lever=isset($request->lever)?$request->lever:'2';
        $item->save();
        return true;
    }
    public function checkUser(Request $request)
    {
        $item = DB::table('users')->where('email','=',$request->email)->where('pass','=',$request->pass)->get();
        if($item==null)
        {
            return false;
        }
        return true;
    }
    public function updateShow($id)
    {
        $item=userModel::find($id);
        return $item;
    }
    public function updateItem(Request $request,$id)
    {
        $item=userModel::find($id);
        $item->username=$request->username;
        $item->password=Hash::make($request->password);
        $item->phone=$request->phone;
        $item->status=$request->status;
        $item->email=$request->email;
        $item->describe=$request->describe;
        $item->lever=isset($request->lever)?$request->lever:'2';
        if($request->hasFile('img'))
        {
            $filename=$request->img->getClientOriginalName();
            $item->img=$filename;
            $request->img->storeAs('media',$filename);
        }
        $item->save();
        return true;
    }
    public function deleteItem($id)
    {
        $item=userModel::find($id);
        $item->delete();
        return true;
    }
}
