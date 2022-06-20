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

            
         </div>
     </section>
     
     
@endsection