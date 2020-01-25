<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PersInfo;
use App\User;
use Auth;


class ApiController extends Controller
{
    public function show(){
        $persInfo = PersInfo::all();
        return response()->json($persInfo);
    }

    public function update(Request $request, $id){
        
        //$userId = Auth::user()->id;
        //$persInfo =  PersInfo::where('user_id',$userId)->first();
        $persInfo = PersInfo::find($id);


        $persInfo->about = $request->input('about');
        $persInfo->gender = $request->input('gender');
        $persInfo->dob = $request->input('dob');
        $persInfo->save();

        return response()->json($persInfo);
    }
}
