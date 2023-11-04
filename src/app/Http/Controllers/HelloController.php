<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
        $msg = 'hello';
            return view('hello.index', ['msg' => $msg]);
    }
}
