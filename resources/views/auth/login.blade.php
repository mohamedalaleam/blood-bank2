
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>تسجيل الدخول</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/plugins/grid-gallery/css/grid-gallery.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />

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
                                        <li class="nav-item">
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('home1')}}">الرئيسية
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('home1')}}">حولنا</a>
                                        </li>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('donates')}}">متبرعين</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('samples')}}">عينات جاهزة</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('requests')}}">طلبات</a>
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
        
        
    
     
     <section id="process" class="donation-care" style="background: #f1f1f145; padding: 150px 0px;">
         <div class="container">

         @if ($errors->any())
    <div class="alert alert-danger" style="margin-bottom: 20px;">
        <ul style="text-align: center; color: darkred; list-style-type: none; font-size: 20px; font-family: 'Amiri';">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

           <div class="row session-title">
               <h2 style="font-size: 35px;">تسجيل الدخول</h2>
               <p style="text-align: center; font-size: 20px;">هده الصفحة خاصة بمدير الموقع فقط</p>
           </div>

            <div class="row" style="float: center !important;">

                <div class="col-lg-4 col-md-12 align-self-center" style="float: none; margin: 0 auto;">
                    <div class="form-card">
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-body">
                            <input style="direction: rtl; background: white;" type="text" name="email" placeholder="البريد الالكتروني" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال بريدك الالكتروني ')" oninput="this.setCustomValidity('')" autocomplete="email" autofocus>
                            <input style="direction: rtl; background: white;" type="password" name="password" placeholder="كلمة المرور" class="form-control" required oninvalid="this.setCustomValidity('الرجاء ادخال كلمة المرور ')" oninput="this.setCustomValidity('')" autocomplete="password" autofocus>
                            <button style="font-size: 20px;" type="submit" class="btn btn-sm btn-primary w-100">تسجيل الدخول</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
            

         </div>
     </section>
     
     
    
    

     

   
      <!--*************** Footer  Starts Here *************** -->
    <footer id="contact" class="container-fluid">
        <div class="container">
            
            <div class="footer-copy" style="margin-top: -50px;">
                <div class="row">
                    <div class="col-lg-8 col-md-6" style="font-size: 20px;">
                        <p>Copyright © <a  href="https://www.facebook.com/mohamed.alaleam.3/" target="_blank">Mohammed-Alalem</a> | All right reserved.</p>
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

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/grid-gallery/js/grid-gallery.min.js"></script>
    <script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="assets/js/script.js"></script>
</html>
