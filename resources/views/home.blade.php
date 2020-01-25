@extends('layouts.app')

@section('content')


<div class="wrapper ">
    <div class="left">
      <div class="container">
        <img style="width:100%;" src="/storage/profile_images/{{$persInfo->profile_image}}">
      </div>
      
        <h4>{{$user->fname}} {{$user->lname}}</h4>
         <p>{{$persInfo->about}}</p>
         <p>Gender: {{$persInfo->gender}}</p>
         <p>DOB: {{$persInfo->dob}}</p>
         <a class="btn btn-primary btn-lg" href="/personnal/{{$persInfo->user_id}}/edit" role="button">Edit Personnel Info</a> <br> <br>

    </div>
    <div class="right">
        <div class="info">
            <h3>Professional Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Qualification</h4>
                    <p>{{$profInfo->qualification}}</p>
                 </div>
                 <div class="data">
                   <h4>Year Of Passing</h4>
                    <p>{{$profInfo->year_of_passing}}</p>
                  </div> 
                  
            </div>
            <div class="info_data">

                  <div class="data">
                    <h4>Work Designation</h4>
                    <p>{{$profInfo->work_desig}}</p>
                 </div> 
            </div>
            <div class="info_data">
                 
                 <div class="data">
                   <h4>Company</h4>
                    <p>{{$profInfo->company}}</p>
                  </div>
                  <div class="data">
                    <h4>From </h4>
                     <p>{{$profInfo->from_year}}</p>
                   </div>
                   <div class="data">
                    <h4>To </h4>
                     <p>{{$profInfo->to_year}}</p>
                   </div>
            </div>

            <div class="info_data">
              <div class="data">
                <a class="btn btn-primary btn-lg" href="/professional/{{$profInfo->user_id}}/edit" role="button">Edit Professional/Qualific Info</a>
              </div> 
            </div>
        </div>

        <br><hr>
      
      <div class="info">
            <h3>Business Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Company</h4>
                    <p>{{$businessInfo->company}}</p>
                 </div>
                 <div class="data">
                    <h4>GSTIN</h4>
                    <p>{{$businessInfo->gst}}</p>
                </div>
            </div>

            <div class="info_data">
              <div class="data">
                 <h4>PAN</h4>
                 <p>{{$businessInfo->pan}}</p>
              </div>
              <div class="data">
                <img src="/storage/pan_images/{{$businessInfo->pan_image}}">
              </div>
            </div>

            <div class="info_data">
              <div class="data">
                <a class="btn btn-primary btn-lg" href="/business/{{$businessInfo->user_id}}/edit" role="button">Edit Business Info</a>
              </div> 
            </div>
      </div>

      <br><hr>

      <div class="info">
        <h3>Address</h3>
        <div class="info_data">
             <div class="data">
                <h4>Address</h4>
                <p>{{$address->address}}</p>
             </div>
        </div>

        <div class="info_data">
          <div class="data">
             <h4>Landmark</h4>
             <p>{{$address->landmark}}</p>
          </div>
        </div>

        <div class="info_data">
          <div class="data">
             <h4>City</h4>
             <p>{{$address->city}}</p>
          </div>
        </div>

        <div class="info_data">
          <div class="data">
             <h4>Country</h4>
             <p>{{$address->country}}</p>
          </div>
        </div>

        <div class="info_data">
          <div class="data">
             <h4>Pin Code</h4>
             <p>{{$address->pin}}</p>
          </div>
        </div>

        <div class="info_data">
          <div class="data">
            <a class="btn btn-primary btn-lg" href="/address/{{$address->user_id}}/edit" role="button">Edit Address</a>
          </div> 
        </div>
  </div>
      
        
    </div>
</div>

@endsection
