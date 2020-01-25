@extends('layouts.app')

@section('content')
<h1>Edit Address Info</h1>

{!! Form::open(['action' => ['AddressController@update',$address->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class = "form-group">
        {{Form::label('address','Address')}}
        {{Form::textarea('address',$address->address,['class'=>'form-control' , 'placeholder'=>'Address'])}}
    </div>

    <div class = "form-group">
        {{Form::label('landmark','Landmark')}}
        {{Form::text('landmark',$address->landmark,['class'=>'form-control' , 'placeholder'=>'Landmark'])}}
    </div>

    <div class = "form-group">
        {{Form::label('city','City')}}
        {{Form::text('city',$address->city,['class'=>'form-control' , 'placeholder'=>'City'])}}
    </div>

    <div class = "form-group">
        {{Form::label('country','Country')}}
        {{Form::text('country',$address->country,['class'=>'form-control' , 'placeholder'=>'Country'])}}
    </div>

    <div class = "form-group">
        {{Form::label('pin','Pin')}}
        {{Form::text('pin',$address->pin,['class'=>'form-control' , 'placeholder'=>'pin'])}}
    </div>



    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

    
@endsection