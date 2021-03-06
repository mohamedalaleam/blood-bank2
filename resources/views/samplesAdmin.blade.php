@extends('layouts.admin')

@section('title')
<title>Admin Samples</title>
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
              <p style="text-align: center; font-size: 20px;">قائمة العينات الجاهزة المتوفرة الذي يمكنك التحكم فها</p>
             <a data-toggle="modal" href="#new_samples" class="btn btn-sm btn-center btn-danger" style="font-size: 18px;">إضافة عينة جاهزة <i class="fas fa-plus"></i></a>         

          </div>

          <div class="row">
          <div class="col-12 col-sm-6">
            <form method="post" id="myForm" action="{{route('Adminsamplefilter')}}">
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
            <form method="post" action="{{route('Adminsamplesearch')}}">
                @csrf
                <div class="form-group" style="text-align: right; font-family: 'Amiri';">
                    <input style="direction: rtl;" type="text" name="search" placeholder="بحث عن طريق المدينة او العنوان" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال المدينة او العنوان')" oninput="this.setCustomValidity('')"> 
                    </div>
                    </form>
            </div>

           </div>

           <div class="row"  style="text-align: right;">
            </php
                $number;
            ?>
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




<form action="{{route('adminDeleteSamples',['id'=>$sample->id])}}" method="post" id="delete_donate">
    @csrf 
    @method('DELETE')

    <input class="btn btn-sm btn-left btn-danger" style="float: left; font-size: 18px;" value="حذف" type="submit">

    <a class="btn btn-sm btn-danger" onclick="quan2({{$sample->id}},{{$sample->quantity}})" data-toggle="modal" href="#edit_quantity" style="font-size: 18px; float: center;">الكمية<i class="fas fa-hashtag"></i></a>

    <a class="btn btn-sm btn-danger" href="tel:{{$sample->phone}}" style="font-size: 18px;">اتصال <i class="fas fa-phone"></i></a>

</form>



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
                                                            
																<div class="col-12 col-sm-12">
																	<div class="form-group" style="text-align: right; font-family: 'Amiri';">
																		<label>الكمية</label>
																		<input style="direction: rtl;" type="number" min="1" name="quantity" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال كمية العينات')" oninput="this.setCustomValidity('')"> 
																		
																		</div>
																</div>

															</div>
															<button type="submit" style="font-family: 'Amiri';" class="btn btn-primary btn-block">حفظ العينة الجاهزة</button>
														</form>
													</div>
												</div>
											</div>
										</div>

     



                                        <div class="modal fade" id="edit_quantity" aria-hidden="true" role="dialog">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header" >
														<h5 class="modal-title" style="font-family: 'Amiri'; font-size: 20px;">تعديل كمية العينة</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
													</div>
													<div class="modal-body">
														<form action="{{route('editSample')}}" method="post">
														@csrf   
															<div class="row form-row">

                                                            <input id="sample_id2" type="hidden" name="id"/>

																<div class="col-12 col-sm-12">
																	<div class="form-group" style="text-align: right;font-family: 'Amiri';">
																		<label>الكمية المسحوبة</label>
                                                                        <select class="form-control" style="direction: rtl;" name="quantity" id="selectElementId">

                                                                    </select>
																		</div>
																</div>

															</div>
															<button type="submit" style="font-family: 'Amiri';" class="btn btn-primary btn-block">حفظ تعديل الكمية</button>
														</form>
													</div>
												</div>
											</div>
										</div>



     
@endsection

@section('js')
<script>
function quan2(id,quantity){
    document.getElementById("sample_id2").value = id;

    select = document.getElementById('selectElementId');
    $('#selectElementId option').remove();
    for (var i = 1; i<=quantity; i++){
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        select.add(opt);
    }

    document.getElementById("selectElementId").selectedIndex = "0"; 
}

</script>
@endsection