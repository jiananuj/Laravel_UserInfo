<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);

        $persInfo = $user->pers_infos;
        $profInfo = $user->prof_infos;
        $businessInfo = $user->business_infos;
        $address = $user->addresses;

        //return view('home')->with('persInfo',$user->pers_infos);

        return view('home', compact('user','persInfo','profInfo','businessInfo','address'));
    }
}
