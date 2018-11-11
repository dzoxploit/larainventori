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
    <title>Barang | Add Barang data</title>
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
            <h1>{{isset($barangs)?'Add':'New'}} Barang Data </h1>
            <hr/>
                {!! Form::open() !!}
                <div class="form-group row required">
                {!! Form::label("id_barang","id barang",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("id_barang",null,["class"=>"form-control".($errors->has('id_barang')?" is-invalid":""),"autofocus",'placeholder'=>'Kode Barang']) !!}
                    {!! $errors->first('id_barang','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row required">
                {!! Form::label("nama_barang","Nama barang",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("nama_barang",null,["class"=>"form-control".($errors->has('nama_barang')?" is-invalid":""),"autofocus",'placeholder'=>'Nama Barang']) !!}
                    {!! $errors->first('nama_barang','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row required">
            {!! Form::label("merk","merk",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("merk",null,["class"=>"form-control".($errors->has('merk')?" is-invalid":""),"autofocus",'placeholder'=>'merk','id'=>'merk']) !!}
                {!! $errors->first('merk','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row required">
        {!! Form::label("spesifikasi_barang","spesifikasi_barang",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <div class="col-md-8">
            {!! Form::textarea("spesifikasi_barang",null,["class"=>"form-control".($errors->has('spesifikasi_barang')?" is-invalid":""),"autofocus",'placeholder'=>'spesifikasi_barang','id'=>'spesifikasi_barang']) !!}
            {!! $errors->first('spesifikasi_barang','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="form-group row required">
            {!! Form::label("lokasi_barang","lokasi_barang",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("lokasi_barang",null,["class"=>"form-control".($errors->has('lokasi_barang')?" is-invalid":""),"autofocus",'placeholder'=>'lokasi_barang','id'=>'lokasi_barang']) !!}
                {!! $errors->first('lokasi_barang','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row required">
        {!! Form::label("kategori","kategori",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <div class="col-md-8">
        <select id="id_kategori" name="id_kategori" class="form-control">
                 <option value="">--- Select kategori ---</option>
                    @foreach ($kategoris as $key => $value)

                     <option value="{{ $value }}" />{{ $key }}</option>
                   @endforeach
             </select>
        </div>
    </div>
        <div class="form-group row required">
        {!! Form::label("satuan","satuan",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <div class="col-md-8">
        <select id="satuan" name="satuan" class="form-control">
                 <option value="">--- Select satuan ---</option>
                  <option value="unit">unit</option>
                  <option value="pcs">pcs</option>
                  <option value="set">set</option>
                  <option value="buah">buah</option>
             </select>
        </div>
    </div>
        <div class="form-group row required">
        {!! Form::label("status","status",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <div class="col-md-8">
        <select id="status" name="status" class="form-control">
                 <option value="">--- Select status ---</option>
                  <option value="1">Baik</option>
                  <option value="0">Rusak</option>
             </select>
        </div>
    </div>
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    <p></p>
                    {!! Form::button("Save",["type" => "submit","class"=>"btn
                btn-primary"])!!}&nbsp;
                <a href="{{url('/barang')}}" class="btn btn-danger">
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

	
</body>
</html>