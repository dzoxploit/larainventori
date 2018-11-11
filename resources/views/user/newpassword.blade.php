<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Monitor | List data Monitor</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <!-- Theme style -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-green.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
    #logo {
        Padding-bottom:30px;
        width:100px;
        height:70px;
    }

    #photoprofile {

        width:100px;
        height:100px;
    }

    
    </style>
</head>
<body class="skin-green">
<div class="wrapper">

    <!-- Header -->
    @include('part.partutama.header')

    <!-- Sidebar -->
    @include('part.partutama.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
        <div class="container">
        <div class="col-md-10 offset-md-2">
        	<h3>Add new password user</h3>
            <hr/>
            @if(isset($userdata))
                {!! Form::model($userdata,['method'=>'put']) !!}
            @else
                {!! Form::open() !!}
            @endif
            <hr/>
           <div class="col-xs-35 col-sm-50 col-md-50 col-lg-60 col-xs-offset-30 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Add reset password Profile</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
                <div class=" col-md-10 col-lg-10 "> 
                  <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td>{!! Form::label("id account","id account",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}</td>
                        <td>
                        <div class="form-group">
                         <div class="col-md-6">
                         {!! Form::text("id",null,["class"=>"form-control".($errors->has('id')?" is-invalid":""),"autofocus","disabled",'placeholder'=>'Id']) !!}
                         {!! $errors->first('id','<span class="invalid-feedback">:message</span>') !!}
                        </div>
                    </div>
                        </td>
                      </tr>
                      <tr>
                        <td>{!! Form::label("Reset password","Reset Password",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}</td>
                        <td>
                        <div class="form-group row required">
                         <div class="col-md-8">
                        {!! Form::password("password",null,["class"=>"form-control".($errors->has('password')?" is-invalid":""),"autofocus",'placeholder'=>'***********', "disabled"]) !!}
                        {!! $errors->first('password','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>{!! Form::label("confirmation password","Confirmation password",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}</td>
                        <td><div class="form-group row required">
                <div class="col-md-8">
                    {!! Form::password("password_confirmation",null,["class"=>"form-control".($errors->has('password_confirmation')?" is-invalid":""),"autofocus",'placeholder'=>'***********', "disabled"]) !!}
                    {!! $errors->first('password_confirmation','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div> </td>
                      </tr>
                     
                    </tbody>
                  </table>
                  
                  <div class="col-md-4">
                    {!! Form::button("Save",["type" => "submit","class"=>"btn
                btn-primary"])!!}
                    <a href="{{url('/user')}}" class="btn btn-danger">
                        Back</a>
                    
                </div>
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        
                    </div>

              <!-- Form reset password -->
            <!-- Your Page Content Here -->
            {!! Form::close() !!}
            
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('part.partutama.footer')

</div><!-- ./wrapper -->


<!-- REQUIRED JS SCRIPTS -->
<script>
  $(function() {
    $('#toggle-two').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled'
    });
  })
</script>
<!-- jQuery 2.1.3 -->

<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
  <script type="text/javascript"
  src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/admin-lte/dist/js/adminlte.min.js") }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>


