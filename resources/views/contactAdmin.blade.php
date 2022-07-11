@extends('layouts.admin')

@section('title')
<title>Admin Contact</title>
@endsection

@section('content')



     


<section id="process" class="donation-care" style="background: #f1f1f145; padding: 100px 0px;">
         <div class="container">

         @if (session('success'))
                <div id="hide" style="font-size: 18px; text-align: center; font-family: 'Amiri';" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

          <div class="row session-title">
              <h2 style="font-size: 35px;">رسائل التواصل </h2>
              <p style="text-align: center; font-size: 20px;">قائمة رسائل التواصل المتوفرة الذي يمكنك التحكم فها</p>

          </div>


          
          <table class="table" dir="rtl">
  <thead class="">
    <tr style="background-color: red; color: white;">
      <th scope="col">#</th>
      <th scope="col">الاسم</th>
      <th scope="col">البريد الالكتروني</th>
      <th scope="col">رقم الهاتف</th>
      <th scope="col">الرسالة</th>
      <th scope="col">الاجراءات</th>
    </tr>
  </thead>
  <tbody>
    @foreach($contact as $contact)
    <tr>
      <th scope="row">{{$contact->id}}</th>
      <td>{{$contact->name}}</td>
      <td>{{$contact->email}}</td>
      <td>{{$contact->phone}}</td>
      <td>{{$contact->message}}</td>
      <td>

      <!-- <a data-toggle="modal" href="#new_samples" class="btn btn-sm btn-center btn-danger" style="font-size: 18px;">حذف <i class="fas fa-trash"></i></a>          -->

    <form action="{{route('delete_contact',['id'=>$contact->id])}}" method="post">
    @csrf 
    @method('DELETE')
        <input class="btn btn-sm btn-center btn-danger" value="حذف" type="submit">
    </form>

      </td>
    </tr>
    @endforeach

  </tbody>
</table>




         </div>
     </section>
     
     



@endsection