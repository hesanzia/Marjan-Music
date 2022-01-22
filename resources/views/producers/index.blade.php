<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Marjan Music</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="{{asset('images/favicon.ico')}}" rel="icon">

    <!-- Google Font -->
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap')}}" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/flaticon/font/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body>

<!-- Nav Bar Start -->
<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="{{route('home')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{route('singers.index')}}" class="nav-item nav-link">Singers</a>
                    <a href="{{route('composers.index')}}" class="nav-item nav-link">Composers</a>
                    <a href="{{route('songwriters.index')}}" class="nav-item nav-link">Songwriters</a>
                    <a href="{{route('producers.index')}}" class="nav-item nav-link">Producers</a>
                    @if(Auth::guest())
                        <a class="nav-link page-scroll" href="register">Login | Register</a>
                    @else
                        <a class="nav-link page-scroll" href="{{route('dashboard')}}">{{ Auth::user()->name }}</a>
                    @endif
                </div>
                <div class="ml-auto">
                    <a href="{{route('home')}}"><img src="{{asset('images/logo.png')}}" alt="Logo"></a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->


<!-- Carousel Start -->
<div class="carousel">
    <div class="owl-carousel">
        <div class="carousel-item">
            <div class="carousel-img">
                <img src="{{asset('images/background/header.jpg')}}">
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<div class="team">
    <div class="container">
        <div class="row">
            @foreach($producers as $producer)
                <div class="col-lg-3 col-md-6">
                    <div class="team-item">
                        <div class="team-img">
                            <a href="{{route('producers.show',$producer->id)}}"><img src="{{$producer->picture}}"></a>
                        </div>
                        <div class="team-text">
                            <h2>{{$producer->name}}</h2>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Footer Start -->
<div class="footer" style="text-align: center">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer-contact">
                    <h2>Location</h2>
                    <p><i class="fa fa-map-marker-alt"></i>Iran,Semnan,Shahrood</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-contact">
                    <h2>Phone</h2>
                    <p><i class="fa fa-envelope"></i>+989381082949</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-contact">
                    <h2>Email</h2>
                    <p><i class="fa fa-envelope"></i>marjan@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="footer-contact">
                    <h2>Marjan Music</h2>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Footer End -->

<!-- Back to top button -->
<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- Pre Loader -->
<div id="loader" class="show">
    <div class="loader"></div>
</div>

<!-- JavaScript Libraries -->
<script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('lib/easing/easing.min.js')}}"></script>
<script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('lib/counterup/counterup.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
