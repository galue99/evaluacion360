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
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
        <header class="main-header">
          <!-- Logo -->
          <a class="logo" href="/administrative">
            <span class="logo-mini"><b>E</b>360</span>
            <span class="logo-lg"><b>Evaluacion360</b></span>
          </a>
          <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
        </header>
        <aside class="main-sidebar">
          <section class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
              <div class="pull-left image">
                  <img src="{{ asset("/bower_components/AdminLTE/dist/img/user8-128x128.jpg") }}" class="img-circle" alt="User Image" />
              </div>
              <div class="pull-left info">
                  <p>Administrador</p>
                  <a href="#">Supervisor</a>
              </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
              @section('sidebar')
                <li class="header">HEADER</li>
                <li class="active"><a href="#"><span>Link</span></a></li>

                <li class="treeview">
                    <a href="#"><span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">Link in level 2</a></li>
                        <li><a href="#">Link in level 2</a></li>
                    </ul>
                </li>
              @show
            </ul>
            <!-- /.sidebar-menu -->
          </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">

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
      <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
    </body>
</html>