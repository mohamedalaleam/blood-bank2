@extends('layouts.main')

@section('title')
<title>الطلبات</title>
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
              <h2 style="font-size: 35px;">الطلبات</h2>
              <p style="text-align: center; font-size: 20px;">قائمة الدم المطلوبة لاتتردد في المساعدة ادا يمكنك </p>
             <a data-toggle="modal" href="#new_request" class="btn btn-sm btn-center btn-danger" style="font-size: 18px;">إضافة طلب جديد <i class="fas fa-plus"></i></a>         
         
          </div>
          

          <div class="row">
          <div class="col-12 col-sm-6">
            <form method="post" id="myForm" action="{{route('requestfilter')}}">
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
            <form method="post" action="{{route('requestsearch')}}">
                @csrf
                <div class="form-group" style="text-align: right; font-family: 'Amiri';">
                    <input style="direction: rtl;" type="text" name="search" placeholder="بحث عن طريق المدينة او العنوان" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال المدينة او العنوان')" oninput="this.setCustomValidity('')"> 
                    </div>
                    </form>
            </div>


           </div>

           <div class="row"  style="text-align: right;">

           @foreach($requests as $request)

                <div class="col-md-3 col-sm-6 vd">
                   <div class="bkjiu"  style="background: white;">
                    <img src="{{asset('assets/images/gallery/g10.jpg')}}" alt="">
                    <h4><b style="float: left !important;font-size: 18px;">{{$request->created_at->diffForHumans()}}</b>{{$request->bloodtype->blood_type}} :: فصيلة الدم</h4>
                    <p style="text-align: right;font-size: 18px;"><b>المدينة :: {{$request->city}}</b></p>
                    <p style="text-align: right;font-size: 18px;"><b>العنوان :: {{$request->address}}</b></p>
                    <a class="btn btn-sm btn-danger" href="tel:{{$request->phone}}"  style="font-size: 18px;">اتصال <i class="fas fa-phone"></i></a>
                    </div>
                </div>
                @endforeach

                @if(count($requests) == 0)
                 <div class="row text-center">
               <h2 style="font-size: 35px; text-align: center !important;">لايوجد طلبات</h2>
           </div>
                 @endif


           </div>
            

         </div>
     </section>
     
     

										<div class="modal fade" id="new_request" aria-hidden="true" role="dialog">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header" >
														<h5 class="modal-title" style="font-family: 'Amiri'; font-size: 20px;">طلبات جديدة</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
													</div>
													<div class="modal-body">
														<form action="{{route('saverequest')}}" method="post">
														@csrf
															<div class="row form-row">

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
																		<input style="direction: rtl;" type="text" name="city" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال المدينة')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>

																<div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label>العنوان</label>
																		<input style="direction: rtl;" type="text" name="address" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال العنوان')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>

																<div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label>رقم الهاتف</label>
																		<input style="direction: rtl;" onkeypress="return onlyNumberKey(event)" minlength="10" type="text" name="phone" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال رقم الهاتف')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>
                                                            

															</div>
															<button type="submit" style="font-family: 'Amiri';" class="btn btn-primary btn-block">حفظ الطلب الجديد</button>
														</form>
													</div>
												</div>
											</div>
										</div>

    
                                        @endsection