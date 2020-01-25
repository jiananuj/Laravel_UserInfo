<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Address;
use App\User;
use Auth;


class AddressController extends Controller
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
        //$address =  address::find($id);
        $address =  Address::where('user_id',$id)->first();

        if($address==null){
            return redirect('/')->with('error','User Id does not exist...');
        }

        //check for correct user
        if(auth()->user()->id != $address->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }
        //return view('pages.personnal.personnal')->with('address',$address);
        return redirect('/home');
        //return response()->json($address);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $address =  Address::where('user_id',$id)->first();
        
        if($address==null){
            return redirect('/')->with('error','User Id does not exist...');
        }
        

        //check for correct user
        if(auth()->user()->id != $address->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }
    
        
        return view('pages.address.edit')->with('address',$address);
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
            'address' => 'required',
            'landmark' => 'required',
            'city' => 'required',
            'country' => 'required',
            'pin' => 'required',
        ]);

        //update Post
        $address = Address::find($id);
        if(auth()->user()->id != $address->user_id){
            return redirect('/')->with('error','Unauthorized page');
        }

        $address->address = $request->input('address');
        $address->landmark = $request->input('landmark');
        $address->city = $request->input('city');
        $address->country = $request->input('country');
        $address->pin = $request->input('pin');
        $address->save();

        //return redirect('/home')->with('success','Personnal Info Updated');
        //return response()->json($address);

        return redirect("/address/$address->user_id");
        //echo $address;
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
