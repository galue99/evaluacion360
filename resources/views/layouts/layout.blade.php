<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Administracion')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link href="{{ asset("/assets/css/applications.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/assets/css/animate.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/sweetalert/dist/sweetalert.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/toastr/toastr.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/assets/css/switch_toggle.css")}}" rel="stylesheet" type="text/css" />





    </head>
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
        <header class="main-header">
          <!-- Logo -->
          <a class="logo" href="/">
            <span class="logo-mini"><b>E</b>360</span>
            <span class="logo-lg"><b>Evaluacion360</b></span>
          </a>
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <li>
                  <a href="{{ URL::to('/logout') }}">Cerrar Sesion <i class="fa fa-sign-out"></i></a>
                </li>
              </ul>
            </div>
          </nav>
        </header>
        <aside class="main-sidebar">
          <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
              <div class="pull-left image">
                  <img src="{{ asset("/bower_components/AdminLTE/dist/img/user8-128x128.jpg") }}" class="img-circle" alt="User Image" />
              </div>
              <div class="pull-left info">
                  <p>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</p>
                  <a href="#">{{Auth::user()->position}}</a>
              </div>
            </div>

            <!-- Sidebar Menu -->
            @section('sidebar')
            <ul class="sidebar-menu">
                <li class="header">&nbsp</li>
                @if(Auth::user()->idrol == 1)
                    <li class="treeview">
                        <a href="#"><i class="fa fa-file-text"></i>
                            <span>Evaluación</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/admin/encuesta">Evaluación</a></li>
                            <li><a href="">Asignar Usuarios</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-users"></i>
                            <span>Usuarios</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/admin/users">Usuarios</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cog"></i>
                            <span>Procesos</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/admin/img">Gestionar Empresas</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            @show
            <!-- /.sidebar-menu -->
          </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">

            <h1>@yield('content-header')</h1>

          </section>

          <!-- Main content -->
          <section class="content">

            @yield('content')

          </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
          <strong>Copyright © 2015 <a href="#">Evaluacion360</a>.</strong> All rights reserved.
        </footer>

      </div><!-- ./wrapper -->

      <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
      <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/sweetalert/dist/sweetalert.min.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/toastr/toastr.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/jquery-validation/dist/jquery.validate.js") }}" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="{{ asset ("/bower_components/AdminLTE/plugins/morris/morris.min.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/AdminLTE/plugins/sparkline/jquery.sparkline.min.js") }}" type="text/javascript"></script>

      <script src="{{ asset ("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}" type="text/javascript"></script>

      <!-- Validaciones de Formularios -->
      <script src="{{ asset ("/validates/validate_user.js") }}" type="text/javascript"></script>

      <!-- Knockout Assets -->
      <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/AdminLTE/dist/js/pages/dashboard.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/knockout/dist/knockout.js") }}" type="text/javascript"></script>

      <!-- Appli Bindings -->
      <script src="{{ asset ("/knockout/app.knockout.js") }}" type="text/javascript"></script>

      <!-- Modelos Nockout -->
      <script src="{{ asset ("/knockout/models/evaluadores.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/miscelaneos.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/test.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/admin_test.js") }}" type="text/javascript"></script>

      <!-- View Models Knockout -->
      <script src="{{ asset ("/knockout/view_models/evaluadores_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/test_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/admin_test_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/company_test_view_model.js") }}" type="text/javascript"></script>


    </body>
</html>