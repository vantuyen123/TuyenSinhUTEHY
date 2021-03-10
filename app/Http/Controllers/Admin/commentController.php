<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\commentModel;
use Illuminate\Http\Request;

class commentController extends Controller
{
    //
    private $comment;
    public function __construct()
    {
        $this->comment=new commentModel();
    }
    public function deleteItem($id)
    {
        $this->comment->deleteItem($id);
        return back();
    }
}
