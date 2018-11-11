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
    <title>Pengajuan | Edit Pengajuan</title>
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
            <h1>{{isset($pegawais)?'Edit':'New'}} pegawai data </h1>
            <hr/>
            @if(isset($kategoris))
                {!! Form::model($pegawais,['method'=>'put']) !!}
            @else
                {!! Form::open() !!}
            @endif
            <div class="form-group row required">
            {!! Form::label("no_order","date_order",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("no_order",null,["class"=>"form-control".($errors->has('no_order')?" is-invalid":""),"autofocus",'placeholder'=>'Harga estimasi minimum','type'=>'date','value'=> Carbon::now,'id'=>'harga_minimum']) !!}
                {!! $errors->first('no_order','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
            <div class="form-group row required">
                {!! Form::label("division_departement","Division departemen",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                <select class="form-control" name="posisitions">
        @foreach($departemens as $departemens)
          <option value="{{$departemens->id_departemen}}">{{$departemens->name_departemen}}</option>
        @endforeach
      </select>
                </div>
            </div>
            <div class="form-group row required">
                {!! Form::label("nama_barang","nama_barang",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                
                    {!! Form::text("nama_barang",null,["class"=>"form-control".($errors->has('nama_barang')?" is-invalid":""),"autofocus",'placeholder'=>'Nama barang']) !!}
                    {!! $errors->first('first_name','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
        <div class="form-group row required">
        {!! Form::label("quantity","Quantity",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <div class="col-md-8">
            {!! Form::text("quantity",null,["class"=>"form-control".($errors->has('quantity')?" is-invalid":""),"autofocus",'placeholder'=>'quantity','type'=>'textarea','id'=>'quantity']) !!}
            {!! $errors->first('quantity','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("satuan","Satuan",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <div class="col-md-8">
           <select class="form-control" name="satuan">
           <option value="pcs">unit</option>
           <option value="pcs">pcs</option>
           </select>
            {!! $errors->first('satuan','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("harga","harga",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <div class="col-md-8">
        {!! Form::text("harga",null,["class"=>"form-control".($errors->has('harga')?" is-invalid":""),"autofocus",'placeholder'=>'no_mobile','id'=>'harga']) !!}
        {!! $errors->first('harga','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("kategori","Kategori",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <select class="form-control" name="id_kategori">
        @foreach($kategori as $kategori)
          <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group row required">
        {!! Form::label("id_pegawai","id_pegawai",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <div class="col-md-8">
        {!! Form::text("id_pegawai",null,["class"=>"form-control".($errors->has('id_pegawai')?" is-invalid":""),"autofocus",'placeholder'=>'id_pegawai','value'=>Auth::user()->nip,'id'=>'id_pegawai']) !!}
        {!! $errors->first('id_pegawai','<span class="invalid-feedback">:message</span>') !!}
        </div>
    </div>
    <div class="form-group row required">
        {!! Form::label("signature pegawai","Signature pegawai",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
        <div class="col-md-8">
        <canvas id="signature_pegawai" class="signature-pad" width=400 height=200></canvas>
	    </div>
        </div>
    </div>
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    <p></p>
                    {!! Form::button("Save",["type" => "submit","class"=>"btn
                btn-primary"])!!}&nbsp;
                <a href="{{url('/pegawai')}}" class="btn btn-danger">
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
<script src"https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/admin-lte/dist/js/adminlte.min.js") }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->
      <script type="text/javascript">
      $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var signaturePad = new SignaturePad(document.getElementById('signature_pegawai'), {
                backgroundColor: 'rgba(255, 255, 255, 0)',
                penColor: 'rgb(0, 0, 0)'
            });
            var saveButton = document.getElementById('save');
            var cancelButton = document.getElementById('clear');


            saveButton.addEventListener('click', function (event) {
                if (signaturePad.isEmpty()) {
                    sweetAlert("oops", "Tolong periksa kembali tanda tanggan anda.", "error");
                } else {

                    // do ajax to post it
                    $.ajax({
                        url : '/assessments/signature',
                        type: 'POST',
                        data : {
                            signature: signaturePad.toDataURL('image/png'),
                            signature_pegawai: $('#signature_pegawai').val()
                        },
                        success: function(response)
                        {
                            sweetAlert("Success!", "Selamat data anda berhasil disimpan", "success");
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
                            //data - response from server
                        },
                        error: function(response)
                        {
                            sweetAlert("Oops...", "Sorry, something went wrong! We will investigate as soon as possible.", "error");
                            console.log(response);
                        }
                    });
                }

            });

            cancelButton.addEventListener('click', function (event) {
                signaturePad.clear();
            });

        });
</script>
	
</body>
</html>