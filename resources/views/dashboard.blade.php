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
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
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

<div class="container">
    <div class="col-lg-12" style="margin-top: 50px">
        <div class="row my-2">
            <div class="col-lg-12 order-lg-2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active" style="text-decoration: none">Profile</a>
                    </li>
                    @can('admin')
                        <li class="nav-item">
                            <a href="" data-target="#users" data-toggle="tab" class="nav-link" style="text-decoration: none">Users</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#songs" data-toggle="tab" class="nav-link" style="text-decoration: none">Songs</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#singers" data-toggle="tab" class="nav-link" style="text-decoration: none">Singers</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#songwriters" data-toggle="tab" class="nav-link" style="text-decoration: none">Songwriters</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#composers" data-toggle="tab" class="nav-link" style="text-decoration: none">Composers</a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-target="#producers" data-toggle="tab" class="nav-link" style="text-decoration: none">Producers</a>
                        </li>
                    @endcan

                </ul>
                <div class="col-lg-12">
                    <div class="tab-content py-4">

                        <div class="tab-pane active" id="profile">
                            <h3 class="mb-3">Username :  {{Auth::user()->name}}</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Email Adderss : {{Auth::user()->email}}</h4>
                                </div>
                            </div>
                            <!--/row-->
                        </div>

                        <div class="tab-pane" id="users">
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> User Management</h5>
                                <table class="table table-sm table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @foreach ($user->roles as $role)
                                                    {{ $role->title }}
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                    <button class="btn btn-sm btn-link text-uppercase">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form class="inline-block" action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are You Sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="songs">
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>Song Management</h5>
                                <a href="{{route('songs.create')}}"><button type="submit" class="btn btn-custom" style="margin-bottom: 10px">Add</button></a>
                                <table class="table table-sm table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Song Name</th>
                                        <th scope="col">Singer</th>
                                        <th scope="col">Songwriter</th>
                                        <th scope="col">Composer</th>
                                        <th scope="col">Producer</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    @foreach($songs as $song)
                                        <tbody>

                                        <tr>
                                            <td>{{$song->id}}</td>
                                            <td>{{$song->name}}</td>
                                            <td>{{$song->singer()->name}}</td>
                                            <td>{{$song->songwriter()->name}}</td>
                                            <td>{{$song->composer()->name}}</td>
                                            <td>{{$song->producer()->name}}</td>
                                            <td>
                                                <a href="{{ route('songs.edit', $song->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                    <button class="btn btn-sm btn-link text-uppercase">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form class="inline-block" action="{{route('songs.destroy', $song->id) }}" method="POST" onsubmit="return confirm('Are You Sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="singers">
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>Singer Management</h5>
                                <a href="{{route('singers.create')}}"><button type="submit" class="btn btn-custom" style="margin-bottom: 10px">Add</button></a>
                                <table class="table table-sm table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Singer Name</th>
                                        <th scope="col">Nationality</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    @foreach($singers as $singer)
                                        <tbody>

                                        <tr>
                                            <td>{{$singer->id}}</td>
                                            <td>{{$singer->name}}</td>
                                            <td>{{$singer->nationality}}</td>
                                            <td>{{$singer->age}}</td>
                                            <td>
                                                <a href="{{ route('singers.edit', $singer->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                    <button class="btn btn-sm btn-link text-uppercase">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form class="inline-block" action="{{route('singers.destroy', $singer->id) }}" method="POST" onsubmit="return confirm('Are You Sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="songwriters">
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>Songwriter Management</h5>
                                <a href="{{route('songwriters.create')}}"><button type="submit" class="btn btn-custom" style="margin-bottom: 10px">Add</button></a>
                                <table class="table table-sm table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Songwriter Name</th>
                                        <th scope="col">Nationality</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    @foreach($songwriters as $songwriter)
                                        <tbody>

                                        <tr>
                                            <td>{{$songwriter->id}}</td>
                                            <td>{{$songwriter->name}}</td>
                                            <td>{{$songwriter->nationality}}</td>
                                            <td>{{$songwriter->age}}</td>
                                            <td>
                                                <a href="{{ route('songwriters.edit', $songwriter->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                    <button class="btn btn-sm btn-link text-uppercase">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form class="inline-block" action="{{route('songwriters.destroy', $songwriter->id) }}" method="POST" onsubmit="return confirm('Are You Sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="composers">
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>Composer Management</h5>
                                <a href="{{route('composers.create')}}"><button type="submit" class="btn btn-custom" style="margin-bottom: 10px">Add</button></a>
                                <table class="table table-sm table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Composer Name</th>
                                        <th scope="col">Nationality</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    @foreach($composers as $composer)
                                        <tbody>

                                        <tr>
                                            <td>{{$composer->id}}</td>
                                            <td>{{$composer->name}}</td>
                                            <td>{{$composer->nationality}}</td>
                                            <td>{{$composer->age}}</td>
                                            <td>
                                                <a href="{{ route('composers.edit', $composer->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                    <button class="btn btn-sm btn-link text-uppercase">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form class="inline-block" action="{{route('composers.destroy', $composer->id) }}" method="POST" onsubmit="return confirm('Are You Sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="producers">
                            <div class="col-md-12">
                                <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span>Producer Management</h5>
                                <a href="{{route('producers.create')}}"><button type="submit" class="btn btn-custom" style="margin-bottom: 10px">Add</button></a>
                                <table class="table table-sm table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Producer Name</th>
                                        <th scope="col">Nationality</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Edit</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                    </thead>
                                    @foreach($producers as $producer)
                                        <tbody>

                                        <tr>
                                            <td>{{$producer->id}}</td>
                                            <td>{{$producer->name}}</td>
                                            <td>{{$producer->nationality}}</td>
                                            <td>{{$producer->age}}</td>
                                            <td>
                                                <a href="{{ route('producers.edit', $producer->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">
                                                    <button class="btn btn-sm btn-link text-uppercase">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <form class="inline-block" action="{{route('producers.destroy', $producer->id) }}" method="POST" onsubmit="return confirm('Are You Sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-sm btn-link text-danger text-uppercase" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
