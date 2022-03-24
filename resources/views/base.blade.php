<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>@section('title') @show</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @section('style')
    <link href="{{ asset('css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/default/app.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    @show
</head>


@section('script')

<script src="{{ asset('js/vendor.min.js') }}"></script>
<script src="{{ asset('js/app.min.js') }}"></script>
<script src="{{ asset('js/theme/default.min.js') }}"></script>




<script>
    function usuarios() {

        $("#content-top").load("{{ url('/Usuarios') }}");
    };

    function proveedor() {
        $("#content-top").load("{{ url('/Proveedor') }}");
    };

    function clientes() {
        $("#content-top").load("{{ url('/Clientes') }}");
    };

    function ventas() {
        $("#content-top").load("{{ url('/Ventas') }}");
    };

    function productos() {
        $("#content-top").load("{{ url('/Productos') }}");
    };

    function carrito() {
        $("#content-top").load("{{ url('/cart-show') }}");
    };
</script>




@show

<body>


    @if(Session::has('users.Usuario'))

    <!-- loader(cuando carga la pagina) -->

    <!-- loader -->
    <!-- #app -->
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>

    <div id="app" class="app app-header-fixed app-sidebar-fixed">


        <!-- [fin]header -->
        <div id="header" class="app-header">
            <!-- BEGIN navbar-header -->
            <div class="navbar-header">
                <a href="{{ url('/welcome') }}" class="navbar-brand">Medical Serivices Pack</a>

                <button type="button" class="navbar-mobile-toggler" data-bs-toggle="collapse" data-bs-target="#top-navbar">
                    <span class="fa-stack fa-lg">
                        <i class="far fa-square fa-stack-2x"></i>
                        <i class="fa fa-cog fa-stack-1x mt-1px"></i>
                    </span>
                </button>

                <!-- [inicio]icono de 3 rallas que se ve en celulares-->
                <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- [fin]icono de 3 rallas que se ve en celulares-->
            </div>
            <!-- END navbar-header -->

            <!-- BEGIN header-nav -->


            <div class="navbar-nav">



                <div class="navbar-item navbar-user dropdown">
                    <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                        <img src="{{ asset('img/login-bg/teri.jpg') }}" alt="" />
                        <span>
                            <span class="d-none d-md-inline">{{Session::get('users.Usuario')}}</span>
                            <b class="caret"></b>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end me-1">
                        <!--
                        <a href="javascript:;" class="dropdown-item">Editar Perfil</a>
                        <div class="dropdown-divider"></div>
                        -->
                        <a href="{{ route('home') }}" class="dropdown-item">Log Out</a>
                    </div>
                </div>

            </div>
            <!-- END header-nav -->

        </div>

        <!-- [fin] header -->
        <!-- BEGIN #sidebar -->
        <div id="sidebar" class="app-sidebar">
            <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
                <div class="menu">
                    <div class="menu-profile">

                        <div class="menu-profile-cover with-shadow"></div>
                        <div class="menu-profile-image">
                            <img src="{{ asset('img/login-bg/teri.jpg') }}" alt="" />
                        </div>
                        <div class="menu-profile-info">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <div>
                                        {{Session::get('users.Usuario')}}
                                    </div>

                                </div>

                            </div>
                            <small></small>

                        </div>

                    </div>
                    <div class="menu-header">Profile Settings</div>
                    <div id="appSidebarProfileMenu">
                        <div class="menu-item pt-5px">
                            <a href="#" class="menu-link">
                                <div class="menu-icon"><i class="fa fa-cog"></i></div>
                                <div class="menu-text">Settings</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="#" class="menu-link">
                                <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                                <div class="menu-text"> Send Feedback</div>
                            </a>
                        </div>
                        <div class="menu-item pb-5px">
                            <a href="#" class="menu-link">
                                <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                                <div class="menu-text"> Helps</div>
                            </a>
                        </div>
                        <div class="menu-divider m-0"></div>
                    </div>
                    <div class="menu-header">Navigation</div>

                    <div class="menu-item ">
                        <a href="{{ url('/welcome') }}" class="menu-link">
                            <div class="menu-icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="menu-text">Dashboard</div>
                        </a>
                        <div class="menu-item ">
                            <a onclick="clientes()" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-address-book"></i>
                                </div>
                                <div class="menu-text">Clientes</div>
                            </a>

                        </div>
                        <div class="menu-item ">
                            <a onclick="productos()" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-archive" aria-hidden="true"></i>
                                </div>
                                <div class="menu-text">Productos</div>
                            </a>

                        </div>
                        <div class="menu-item ">
                            <a onclick="proveedor()" class="menu-link">
                                <div class="menu-icon">

                                    <i class="fa fa-id-card"></i>
                                </div>
                                <div class="menu-text">Proveedores</div>
                            </a>

                        </div>
                        <div class="menu-item ">
                            <a onclick="ventas()" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>

                                </div>
                                <div class="menu-text">Ventas</div>
                            </a>

                        </div>
                        <div class="menu-item ">
                            <a onclick="usuarios()" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fa fa-th-large fa-user"></i>
                                </div>
                                <div class="menu-text">Usuarios</div>
                            </a>

                        </div>
                        <div class="menu-item">
                            <a href="{{route('show')}}" class="menu-link">
                                <div class="menu-icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <div class="menu-text">Carrito</div>
                            </a>

                        </div>


                    </div>
                </div>
            </div>
        </div>


        <!-- END #sidebar -->

    </div>
    <!-- termina app -->

    <div id="content-top" class="app-content mt-2">
        @section('container')

        @show


    </div>

    @else
    <script>
        window.location = "{{ route('home') }}";
        alert('no has iniciado session');
    </script>
    @endif
</body>