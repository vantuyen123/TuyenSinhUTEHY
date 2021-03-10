<?php

namespace App\Http\Controllers\FrontEnd;

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
    public function addItem(Request $request)
    {
        $this->comment->addItem($request);
        return back();
    }
}
