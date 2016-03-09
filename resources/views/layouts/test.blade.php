<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Encuesta')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/assets/css/applications.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/assets/css/animate.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/sweetalert/dist/sweetalert.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/toastr/toastr.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/assets/css/switch_toggle.css")}}" rel="stylesheet" type="text/css" />
    </head>
    <body class="skin-blue sidebar-collapse">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a class="logo" href="/administrative">
                <span class="logo-mini"><b>E</b>360</span>
                <span class="logo-lg"><b>Evaluacion360</b></span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ URL::to('/logout') }}">Cerrar Sesion <i class="fa fa-sign-out"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="content-wrapper" style="background-color: #222d32">
            <section class="content">
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

    </div>

      <script src="{{ asset ("/bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
      <script src="{{ asset ("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/sweetalert/dist/sweetalert.min.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/toastr/toastr.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/jquery-validation/dist/jquery.validate.js") }}" type="text/javascript"></script>

      <!-- Validaciones de Formularios -->
      <script src="{{ asset ("/validates/validate_user.js") }}" type="text/javascript"></script>

      <!-- Knockout Assets -->
      <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/knockout/dist/knockout.js") }}" type="text/javascript"></script>
      
      <!-- Appli Bindings -->
      <script src="{{ asset ("/knockout/app.knockout.js") }}" type="text/javascript"></script>

      <!-- Modelos Nockout -->
      <script src="{{ asset ("/knockout/models/evaluadores.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/miscelaneos.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/test.js") }}" type="text/javascript"></script>

      <!-- View Models Knockout -->
      <script src="{{ asset ("/knockout/view_models/evaluadores_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/test_view_model.js") }}" type="text/javascript"></script>
    </body>
</html>