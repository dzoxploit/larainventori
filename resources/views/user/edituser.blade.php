@extends('layouts.app')
@section('css')
    <style>
        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>
@endsection
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Monitor | Edit user admin</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
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
        <section class="content-header">
        <div class="container">
        <div class="col-md-8 offset-md-2">
            <h1>{{isset($userdata)?'Edit':'New'}} user data </h1>
            <hr/>
            @if(isset($userdata))
                {!! Form::model($userdata,['method'=>'put','files'=>true]) !!}
            @else
                {!! Form::open() !!}
            @endif
            <div class="form-group row required">
                {!! Form::label("name","Name",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),"autofocus",'placeholder'=>'Name']) !!}
                    {!! $errors->first('name','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row required">
            {!! Form::label("nip","nip",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
            <select id="nip" name="nip" class="form-control">
                     <option value="">--- Select posisition ---</option>
                        @foreach ($pegawais as $key => $value)
    
                         <option value="{{ $key }}" />{{ $value }}</option>
                       @endforeach
                 </select>
            </div>
        </div>
            <div class="form-group row required">
                {!! Form::label("email","Email",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::email("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),"autofocus","disabled",'placeholder'=>'example@gmail.com']) !!}
                    {!! $errors->first('email','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row required">
                {!! Form::label("Gambar","Gambar",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    <span class="input-group-btn">
                        <span class="btn btn-default btn-file">
                            Browse {!! Form::file("path_image",null,["class"=>"form-control".($errors->has('path_image')?" is-invalid":""),"autofocus",'id'=>"'imgInp",'placeholder'=>'example.jpg']) !!}
                    {!! $errors->first('path_image','<span class="invalid-feedback">:message</span>') !!}
                    </span>
                </span>
                </div>
            </div>
            <!-- <div class="form-group row required">
                {!! Form::label("Reset password","Reset Password",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::password("password",null,["class"=>"form-control".($errors->has('password')?" is-invalid":""),"autofocus",'placeholder'=>'***********', "disabled"]) !!}
                    {!! $errors->first('password','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row required">
                {!! Form::label("confirmation password","Confirmation password",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::password("password_confirmation",null,["class"=>"form-control".($errors->has('password_confirmation')?" is-invalid":""),"autofocus",'placeholder'=>'***********', "disabled"]) !!}
                    {!! $errors->first('password_confirmation','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div> -->
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    {!! Form::button("Save",["type" => "submit","class"=>"btn
                btn-primary"])!!}
                    <a href="{{url('/user')}}" class="btn btn-danger">
                        Back</a>
                    
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
      <!-- /.box -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('part.partutama.footer')

</div><!-- ./wrapper -->


<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->

<script src="https://code.jquery.com/jquery-2.1.3.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/admin-lte/dist/js/adminlte.min.js") }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
</body>
</html>