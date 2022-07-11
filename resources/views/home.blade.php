@extends('layouts.admin')

@section('title')
<title>Admin Home</title>
@endsection

@section('content')
        
    
     
     <section id="process" class="donation-care" style="background: #f1f1f145; padding: 150px 0px;">
         <div class="container">

         @if ($errors->any())
    <div class="alert alert-danger" style="margin-bottom: 20px;">
        <ul style="text-align: center; color: darkred; list-style-type: none; font-size: 20px; font-family: 'Amiri';">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

           <div class="row session-title">
               <h2 style="font-size: 35px;"> {{Auth::user()->name}} مرحبآ بالمدير</h2>
           </div>

            
           <div class="row" style="float: center !important;">

          
  <div class="card text-center col-3 p-2">
    <a href="{{route('donatesAdmin')}}">
    <div class="card-body">
      <h5 class="card-title">عدد المتبرعين</h5>
      <p class="card-text" style="font-size: 25px; text-align: center; color: red;">{{$donates}}</p>
      <p class="card-text" style="font-size: 18px; text-align: center;"><small class="text-muted">إحصائية خاصة بعدد المتبرعين</small></p>
    </div>
</a>
  </div>

  <div class="card text-center col-3 p-2">
  <a href="{{route('samplesAdmin')}}">
    <div class="card-body">
      <h5 class="card-title">عدد العينات الجاهزة</h5>
      <p class="card-text" style="font-size: 25px; text-align: center; color: red;">{{$samples}}</p>
      <p class="card-text"  style="font-size: 18px; text-align: center;"><small class="text-muted">إحصائية خاصة بعدد العينات الجاهزة</small></p>
    </div></a>
  </div>


  <div class="card text-center col-3 p-2">
  <a href="{{route('requestsAdmin')}}">
    <div class="card-body">
      <h5 class="card-title">عدد الطلبات</h5>
      <p class="card-text" style="font-size: 25px; text-align: center; color: red;">{{$requests}}</p>
      <p class="card-text" style="font-size: 18px; text-align: center;"><small class="text-muted">إحصائية خاصة بعدد الطلبات</small></p>
    </div></a>
  </div>


  <div class="card text-center col-3 p-2">
  <a href="{{route('contactAdmin')}}">
    <div class="card-body">
      <h5 class="card-title">عدد التواصل</h5>
      <p class="card-text" style="font-size: 25px; text-align: center; color: red;">{{$contact}}</p>
      <p class="card-text" style="font-size: 18px; text-align: center;"><small class="text-muted">إحصائية خاصة بعدد رسائل التواصل</small></p>
    </div></a>
  </div>



</div>


         </div>
     </section>
     
     
@endsection