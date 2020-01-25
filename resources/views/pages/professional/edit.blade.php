@extends('layouts.app')

@section('content')
<h1>Edit Professional Info</h1>

{!! Form::open(['action' => ['ProfessionalController@update',$profInfo->id], 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class = "form-group">
        {{Form::label('qualification','Qualification')}}
        {{Form::text('qualification',$profInfo->qualification,['class'=>'form-control' , 'placeholder'=>'Highest Qualification'])}}
    </div>

    <div class="form-group">
        {{Form::label('yearOfPassing','Year Of Passing')}}
        {{-- {{Form::text('yearOfPassing',$profInfo->year_of_passing,['class'=>'form-control' , 'placeholder'=>'Highest Qualification'])}} --}}
        {{Form::selectYear('yearOfPassing', 1950, 2022,$profInfo->year_of_passing)}}
    </div>

    <div class = "form-group">
        {{Form::label('workDesig','Work Designation')}}
        {{Form::text('workDesig',$profInfo->work_desig,['class'=>'form-control' , 'placeholder'=>'Work Designation'])}}
    </div>

    <div class = "form-group">
        {{Form::label('company','Company')}}
        {{Form::text('company',$profInfo->company,['class'=>'form-control' , 'placeholder'=>'Company'])}}
    </div>

    <div class="form-group">
        {{Form::label('fromYear','From Year')}}
        {{Form::selectYear('fromYear', 1950, 2020,$profInfo->from_year)}}
    </div>

    <div class="form-group">
        {{Form::label('toYear','To Year')}}
        {{Form::selectYear('toYear', 1950, 2020,$profInfo->to_year)}}
    </div>



    

    {{Form::hidden('_method','PUT')}}
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
{!! Form::close() !!}

    
@endsection