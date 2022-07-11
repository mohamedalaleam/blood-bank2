@extends('layouts.admin')

@section('title')
<title>Admin Donates</title>
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
               <h2 style="font-size: 35px;">المتبرعين</h2>
               <p style="text-align: center; font-size: 20px;">قائمة الاشخاص المتوفرين لتبرع الذي يمكنك التحكم فهم</p>
           </div>

           <div class="row">
            <div class="col-12 col-sm-6">
            <form method="post" id="myForm" action="{{route('Admindonatefilter')}}">
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
            <form method="post" action="{{route('Admindonatesearch')}}">
                @csrf
                <div class="form-group" style="text-align: right; font-family: 'Amiri';">
                    <input style="direction: rtl;" type="text" name="search" placeholder="بحث عن طريق المدينة او العنوان" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال المدينة او العنوان')" oninput="this.setCustomValidity('')"> 
                    </div>
                    </form>
            </div>

            
           </div>

            <div class="row"  style="text-align: right;">

            
            @foreach($donates as $donate)
                 <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu" style="background: white;">
                     <img src="{{asset('assets/images/gallery/g3.jpg')}}" alt="">
                     <h4 style=" font-size: 18px;"><b></b>{{$donate->name}}</h4>
                     <p style="text-align: right; font-size: 18px;"><b>{{$donate->bloodtype->blood_type}} :: فصيلة الدم</b></p>

                     @if($donate->bloodtype->giveto->count() > 0)
                     <p style="text-align: right; font-size: 18px;"><b> 
                     @foreach($donate->bloodtype->giveto as $blood)
                        {{$blood->bloodtype->blood_type}}  
                     @endforeach
                     :: تعطي الي 
                    </b></p>
                    @endif

                    <p style="text-align: right; font-size: 18px;"><b>البطاقة الشخصية :: {{$donate->identity}}</b></p>
                    <p style="text-align: right; font-size: 18px;"><b>المدينة :: {{$donate->city}}</b></p>
                     <p style="text-align: right; font-size: 18px;"><b>العنوان :: {{$donate->address}}</b></p>


                     @if($donate->reviews()->count() > 0)

<div class="container center pb-2" style="float: center !important;">
@if($donate->reviews()->avg('review') >= 0)
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; outline:none; color: gold; background: none; border: none;"><i class="fas fa-star"></i></button>
@else
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; color: grey;outline:none; background: none; border: none;"><i class="fas fa-star"></i></button>
@endif

@if($donate->reviews()->avg('review') >= 25)
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; color: gold;outline:none; background: none; border: none;"><i class="fas fa-star"></i></button>
@else
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; color: grey;outline:none; background: none; border: none;"><i class="fas fa-star"></i></button>
@endif

@if($donate->reviews()->avg('review') >= 50)
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; color: gold;outline:none; background: none; border: none;"><i class="fas fa-star"></i></button>
@else
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; color: grey;outline:none; background: none; border: none;"><i class="fas fa-star"></i></button>
@endif

@if($donate->reviews()->avg('review') >= 75)
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; color: gold;outline:none; background: none; border: none;"><i class="fas fa-star"></i></button>
@else
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; color: grey;outline:none; background: none; border: none;"><i class="fas fa-star"></i></button>
@endif

@if($donate->reviews()->avg('review') >= 100)
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; color: gold;outline:none; background: none; border: none;"><i class="fas fa-star"></i></button>
@else
    <button style="font-family: 'Amiri'; text-align: center; font-size: 28px; color: grey;outline:none; background: none; border: none;"><i class="fas fa-star"></i></button>
@endif


</div> 
@endif



                     <form action="{{route('adminDeleteDonates',['id'=>$donate->id])}}" method="post" id="delete_donate">
    @csrf 
    @method('DELETE')

    <input class="btn btn-sm btn-left btn-danger" style="float: left; font-size: 18px;" value="حذف" type="submit">

    <a style="font-size: 18px;" href="tel:{{$donate->phone}}" class="btn btn-sm btn-danger">اتصال <i class="fas fa-phone"></i></a>

</form>
                     

                   </div>
                 </div>

                 @endforeach
                 @if(count($donates) == 0)
                 <div class="row text-center">
               <h2 style="font-size: 35px; text-align: center !important;">لايوجد متبرعين</h2>
           </div>
                 @endif

            </div>
            

         </div>
     </section>
     
     
@endsection
