


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('title')
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
                                            <a class="nav-link" style="font-size: 20px;" href="{{route('home')}}">الرئيسية
                                            </a>
                                        </li>

                                        @if($page == "donates")
                                        <li class="nav-item active">
                                    @else
                                    <li class="nav-item">
                                    @endif
                                                                                <a class="nav-link" style="font-size: 20px;" href="{{route('donatesAdmin')}}">المتبرعين</a>
                                        </li>

                                    @if($page == "samples")
                                        <li class="nav-item active">
                                    @else
                                    <li class="nav-item">
                                    @endif                                            <a class="nav-link" style="font-size: 20px;" href="{{route('samplesAdmin')}}">العينات الجاهزة</a>
                                        </li>
                                        @if($page == "requests")
                                        <li class="nav-item active">
                                    @else
                                    <li class="nav-item">
                                    @endif                                            <a class="nav-link" style="font-size: 20px;" href="{{route('requestsAdmin')}}">الطلبات</a>
                                        </li>


                                        @if($page == "contact")
                                        <li class="nav-item active">
                                    @else
                                    <li class="nav-item">
                                    @endif                                            <a class="nav-link" style="font-size: 20px;" href="{{route('contactAdmin')}}">التواصل</a>
                                        </li>


                                        @auth


                                    <li class="nav-item">
                                        <a class="nav-link dropdown-toggle" style="font-size: 20px;" href="#" id="dropdownMenuButton" data-toggle="dropdown">{{auth()->user()->name}}</a>

                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" style="font-size: 20px;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                                        </div>


                                    </li>



















                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @endauth

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

@yield('js')

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.mins.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/plugins/grid-gallery/js/grid-gallery.min.js"></script>
    <script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="assets/js/script.js"></script>

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
