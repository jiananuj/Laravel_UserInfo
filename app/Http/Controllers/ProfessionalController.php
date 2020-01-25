<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\ProfInfo;
use App\User;
use Auth;


class ProfessionalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userId = Auth::user()->id;
        // $profInfo =  ProfInfo::where('user_id','=',$userId);
        // //return view('pages.personnal.personnal')->with('profInfo',$profInfo);
        // //return $profInfo;

        // if(auth()->user()->id != $profInfo->user_id){
        //     return redirect('/home')->with('error','Unauthorized page');
        // }
        // return view('pages.personnal.personnal')->with('profInfo',$profInfo);
        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$profInfo =  ProfInfo::find($id);
        $profInfo =  ProfInfo::where('user_id',$id)->first();

        if($profInfo==null){
            return redirect('/')->with('error','User Id does not exist...');
        }


        //check for correct user
        if(auth()->user()->id != $profInfo->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }
        //return view('pages.personnal.personnal')->with('profInfo',$profInfo);
        return redirect('/home');
        //return response()->json($profInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $profInfo =  ProfInfo::where('user_id',$id)->first();
        
        if($profInfo==null){
            return redirect('/')->with('error','User Id does not exist...');
        }
        

        //check for correct user
        if(auth()->user()->id != $profInfo->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }
    
        
        return view('pages.professional.edit')->with('profInfo',$profInfo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'qualification' => 'required',
            'yearOfPassing' => 'required',
            'workDesig' => 'required',
            'company' => 'required',
            'fromYear' => 'required',
            'toYear' => 'required',
        ]);

        //update Post
        $profInfo = ProfInfo::find($id);
        if(auth()->user()->id != $profInfo->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }

        $profInfo->qualification = $request->input('qualification');
        $profInfo->year_of_passing = $request->input('yearOfPassing');
        $profInfo->work_desig = $request->input('workDesig');
        $profInfo->company = $request->input('company');
        $profInfo->from_year = $request->input('fromYear');
        $profInfo->to_year = $request->input('toYear');
        $profInfo->save();

        //return redirect('/home')->with('success','Personnal Info Updated');
        //return response()->json($profInfo);

        return redirect("/professional/$profInfo->user_id");
        //echo $profInfo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
