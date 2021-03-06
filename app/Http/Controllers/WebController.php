<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Web;
use DB;

class WebController extends Controller
{
    public function home()
    {
        //Get homepage
        return view('home');
    }
    public function aboutUs()
    {
        //Get homepage
        return view('aboutUs');
    }
    public function service()
    {
        //Get homepage
        return view('service');
    }
    public function contact()
    {
        //Get contact information
        $information    = DB::table('general')->get();
        return view('contact', compact('information'));
    }
}
