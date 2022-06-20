<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\donor_data;
use App\Models\sample;
 
class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $donates = donor_data::latest()->take(4)->get();
        $samples = sample::where('requirment' , 0)->take(4)->get();
        $requests = sample::where('requirment' , 1)->take(4)->get();
        $page = "home";
        return view('welcome', ['donates'=>$donates, 'samples'=>$samples, 'requests'=>$requests, 'page'=>$page]);
    }


    public function donates()
    {
        $donates = donor_data::latest()->get();
        $page = "donates";
        return view('donates', ['page'=>$page, 'donates'=>$donates]);
    }

    public function samples()
    {
        $samples = sample::where('requirment' , 0)->get();
        $page = "samples";
        return view('samples', ['page'=>$page, 'samples'=>$samples]);
    }

    public function requests()
    {
        $requests = sample::where('requirment' , 1)->get();
        $page = "requests";
        return view('requests', ['page'=>$page, 'requests'=>$requests]);
    }

    public function savecontact()
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
         ],
         [ 
             'name.required' => 'يجب ادخال الاسم',
             'email.required' => 'يجب ادخال البريد الالكتروني',
             'phone.required' => 'يجب ادخال رقم الهاتف',
             'message.required' => 'يجب ادخال رسالتك',
         ]);

        $contact = new contact;
        $contact->name = request('name');
        $contact->email =request('email');
        $contact->phone = request('phone');
        $contact->message = request('message');
        $contact->save();
        return redirect()->back()->with('success','تم ارسال رسالتك بنجاح');
  }

  public function savedonate()
  {
      request()->validate([
          'name' => 'required',
          'city' => 'required',
          'address' => 'required',
          'phone' => 'required',
          'type' => 'required',
       ],
       [ 
           'name.required' => 'يجب ادخال الاسم',
           'city.required' => 'يجب ادخال المدينة',
           'address.required' => 'يجب ادخال العنوان',
           'phone.required' => 'يجب ادخال رقم الهاتف',
           'type.required' => 'يجب ادخال نوع الفصيلة',
       ]);

      $donate = new donor_data;
      $donate->name = request('name');
      $donate->city =request('city');
      $donate->phone = request('phone');
      $donate->address = request('address');
      $donate->blood_type_id = request('type');
      $donate->save();
      return redirect()->back()->with('success','تم تسجيل المتبرع بنجاح');
}

public function savesample()
{
    request()->validate([
        'city' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'type' => 'required',
     ],
     [ 
         'city.required' => 'يجب ادخال المدينة',
         'address.required' => 'يجب ادخال العنوان',
         'phone.required' => 'يجب ادخال رقم الهاتف',
         'type.required' => 'يجب ادخال نوع الفصيلة',
     ]);

     $donate = new sample;
     $donate->city =request('city');
     $donate->phone = request('phone');
     $donate->address = request('address');
     $donate->blood_type_id = request('type');
     $donate->requirment = 0;
     $donate->save();
     return redirect()->back()->with('success','تم تسجيل العينة الجاهزة بنجاح');
}

public function saverequest()
{
    request()->validate([
        'city' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'type' => 'required',
     ],
     [ 
         'city.required' => 'يجب ادخال المدينة',
         'address.required' => 'يجب ادخال العنوان',
         'phone.required' => 'يجب ادخال رقم الهاتف',
         'type.required' => 'يجب ادخال نوع الفصيلة',
     ]);

     $donate = new sample;
     $donate->city =request('city');
     $donate->phone = request('phone');
     $donate->address = request('address');
     $donate->blood_type_id = request('type');
     $donate->requirment = 1;
     $donate->save();
     return redirect()->back()->with('success','تم تسجيل طلبك بنجاح');
}

public function donatefilter()
{
    if(request('type') == 'all'){
        $donates = donor_data::latest()->get();
    }else{
        $donates = donor_data::where('blood_type_id', request('type'))->get();
    }
    $page = "donates";
    return view('donates', ['page'=>$page, 'donates'=>$donates]);
}

public function donatesearch()
{

    request()->validate([
        'search' => 'required',
     ],
     [ 
         'search.required' => 'يجب ادخال المدينة او العنوان',
     ]);


    $donates = donor_data::where('city','LIKE', '%' . request('search') . '%')
    ->orWhere('address','LIKE', '%' . request('search') . '%')
    ->get();
    $page = "donates";
    return view('donates', ['page'=>$page, 'donates'=>$donates]);
}


public function requestfilter()
{
    if(request('type') == 'all'){
        $requests = sample::where('requirment', 1)->get();
    }else{
        $requests = sample::where([['requirment', 1],['blood_type_id', request('type')]])->get();
    }
    $page = "requests";
    return view('requests', ['page'=>$page, 'requests'=>$requests]);
}

public function requestsearch()
{

    request()->validate([
        'search' => 'required',
     ],
     [ 
         'search.required' => 'يجب ادخال المدينة او العنوان',
     ]);


    $requests = sample::where([['city','LIKE', '%' . request('search') . '%'],['requirment', 1]])
    ->orWhere([['address','LIKE', '%' . request('search') . '%'],['requirment', 1]])
    ->get();
    $page = "requests";
    return view('requests', ['page'=>$page, 'requests'=>$requests]);
}


public function samplefilter()
{
    if(request('type') == 'all'){
        $samples = sample::where('requirment', 0)->get();
    }else{
        $samples = sample::where([['requirment', 0],['blood_type_id', request('type')]])->get();
    }
    $page = "samples";
    return view('samples', ['page'=>$page, 'samples'=>$samples]);
}

public function samplesearch()
{

    request()->validate([
        'search' => 'required',
     ],
     [ 
         'search.required' => 'يجب ادخال المدينة او العنوان',
     ]);


    $samples = sample::where([['city','LIKE', '%' . request('search') . '%'],['requirment', 0]])
    ->orWhere([['address','LIKE', '%' . request('search') . '%'],['requirment', 0]])
    ->get();
    $page = "samples";
    return view('samples', ['page'=>$page, 'samples'=>$samples]);
}



}
