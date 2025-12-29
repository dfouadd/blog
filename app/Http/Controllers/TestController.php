<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function firstAction(){
        $localname = "Dina";
        $books=["React", "Laravel","MySQL"];
        return view('test', ["name"=>$localname, "books"=>$books]);

    }
}
