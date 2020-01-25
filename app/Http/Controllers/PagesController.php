<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
    
    }

    public function index(){

        
        if(!Auth::guest())
        {
            $date = auth()->user()->email_verified_at;
            if($date==null){
                return redirect('/home');
            }
        }
        
        return view('pages.index');
    }

    
}