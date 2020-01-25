@extends('layouts.app')

@section('content')
<h1>Edit PersInfo</h1>

{!! Form::open(['action' => ['BusinessController@update',$businessInfo->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class = "form-group">
        {{Form::label('company','Company')}}
        {{Form::text('company',$businessInfo->company,['class'=>'form-control' , 'placeholder'=>'Company'])}}
    </div>

    <div class = "form-group">
        {{Form::label('gst','Gst Number')}}
        {{Form::text('gst',$businessInfo->gst,['class'=>'form-control' , 'placeholder'=>'Gst Number'])}}
    </div>

    <div class = "form-group">
        {{Form::label('pan','Pan Number')}}
        {{Form::text('pan',$businessInfo->pan,['class'=>'form-control' , 'placeholder'=>'Pan Number'])}}
    </div>

    <div class="form-group">
        {{Form::label('panImage','Pan Image')}}
        {{Form::file('pan_image')}}
        <input type="hidden" name ="pan_img" value="{{$businessInfo->pan_image}}">
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

    
@endsection