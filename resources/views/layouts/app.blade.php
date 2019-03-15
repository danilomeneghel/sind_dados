<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Sind Dados</title>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-slider.css') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ url('/home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">Sind</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">
                    SindDados
                </span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <!-- Navbar Right Menu -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="images/avatar-placeholder.svg" alt="" width="30" class="img-circle">
							Admin
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="#">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

        <div class="main-page">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        <ul class="sidebar-menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-home"></i><span>Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-bar-chart"></i><span>Gráficos</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-sign-out"></i><span>Sair</span>
                                </a>
                            </li>
                        </ul>
                    </ul>
                </section>
            </aside>

            <div class="content-wrapper">
                @yield('content')                
            </div>
        </div>

        <!-- Jquery -->
        <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>

        <!-- Bootstrap -->
        <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap-toggle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap-slider.js') }}"></script>

        <!-- Filtro -->
        <script type="text/javascript" src="<?php echo asset('js/grafico_filtro.js'); ?>"></script>

        <!-- TreeView -->
        <script type="text/javascript" src="<?php echo asset('js/treeview.js'); ?>"></script>

        <!-- Gráfico -->
        <script type="text/javascript" src="<?php echo asset('js/highcharts.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/highcharts_exporting.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/highcharts_export-data.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/grafico_coluna.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/grafico_linha.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo asset('js/grafico_area.js'); ?>"></script>

        <!-- App AdminLTE -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
