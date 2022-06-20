
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>مصرف الدم الليبي</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

    @yield('css')


<style>
@import url(https://fonts.googleapis.com/earlyaccess/amiri.css);

    input::placeholder
    {   
        text-align: right;      /* for Chrome, Firefox, Opera */
    }

</style>

</head>


<body>
        <header class="continer-fluid ">

            <div id="menu-jk" class="header-bottom" dir="rtl">
                <div class="container">
                    <div class="row nav-row">
                        <div class="col-md-3 logo">
                            <img width="70" height="70" style="margin-bottom: 20px; margin-left: 30px;" src="assets/images/logo.jpg" alt="">
                        </div>
                        <div class="col-md-9 nav-col">
                            <nav class="navbar navbar-expand-lg navbar-light">

                                <button
                                    class="navbar-toggler"
                                    type="button"
                                    data-toggle="collapse"
                                    data-target="#navbarNav"
                                    aria-controls="navbarNav"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                    @if($page == "home")
                                        <li class="nav-item active">
                                    @else
                                    <li class="nav-item">
                                    @endif
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('home1')}}">الرئيسية
                                            </a>
                                        </li>

                                        @if($page != "home")
                                    <li class="nav-item">
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('home1')}}">حولنا</a>
                                    </li>
                                        @else
                                    <li class="nav-item">
                                        <a class="nav-link" style="font-size: 20px;" href="#about">حولنا</a>
                                    </li>
                                        @endif
                                    </li>

                                       
                                    @if($page == "donates")
                                        <li class="nav-item active">
                                    @else
                                    <li class="nav-item">
                                    @endif
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('donates')}}">متبرعين</a>
                                        </li>

                                    @if($page == "samples")
                                        <li class="nav-item active">
                                    @else
                                    <li class="nav-item">
                                    @endif      
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('samples')}}">عينات جاهزة</a>
                                        </li>

                                    @if($page == "requests")
                                        <li class="nav-item active">
                                    @else
                                    <li class="nav-item">
                                    @endif                                            <a class="nav-link" style="font-size: 20px;" href="{{route('requests')}}">طلبات</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" style="font-size: 20px;" href="#contact">تواصل معنا</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        
    @yield('content')

    
   
      <!--*************** Footer  Starts Here *************** -->
      <footer id="contact" class="container-fluid">
        <div class="container">
            
            <div class="row content-ro">
                <div class="col-lg-4 col-md-12 footer-contact">
                    <h2 style="font-size: 25px;">معلومات التواصل</h2>
                    <div class="address-row" style="font-size: 20px;">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="detail" style="padding-top: 15px;">
                            <p>Libya, Tripoli, Tajura</p>
                        </div>
                    </div>
                    <div class="address-row" style="font-size: 20px;">
                        <div class="icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="detail">
                            <p>Mohamedalalem@bloodbank.com <br> support@bloodbank.com</p>
                        </div>
                    </div>
                    <div class="address-row" style="font-size: 20px;">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="detail">
                            <p>+218911111111 <br> +218922222222</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 footer-links">
                   <div class="row no-margin mt-2">
                    <h2 style="font-size: 25px;">روابط الموقع</h2>
                    <ul style="font-size: 20px; padding-top: 20px;">
                        <li><a href="{{route('home1')}}" style="color: white;">الرئيسية</a></li>
                        <li><a href="#about" style="color: white;">حولنا</a></li>
                        <li><a href="{{route('donates')}}"style="color: white;">متبرعين</a></li>
                        <li><a href="{{route('samples')}}"style="color: white;">عينات جاهزة</a></li>
                        <li><a href="{{route('requests')}}"style="color: white;">طلبات</a></li>
                        <li>تواصل معنا</li>

                    </ul>
                    </div>


                </div>
                <div class="col-lg-4 col-md-12 footer-form">
                    <div class="form-card">
                        <div class="form-title">
                            <h4 style="font-size: 25px;">تواصل معنا</h4>
                        </div>
                        <form method="post" action="{{route('savecontact')}}">
                            @csrf
                        <div class="form-body">
                            <input style="direction: rtl;" type="text" name="name" placeholder="الاسم" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال اسمك ')" oninput="this.setCustomValidity('')">
                            <input style="direction: rtl;" type="text" name="phone" placeholder="رقم الهاتف" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال رقم الهاتف ')" oninput="this.setCustomValidity('')">
                            <input style="direction: rtl;" type="text" name="email" placeholder="البريد الالكتروني" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال بريدك الالكتروني ')" oninput="this.setCustomValidity('')">
                            <input style="direction: rtl;" type="text" name="message" placeholder="رسالتك" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال رسالتك ')" oninput="this.setCustomValidity('')">
                            <button style="font-size: 20px;" class="btn btn-sm btn-primary w-100">إرسال</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-copy">
                <div class="row">
                    <div class="col-lg-8 col-md-6" style="font-size: 20px;">
                        <p>Copyright © <a href="https://www.facebook.com/mohamed.alaleam.3/" target="_blank">Mohammed-Alalem</a> | All right reserved.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 socila-link">
                        <ul style="font-size: 20px;">
                            <li><a href="https://github.com/mohamedalaleam"><i class="fab fa-github"></i></a></li>
                            <li><a><i class="fab fa-facebook-f"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    
</body>

@yield('js')


    <script src="{{asset('assets/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugins/grid-gallery/js/grid-gallery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js')}}"></script>
    <script src="{{asset('assets/js/script.js')}}"></script>

<script>
    function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

</script>

</html>
