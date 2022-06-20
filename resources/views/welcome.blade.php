@extends('layouts.main')

@section('content')
    <!-- ################# Slider Starts Here#######################-->

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{asset('assets/images/slider/slide-02.jpg')}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">

                    @if (session('success'))
                <div id="hide" style="font-size: 18px; text-align: center; font-family: 'Amiri';" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

                        <h5 class=" bounceInDown">مصرف الدم الليبي</h5>
                        <p class=" bounceInLeft">مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة</p>

                        <div class=" vbh">

                            <a data-toggle="modal" href="#new_donates"><div class="btn btn-success  bounceInUp"> سجل كمتبرع </div></a>
                            <a href="#contact"><div class="btn btn-success  bounceInUp"> تواصل معنا </div></a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <img class="d-block w-100" src="{{asset('assets/images/slider/slide-03.jpg')}}" alt="Third slide">
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class=" bounceInDown">مصرف الدم الليبي</h5>
                        <p class=" bounceInLeft">مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة</p>
>

                        <div class=" vbh">

                            <a data-toggle="modal" href="#new_samples"><div class="btn btn-danger  bounceInUp"> اضافة عينة جاهزة </div></a>
                            <a data-toggle="modal" href="#new_request"><div class="btn btn-danger  bounceInUp"> اضافة طلب </div></a>
                        </div>
                    </div>
                </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    </div>
    
    <!--*************** About Us Starts Here ***************-->
   <section id="about" class="contianer-fluid about-us" dir="rtl">
       <div class="container">
           <div class="row session-title">
               <h2>حولنا</h2>
               <p style="text-align: center; font-size: 20px;">مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة</p>
           </div>
            <div class="row">
                <div class="col-md-6 text" style="text-align: right;">
                    <h2>حول مصرف الدم الليبي</h2>
                    <p style="padding-top: 20px; font-size: 18px;"> مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزةمصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة</p>
                    <p style=" font-size: 18px;"> مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة</p>
                    <p style=" font-size: 18px;">مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة</p>
                    <p style=" font-size: 18px;">مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة مصرف الدم الليبي يساعد المواطنين علي سهولة ايجاد العينات الدم المطلوبة وكدلك البحت عن متبرعين والعينات الجاهزة</p>
                </div>
                <div class="col-md-6 image">
                    <img src="{{asset('assets/images/about.jpg')}}" alt="">
                </div>
            </div>
       </div>
   </section>
    
          
    
    
     <!-- ################# Donation Process Start Here #######################-->
     
     <section id="process" class="donation-care" style="background: #f1f1f145;">
         <div class="container">
           <div class="row session-title">
               <h2 style="font-size: 35px;">المتبرعين</h2>
               <p style="text-align: center; font-size: 20px;">قائمة الاشخاص المتوفرين لتبرع لاتتردد في التواصل معهم</p>
           </div>
            <div class="row"  style="text-align: right;">
                 
                 @foreach($donates as $donate)
                 <div class="col-md-3 col-sm-6 vd">
                    <div class="bkjiu" style="background: white;">
                     <img src="{{asset('assets/images/gallery/g3.jpg')}}" alt="">
                     <h4 style=" font-size: 18px;"><b></b>{{$donate->name}}</h4>
                     <p style="text-align: right; font-size: 18px;"><b>{{$donate->bloodtype->blood_type}} :: فصيلة الدم</b></p>
                     <p style="text-align: right; font-size: 18px;"><b>المدينة :: {{$donate->city}}</b></p>
                     <p style="text-align: right; font-size: 18px;"><b>العنوان :: {{$donate->address}}</b></p>
                     <a style="font-size: 18px;" href="tel:{{$donate->phone}}" class="btn btn-sm btn-danger">اتصال <i class="fas fa-phone"></i></a>
                     </div>
                 </div>
                 @endforeach
</div>
                 <div class="row"  style="text-align: right;">

                 <div class="btn btn-success  bounceInUp" style="float: center !important; font-size: 20px;"> <a href="{{route('donates')}}" style="color: white;">عرض المزيد </a></div>

            </div>
            

         </div>
     </section>
     
     
     
     


     <!-- ################# Donation Process Start Here #######################-->
     
     <section id="process" class="donation-care">
        <div class="container">
          <div class="row session-title">
              <h2 style="font-size: 35px;">العينات الجاهزة </h2>
              <p style="text-align: center; font-size: 20px;">قائمة العينات الجاهزة المتوفرة الذي يمكنك الحصول عليها</p>
          </div>
           <div class="row"  style="text-align: right;">

           @foreach($samples as $sample)
                <div class="col-md-3 col-sm-6 vd">
                   <div class="bkjiu">
                    <img src="{{asset('assets/images/gallery/g9.jpg')}}" alt="">
                    <h4><b style="float: left !important; font-size: 18px;">{{$sample->created_at->diffForHumans()}}</b>{{$sample->bloodtype->blood_type}} :: فصيلة الدم</h4>
                    <p style="text-align: right; font-size: 18px;"><b>المدينة :: {{$sample->city}}</b></p>
                    <p style="text-align: right; font-size: 18px;"><b>العنوان :: {{$sample->address}}</b></p>
                    <a class="btn btn-sm btn-danger" href="tel:{{$sample->phone}}" style="font-size: 18px;">اتصال <i class="fas fa-phone"></i></a>
                    </div>
                </div>
                @endforeach
</div>
                <div class="row"  style="text-align: right;">

                <div class="btn btn-success  bounceInUp" style="float: center !important; font-size: 20px;"><a href="{{route('samples')}}" style="color: white;"> عرض المزيد </a></div>

           </div>
           

        </div>
    </section>
    
    




     <!-- ################# Donation Process Start Here #######################-->
     
     <section id="process" class="donation-care" style="background: #f1f1f145;">
        <div class="container">
          <div class="row session-title">
              <h2 style="font-size: 35px;">الطلبات</h2>
              <p style="text-align: center; font-size: 20px;">قائمة الدم المطلوبة لاتتردد في المساعدة ادا يمكنك </p>
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
</div>
                <div class="row"  style="text-align: right;">

                <div class="btn btn-success" style="float: center !important;font-size: 20px;"><a href="{{route('requests')}}" style="color: white;"> عرض المزيد</a> </div>

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
																		<input style="direction: rtl;" type="text" name="name" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال اسم المتجر')" oninput="this.setCustomValidity('')"> 
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
																		<input style="direction: rtl;" type="text" name="city" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال المدينة')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>

																<div class="col-12 col-sm-6">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label>العنوان</label>
																		<input style="direction: rtl;" type="text" name="address" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال العنوان')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>

																<div class="col-12 col-sm-12">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label>رقم الهاتف</label>
																		<input style="direction: rtl;" onkeypress="return onlyNumberKey(event)" minlength="10" type="text" name="phone" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال رقم الهاتف')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>
                                                            

															</div>
															<button type="submit" style="font-family: 'Amiri';" class="btn btn-primary btn-block">حفظ بيانات المتبرع</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										

										<div class="modal fade" id="new_samples" aria-hidden="true" role="dialog">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header" >
														<h5 class="modal-title" style="font-family: 'Amiri'; font-size: 20px;">عينات جاهزة جديدة</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
													</div>
													<div class="modal-body">
														<form action="{{route('savesample')}}" method="post">
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
															<button type="submit" style="font-family: 'Amiri';" class="btn btn-primary btn-block">حفظ العينة الجاهزة</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										



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