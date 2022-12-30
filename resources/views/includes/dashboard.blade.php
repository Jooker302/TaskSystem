<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8" />

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <meta name="description" content="" />

        <meta name="author" content="" />

        <title>HGT Inspection Dashboard </title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

        <link href="{{asset('/css/styles.css')}}" rel="stylesheet" />

        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    </head>

    {{-- @if (Auth::user()->role == 'admin') --}}

    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">

            <!-- Navbar Brand-->

            <a class="navbar-brand ps-3" href="">HGT INSPECTION</a>

            <!-- Sidebar Toggle-->

            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

            <!-- Navbar Search-->

            {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

                <div class="input-group">

                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />

                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>

                </div>

            </form> --}}

            <!-- Navbar-->

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

                <li class="nav-item dropdown">

                    @php

                        $user=Auth::user();

                    @endphp

                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-"></i>{{$user->name}}</a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        {{-- <li><a class="dropdown-item" href="#!">Settings</a></li>

                        <li><a class="dropdown-item" href="#!">Activity Log</a></li> --}}

                        <li><hr class="dropdown-divider" /></li>
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <li><button class="dropdown-item">Logout</button></li>
                        </form>

                    </ul>

                </li>

            </ul>

        </nav>

        <div id="layoutSidenav">

            <div id="layoutSidenav_nav">

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">

                    <div class="sb-sidenav-menu">

                        <div class="nav">

                            <div class="sb-sidenav-menu-heading">Core</div>



                            <a class="nav-link" href="{{route('home')}}">

                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>

                                Dashboard

                            </a>



                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>

                                Add New

                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                            </a>

                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">

                                @if(Auth::user()->status == 'superadmin')
                                <nav class="sb-sidenav-menu-nested nav">

                                    <a class="nav-link" href="{{url('/add-admin')}}">Admin</a>



                                    {{-- <a class="nav-link" href="{{url('/add-product')}}">Product</a> --}}

                                </nav>
                                @elseif(Auth::user()->status == 'admin')
                                <nav class="sb-sidenav-menu-nested nav">

                                    <a class="nav-link" href="{{url('/add-user')}}">User</a>

                                </nav>

                                <nav class="sb-sidenav-menu-nested nav">

                                    <a class="nav-link" href="{{url('/assign-task')}}">Task</a>

                                </nav>
                                @endif
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">

                                <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>

                                Manage

                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>

                            </a>

                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                @if(Auth::user()->status == 'superadmin')
                                <nav class="sb-sidenav-menu-nested nav">

                                        <a class="nav-link" href="{{url('view-admins')}}">Admins</a>

                                </nav>
                                    @elseif(Auth::user()->status == 'admin')
                                <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{url('view-users')}}">Users</a>
                                    </nav>
                                    <nav class="sb-sidenav-menu-nested nav">

                                        <a class="nav-link" href="{{url('/view-task')}}">Task</a>

                                    </nav>
                                    @endif


                                    {{-- <a class="nav-link" href="{{url('product')}}">Product</a> --}}




                            </div>







                    </div>



                </nav>

            </div>

             <div id="layoutSidenav_content">

                @yield('content')

                <footer class="py-4 bg-light mt-auto">

                    <div class="container-fluid px-4">

                        <div class="d-flex align-items-center justify-content-between small">

                            <div class="text-muted">Copyright &copy; HTG Inspection Admin 2022</div>

                            {{-- <div>

                                <a href="#">Privacy Policy</a>

                                &middot;

                                <a href="#">Terms &amp; Conditions</a>

                            </div> --}}

                        </div>

                    </div>

                </footer>

            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        {{-- <script src="/js/scripts.js"></script> --}}

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

        {{-- <script src="/assets/demo/chart-area-demo.js"></script> --}}

        {{-- <script src="/assets/demo/chart-bar-demo.js"></script> --}}

        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>

        {{-- <script src="/js/datatables-simple-demo.js"></script> --}}

    </body>

    {{-- @else --}}

    {{-- <script>window.location = 'home-standard';</script> --}}

    {{-- @endif --}}

</html>

