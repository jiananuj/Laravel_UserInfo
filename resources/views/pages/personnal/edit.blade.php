@extends('layouts.app')

@section('content')
<h1>Edit PersInfo</h1>

{!! Form::open(['action' => ['PersonnalController@update',$persInfo->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class = "form-group">
        {{Form::label('about','About')}}
        {{Form::textarea('about',$persInfo->about,['class'=>'form-control' , 'placeholder'=>'about'])}}
    </div>

    <div class="form-group">
        {{Form::label('profileImage','Profile Image')}}
        {{Form::file('profile_image')}}
        <input type="hidden" name ="prof_img" value="{{$persInfo->profile_image}}">
    </div>

    <div class = "form-group">
        {{Form::label('dob','DOB')}}
        {{ Form::date('dob', $persInfo->dob, ['class' => 'form-control']) }}
    </div>

    <div class = "form-group">
        {{Form::label('gender','Gender')}} <br>
        {{Form::label('male','Male')}} {{Form::radio('gender','Male',false)}}
        {{Form::label('female','Female')}} {{Form::radio('gender','Female',false)}}
    </div>

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

    
@endsection