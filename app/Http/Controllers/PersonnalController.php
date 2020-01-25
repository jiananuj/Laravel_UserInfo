<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\PersInfo;
use App\User;
use Auth;


class PersonnalController extends Controller
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
        // $persInfo =  PersInfo::where('user_id','=',$userId);
        // //return view('pages.personnal.personnal')->with('persInfo',$persInfo);
        // //return $persInfo;

        // if(auth()->user()->id != $persInfo->user_id){
        //     return redirect('/home')->with('error','Unauthorized page');
        // }
        // return view('pages.personnal.personnal')->with('persInfo',$persInfo);

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
        //$persInfo =  PersInfo::find($id);
        $persInfo =  PersInfo::where('user_id',$id)->first();


        if($persInfo==null){
            return redirect('/')->with('error','User Id does not exist...');
        }

        //check for correct user
        if(auth()->user()->id != $persInfo->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }
        //return view('pages.personnal.personnal')->with('persInfo',$persInfo);
        return redirect('/home');
        //return response()->json($persInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $persInfo =  PersInfo::where('user_id',$id)->first();
        
        if($persInfo==null){
            return redirect('/')->with('error','User Id does not exist...');
        }
        

        //check for correct user
        if(auth()->user()->id != $persInfo->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }
    
        
        return view('pages.personnal.edit')->with('persInfo',$persInfo);
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
            'about' => 'required',
            'gender' => 'required',
            'profile_image' =>'image|nullable|max:1999',
            'prof_img' => 'nullable',
            'dob' => 'required',
        ]);

        $prof_img = $request->get('prof_img');

        //Handle file upload
        if($request->hasFile('profile_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('profile_image')->storeAs('public/profile_images',$fileNameToStore);
        }else{
            $fileNameToStore = $prof_img;
        }

        //update Post
        $persInfo = PersInfo::find($id);
        if(auth()->user()->id != $persInfo->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }

        $persInfo->about = $request->input('about');
        $persInfo->gender = $request->input('gender');
        $persInfo->profile_image = $fileNameToStore;
        $persInfo->dob = $request->input('dob');
        $persInfo->save();

        //return redirect('/home')->with('success','Personnal Info Updated');
        //return response()->json($persInfo);

        return redirect("/personnal/$persInfo->user_id");
        //echo $persInfo;
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
