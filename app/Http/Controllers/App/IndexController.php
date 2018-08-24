<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
    	$pdo = DB::connection()->getPdo();

    	dd($pdo);
    }
}
