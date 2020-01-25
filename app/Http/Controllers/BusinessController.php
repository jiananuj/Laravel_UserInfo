<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\BusinessInfo;
use App\User;
use Auth;


class BusinessController extends Controller
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
        //$businessInfo =  businessInfo::find($id);
        $businessInfo =  BusinessInfo::where('user_id',$id)->first();

        if($businessInfo==null){
            return redirect('/')->with('error','User Id does not exist...');
        }

        //check for correct user
        if(auth()->user()->id != $businessInfo->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }
        //return view('pages.personnal.personnal')->with('businessInfo',$businessInfo);
        return redirect('/home');
        //return response()->json($businessInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $businessInfo =  BusinessInfo::where('user_id',$id)->first();
        
        if($businessInfo==null){
            return redirect('/')->with('error','User Id does not exist...');
        }
        

        //check for correct user
        if(auth()->user()->id != $businessInfo->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }
    
        
        return view('pages.business.edit')->with('businessInfo',$businessInfo);
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
            'company' => 'required',
            'gst' => 'required',
            'pan' => 'required',
            'pan_image' =>'image|nullable|max:1999',
            'pan_img' => 'nullable',
        ]);

        $pan_img = $request->get('pan_img');

        //Handle file upload
        if($request->hasFile('pan_image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('pan_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //get just extension
            $extension = $request->file('pan_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('pan_image')->storeAs('public/pan_images',$fileNameToStore);
        }else{
            $fileNameToStore = $pan_img;
        }

        //update Post
        $businessInfo = BusinessInfo::find($id);
        if(auth()->user()->id != $businessInfo->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }

        $businessInfo->company = $request->input('company');
        $businessInfo->gst = $request->input('gst');
        $businessInfo->pan_image = $fileNameToStore;
        $businessInfo->pan = $request->input('pan');
        $businessInfo->save();

        //return redirect('/home')->with('success','Personnal Info Updated');
        //return response()->json($businessInfo);

        return redirect("/business/$businessInfo->user_id");
        //echo $businessInfo;
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
