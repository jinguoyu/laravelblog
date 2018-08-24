<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\Article;
class IndexController extends CommonController
{
    public function index()
    {

    	$news =Article::count();
    	return view('admin\index',compact('news'));
    }
    
}
