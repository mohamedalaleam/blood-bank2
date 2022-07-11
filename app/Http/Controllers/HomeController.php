<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;
use App\Models\donor_data;
use App\Models\sample;
use App\Models\reviews;
use Cookie;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $donates = donor_data::count();
        $samples = sample::where('requirment' , 0)->count();
        $requests = sample::where('requirment' , 1)->count();
        $contact = contact::count();
        $page = "home";
        return view('home', ['donates'=>$donates, 'samples'=>$samples, 'requests'=>$requests, 'contact'=>$contact, 'page'=>$page]);
    }

    public function home()
    {
        $donates = donor_data::latest()->take(4)->get();
        $samples = sample::where('requirment' , 0)->take(4)->get();
        $requests = sample::where('requirment' , 1)->take(4)->get();
        $page = "home";

        $Cookie = Cookie::get();

        return view('welcome', ['donates'=>$donates, 'samples'=>$samples, 'requests'=>$requests, 'page'=>$page, 'Cookie'=>$Cookie]);
    }


    public function donates()
    {
        $donates = donor_data::latest()->get();
        $page = "donates";
        $Cookie = Cookie::get();
        return view('donates', ['page'=>$page, 'donates'=>$donates, 'Cookie'=>$Cookie]);
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

    public function contactAdmin()
    {
        $contact = contact::latest()->get();
        $page = "contact";
        return view('contactAdmin', ['page'=>$page, 'contact'=>$contact]);
    }

    public function donatesAdmin()
    {
        $donates = donor_data::latest()->get();
        $page = "donates";
        return view('donatesAdmin', ['page'=>$page, 'donates'=>$donates]);
    }

    public function samplesAdmin()
    {
        $samples = sample::where('requirment' , 0)->get();
        $page = "samples";
        return view('samplesAdmin', ['page'=>$page, 'samples'=>$samples]);
    }

    public function requestsAdmin()
    {
        $requests = sample::where('requirment' , 1)->get();
        $page = "requests";
        return view('requestsAdmin', ['page'=>$page, 'requests'=>$requests]);
    }

    public function adminDeleteDonates($id)
    {
        donor_data::find($id)->delete();
        return redirect()->route('donatesAdmin')->with('success','تم مسح المتبرع بنجاح');
    }

    public function adminDeleteSamples($id)
    {
        sample::find($id)->delete();
        return redirect()->route('samplesAdmin')->with('success','تم مسح العينة الجاهزة بنجاح');
    }

    public function adminDeleterequest($id)
    {
        sample::find($id)->delete();
        return redirect()->route('requestsAdmin')->with('success','تم مسح الطلب بنجاح');
    }

    public function Admindonatefilter()
{
    if(request('type') == 'all'){
        $donates = donor_data::latest()->get();
    }else{
        $donates = donor_data::where('blood_type_id', request('type'))->get();
    }
    $page = "donates";
    return view('donatesAdmin', ['page'=>$page, 'donates'=>$donates]);
}

public function Admindonatesearch()
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
    return view('donatesAdmin', ['page'=>$page, 'donates'=>$donates]);
}

public function Adminsamplefilter()
{
    if(request('type') == 'all'){
        $samples = sample::where('requirment', 0)->get();
    }else{
        $samples = sample::where([['requirment', 0],['blood_type_id', request('type')]])->get();
    }
    $page = "samples";
    return view('samplesAdmin', ['page'=>$page, 'samples'=>$samples]);
}

public function Adminsamplesearch()
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
    return view('samplesAdmin', ['page'=>$page, 'samples'=>$samples]);
}

public function Adminrequestfilter()
{
    if(request('type') == 'all'){
        $requests = sample::where('requirment', 1)->get();
    }else{
        $requests = sample::where([['requirment', 1],['blood_type_id', request('type')]])->get();
    }
    $page = "requests";
    return view('requestsAdmin', ['page'=>$page, 'requests'=>$requests]);
}

public function Adminrequestsearch()
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
    return view('requestsAdmin', ['page'=>$page, 'requests'=>$requests]);
}

public function editSample()
{
    request()->validate([
        'quantity' => 'required',
     ],
     [ 
        'quantity.required' => 'يجب تحديد الكمية المسحوبة',
    ]);

    $sample = sample::find(request('id'));

    $sample->quantity-=request('quantity');
    if($sample->quantity == 0){
        $sample->delete();
        return redirect()->route('samplesAdmin')->with('success','تم سحب كل الكمية بنجاح');
    }
    $sample->save();
    return redirect()->route('samplesAdmin')->with('success','تم سحب الكمية بنجاح');
}

    public function delete_contact($id){
        contact::find($id)->delete();
        return redirect()->back()->with('success','تم مسح رسالة التواصل بنجاح');
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
          'identity' => 'required',
          'type' => 'required',
       ],
       [ 
           'name.required' => 'يجب ادخال الاسم',
           'city.required' => 'يجب ادخال المدينة',
           'address.required' => 'يجب ادخال العنوان',
           'phone.required' => 'يجب ادخال رقم الهاتف',
           'identity.required' => 'يجب ادخال رقم البطاقة الشخصية',
           'type.required' => 'يجب ادخال نوع الفصيلة',
       ]);

       $found = donor_data::where('identity', '=', request('identity'))->first();
       if ($found != null) {
        return redirect()->back()->with('error','لقد تم تسجيل هذا المتبرع مسبقآ');
       }

    //    Cookie::queue('name', request('name'), 10);
    //    Cookie::queue('city', request('city'), 10);
    //    Cookie::queue('address', request('address'), 10);
    //    Cookie::queue('phone', request('phone'), 10);
    //    Cookie::queue('identity', request('identity'), 10);

       Cookie::queue('name', request('name'));
       Cookie::queue('city', request('city'));
       Cookie::queue('address', request('address'));
       Cookie::queue('phone', request('phone'));
       Cookie::queue('identity', request('identity'));
       $donate = new donor_data;
      $donate->name = request('name');
      $donate->city =request('city');
      $donate->phone = request('phone');
      $donate->address = request('address');
      $donate->identity = request('identity');
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
        'quantity' => 'required',
     ],
     [ 
         'city.required' => 'يجب ادخال المدينة',
         'address.required' => 'يجب ادخال العنوان',
         'phone.required' => 'يجب ادخال رقم الهاتف',
         'type.required' => 'يجب ادخال نوع الفصيلة',
         'quantity.required' => 'يجب ادخال كمية العينات',
     ]);

     $donate = new sample;
     $donate->city =request('city');
     $donate->phone = request('phone');
     $donate->address = request('address');
     $donate->blood_type_id = request('type');
     $donate->quantity = request('quantity');
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

public function review_donate()
{
    request()->validate([
        'id' => 'required',
        'review' => 'required',
     ],
     [ 
         'id.required' => 'يجب تحقق من المتبرع',
         'review.required' => ' يجب تقييم الزبون مسبقآ',
     ]);

     $review = new reviews;
     $review->donate_id =request('id');
     $review->review = request('review');

     $review->save();
     return redirect()->back()->with('success','تم تقييم الزبون بنجاح');
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
