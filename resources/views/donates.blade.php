@extends('layouts.main')

@section('title')
<title>المتبرعين</title>

<style>

#but button:hover::before {
  content: attr(for);
  font-family: Roboto, -apple-system, sans-serif;
  text-transform: capitalize;
  font-size: 20px;
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  opacity: 0.75;
  background-color: #323232;
  color: #fff;  
  padding: 4px;
  border-radius: 3px;
  display: block;
}

</style>

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
               <p style="text-align: center; font-size: 20px;">قائمة الاشخاص المتوفرين لتبرع لاتتردد في التواصل معهم</p>
             <a data-toggle="modal" href="#new_donates" class="btn btn-sm btn-center btn-danger" style="font-size: 18px;">إضافة متبرع جديد <i class="fas fa-plus"></i></a>         
           </div>

           <div class="row">
            <div class="col-12 col-sm-6">
            <form method="post" id="myForm" action="{{route('donatefilter')}}">
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
            <form method="post" action="{{route('donatesearch')}}">
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


                     <a style="font-size: 18px; float: left;" data-toggle="modal" href="#donate_review" onclick="getid({{$donate->id}})" class="btn btn-sm btn-danger">تقييم <i class="fas fa-star"></i></a>

                     <a style="font-size: 18px;" href="tel:{{$donate->phone}}" class="btn btn-sm btn-danger">اتصال <i class="fas fa-phone"></i></a>
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
     
     
     
     

										<div class="modal fade" id="new_donates" aria-hidden="true" role="dialog">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header" >
														<h5 class="modal-title" style="font-family: 'Amiri'; font-size: 20px;">متبرع جديد</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
													</div>
													<div class="modal-body">
														<form action="{{route('savedonate')}}" method="post">
														@csrf
															<div class="row form-row">
																<div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label >الاسم</label>
																		<input style="direction: rtl;" type="text" name="name" value="{{$Cookie['name']}}" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال اسم المتجر')" oninput="this.setCustomValidity('')"> 
																		</div>
																</div>
																<div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right;font-family: 'Amiri';">
																		<label>الفصيلة</label>
                                                                        <select class="form-control" style="direction: rtl;" name="type" id="shipping_type">
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
																</div>

																<div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label>المدينة</label>
																		<input style="direction: rtl;" type="text" name="city" value="{{$Cookie['city']}}" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال المدينة')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>

																<div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label>العنوان</label>
																		<input style="direction: rtl;" type="text" name="address" value="{{$Cookie['address']}}" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال العنوان')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>

																<div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label>رقم الهاتف</label>
																		<input style="direction: rtl;" onkeypress="return onlyNumberKey(event)" value="{{$Cookie['phone']}}" minlength="10" type="text" name="phone" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال رقم الهاتف')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>
                                                            
																<div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label>رقم البطاقة الشخصية</label>
																		<input style="direction: rtl;" onkeypress="return onlyNumberKey(event)" minlength="6" value="{{$Cookie['identity']}}" type="text" name="identity" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال رقم البطاقة الشخصية')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>


															</div>
															<button type="submit" style="font-family: 'Amiri';" class="btn btn-primary btn-block">حفظ بيانات المتبرع</button>
														</form>
													</div>
												</div>
											</div>
										</div>




										<div class="modal fade" id="donate_review" aria-hidden="true" role="dialog">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header" >
														<h5 class="modal-title" style="font-family: 'Amiri'; font-size: 20px;">تقييم المتبرع</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
													</div>
													<div class="modal-body">
														<form action="{{route('review_donate')}}" method="post" id="reviewform">
														@csrf
															<div class="row form-row"  style="float: center !important;">

                                                            <input id="id" type="hidden" name="id">
                                                            <input id="review" type="hidden" name="review">

																<!-- <div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right;font-family: 'Amiri';">
																		<label>الفصيلة</label>

																		</div>
																</div> -->


                                                                <div id="but" class="container center " style="float: center !important;">
                                                                <button for="المعاملة سيئة" style="font-family: 'Amiri'; outline:none; padding: 0px 10px; font-size: 28px; text-decoration:none; color: grey; background: none; border: none;" type="submit" onclick="sub(0)" onMouseOver="this.style.color='gold'" onMouseOut="this.style.color='grey'"><i class="fas fa-star"></i></button>
                                                                <button for="المعاملة مقبولة" style="font-family: 'Amiri';outline:none; padding: 0px 10px; font-size: 28px; text-decoration:none; color: grey; background: none; border: none;" type="submit" onclick="sub(25)" onMouseOver="this.style.color='gold'" onMouseOut="this.style.color='grey'"><i class="fas fa-star"></i></button>
                                                                <button for="المعاملة جيدة" style="font-family: 'Amiri';outline:none; padding: 0px 10px; font-size: 28px; text-decoration:none; color: grey; background: none; border: none;" type="submit" onclick="sub(50)" onMouseOver="this.style.color='gold'" onMouseOut="this.style.color='grey'"><i class="fas fa-star"></i></button>
                                                                <button for="المعاملة جيدة جدآ" style="font-family: 'Amiri';outline:none; padding: 0px 10px; font-size: 28px; text-decoration:none; color: grey;  background: none; border: none;" type="submit" onclick="sub(75)" onMouseOver="this.style.color='gold'" onMouseOut="this.style.color='grey'"><i class="fas fa-star"></i></button>
                                                                <button for="المعاملة ممتازة" style="font-family: 'Amiri';outline:none; padding: 0px 10px; font-size: 28px; text-decoration:none; color: grey; background: none; border: none;" type="submit" onclick="sub(100)" onMouseOver="this.style.color='gold'" onMouseOut="this.style.color='grey'"><i class="fas fa-star"></i></button>
                                                            </div> 

															</div>

														</form>
													</div>
												</div>
											</div>
										</div>




                                        @endsection

                                        @section('js')

<script>

function getid(id){
        document.getElementById("id").value = id;
    }

    function sub(rev){
        document.getElementById("review").value = rev;
        document.getElementById("reviewform").submit(); 
    }
</script>

@endsection
