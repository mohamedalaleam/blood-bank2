@extends('layouts.main')

@section('title')
<title>العينات الجاهزة</title>
@endsection

@section('content')


     <!-- ################# Donation Process Start Here #######################-->
     
     <section id="process" class="donation-care" style="background: #f1f1f145; padding: 100px 0px;">
         <div class="container">

         @if (session('success'))
                <div id="hide" style="font-size: 18px; text-align: center; font-family: 'Amiri';" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

          <div class="row session-title">
              <h2 style="font-size: 35px;">العينات الجاهزة </h2>
              <p style="text-align: center; font-size: 20px;">قائمة العينات الجاهزة المتوفرة الذي يمكنك الحصول عليها</p>

          </div>

          <div class="row">
          <div class="col-12 col-sm-6">
            <form method="post" id="myForm" action="{{route('samplefilter')}}">
                @csrf
                <div class="form-group" style="text-align: right;font-family: 'Amiri';">
                    <select class="form-control" onchange="this.form.submit()" style="direction: rtl;" name="type" id="shipping_type">
                    <option value="">أختار الفصيلة</option>
                    <option value="all">الكل</option>
                        <option value="1">O+</option>
                        <option value="2">A+</option>
                       <option value="3">O-</option>
                       <option value="4">A-</option>
                       <option value="5">B+</option>
                       <option value="6">B-</option>
                       <option value="7">BA+</option>
                       <option value="8">BA-</option>
                    </select>
                    </div>
                    </form>

            </div>


            <div class="col-12 col-sm-6">
            <form method="post" action="{{route('samplesearch')}}">
                @csrf
                <div class="form-group" style="text-align: right; font-family: 'Amiri';">
                    <input style="direction: rtl;" type="text" name="search" placeholder="بحث عن طريق المدينة او العنوان" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال المدينة او العنوان')" oninput="this.setCustomValidity('')"> 
                    </div>
                    </form>
            </div>

           </div>

           <div class="row"  style="text-align: right;">

           @foreach($samples as $sample)
                <div class="col-md-3 col-sm-6 vd">
                   <div class="bkjiu">
                    <img src="{{asset('assets/images/gallery/g9.jpg')}}" alt="">
                    <h4><b style="float: left !important; font-size: 18px;">{{$sample->created_at->diffForHumans()}}</b>{{$sample->bloodtype->blood_type}} :: فصيلة الدم</h4>

                    @if($sample->bloodtype->giveto->count() > 0)
                     <p style="text-align: right; font-size: 18px;"><b> 
                     @foreach($sample->bloodtype->giveto as $blood)
                        {{$blood->bloodtype->blood_type}}  
                     @endforeach
                     :: تعطي الي 
                    </b></p>
                    @endif

                    <p style="text-align: right; font-size: 18px;"><b>الكمية :: {{$sample->quantity}}</b></p>
                    <p style="text-align: right; font-size: 18px;"><b>المدينة :: {{$sample->city}}</b></p>
                    <p style="text-align: right; font-size: 18px;"><b>العنوان :: {{$sample->address}}</b></p>
                    <a class="btn btn-sm btn-danger" href="tel:{{$sample->phone}}" style="font-size: 18px;">اتصال <i class="fas fa-phone"></i></a>
                    </div>
                </div>
                @endforeach
                @if(count($samples) == 0)
                 <div class="row text-center">
               <h2 style="font-size: 35px; text-align: center !important;">لايوجد عينات جاهزة</h2>
           </div>
                 @endif

           </div>
            

         </div>
     </section>
     
     
    

                                        @endsection