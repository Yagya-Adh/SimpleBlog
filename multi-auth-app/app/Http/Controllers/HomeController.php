<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function index()
    {

        if (Auth::id()) {

            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {

                return view('dashboard');
            } elseif ($usertype == 'admin') {

                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        }
    }



    public function post()
    {
        return view("post");
    }
}
