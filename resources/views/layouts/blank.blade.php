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
        <link href="{{ asset("/bower_components/AdminLTE/plugins/morris/morris.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/sweetalert/dist/sweetalert.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/bower_components/toastr/toastr.css")}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("/assets/css/switch_toggle.css")}}" rel="stylesheet" type="text/css" />





    </head>
    <body class="hold-transition lockscreen">
    
      @yield('content')


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
      <script src="{{ asset ("/validates/formAssignUsersTest.js") }}" type="text/javascript"></script>

      <script src="{{ asset ("/bower_components/AdminLTE/dist/js/app.min.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/AdminLTE/dist/js/pages/dashboard.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/bower_components/AdminLTE/dist/js/demo.js") }}" type="text/javascript"></script>

      <!-- Knockout Assets -->
      <script src="{{ asset ("/bower_components/knockout/dist/knockout.js") }}" type="text/javascript"></script>

      <!-- Appli Bindings -->
      <script src="{{ asset ("/knockout/app.knockout.js") }}" type="text/javascript"></script>

      <!-- Modelos Nockout -->
      <script src="{{ asset ("/knockout/models/users.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/miscelaneos.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/test.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/admin_test.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/user_encuesta.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/levels.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/other_question.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/competencias.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/models/comportamientos.js") }}" type="text/javascript"></script>

      <!-- View Models Knockout -->
      <script src="{{ asset ("/knockout/view_models/users_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/test_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/admin_test_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/company_test_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/assign_users_test.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/levels_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/lists_surveys_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/competencias_view_model.js") }}" type="text/javascript"></script>
      <script src="{{ asset ("/knockout/view_models/comportamientos_view_model.js") }}" type="text/javascript"></script>
      
    </body>
</html>