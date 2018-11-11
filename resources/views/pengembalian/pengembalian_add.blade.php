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
    <title>Pengembalian | Add Pengembalian data barang baru</title>
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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container">
        <div class="col-md-11 offset-md-2">
            <h1>{{isset($pengembalian)?'Add':'New'}} Pengembalian barang Data </h1>
            <hr/>
                {!! Form::open() !!}
                <div class="form-group row required">
            {!! Form::label("no pengembalian","no pengembalian",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
            {!! Form::text("no_pengembalian",null,["class"=>"form-control".($errors->has('no_pengembalian')?" is-invalid":""),"autofocus",'placeholder'=>'no_pengembalian','type'=>'text','id'=>'no_pengembalian']) !!}
            {!! $errors->first('no_pengembalian','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row required">
            {!! Form::label("no pinjam","no pinjam",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
            <select class="form-control" name="no_pinjam">
            @foreach($peminjaman as $key)
              <option value="{{$key}}">{{$key}}</option>
            @endforeach
          </select>
            </div>
        </div>
        <div class="form-group row required">
            {!! Form::label("id peminjam","id peminjam",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
            {!! Form::text("id_pegawai",null,["class"=>"form-control".($errors->has('id_pegawai')?" is-invalid":""),"autofocus",'placeholder'=>'id_pegawai','type'=>'text','id'=>'id_pegawai']) !!}
            {!! $errors->first('id_pegawai','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
            <div class="form-group row required">
                {!! Form::label("tgl_pinjam","tgl_pinjam",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                {!! Form::date("tgl_pinjam",null,["class"=>"form-control".($errors->has('tgl_pinjam')?" is-invalid":""),"autofocus",'placeholder'=>'tgl_pinjam','type'=>'date','id'=>'tgl_pinjam']) !!}
                {!! $errors->first('tgl_pinjam','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row required">
                {!! Form::label("keterangan","keterangan",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                
                    {!! Form::textarea("keterangan",null,["class"=>"form-control".($errors->has('keterangan')?" is-invalid":""),"autofocus",'placeholder'=>'keterangan']) !!}
                    {!! $errors->first('keterangan','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>

            <div class="col-md-20">
            <div class="table-responsive">  
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
          <td>{!! Form::text("id_barang",null,["class"=>"form-control".($errors->has('id_barang')?" is-invalid":""),"autofocus",'placeholder'=>'id_barang']) !!}
            {!! $errors->first('id_barang','<span class="invalid-feedback">:message</span>') !!}</td>

        <td>{!! Form::text("nama_barang",null,["class"=>"form-control".($errors->has('nama_barang')?" is-invalid":""),"autofocus",'placeholder'=>'nama_barang terakhir barang']) !!}
            {!! $errors->first('nama_barang','<span class="invalid-feedback">:message</span>') !!}</td>

        <td>{!! Form::text("quantity",null,["class"=>"form-control".($errors->has('quantity')?" is-invalid":""),"autofocus",'placeholder'=>'quantity']) !!}
            {!! $errors->first('quanitity','<span class="invalid-feedback">:message</span>') !!}</td>

        <td><select class="form-control" name="status_barang">
              <option value="1">Baik</option>
              <option value="0">rusak</option>
          </select>
        </td>
        <td>{!! Form::text("jumlah_barang_baik",null,["class"=>"form-control".($errors->has('jumlah_barang_baik')?" is-invalid":""),"autofocus",'placeholder'=>'jumlah_barang_baik']) !!}
            {!! $errors->first('jumlah_barang_baik','<span class="invalid-feedback">:message</span>') !!}</td>
        </td>
        <td>{!! Form::text("jumlah_barang_rusak",null,["class"=>"form-control".($errors->has('jumlah_barang_rusak')?" is-invalid":""),"autofocus",'placeholder'=>'jumlah_barang_rusak']) !!}
            {!! $errors->first('jumlah_barang_rusak','<span class="invalid-feedback">:message</span>') !!}</td>
        </td>

          <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
                </table>  
            </div>
            </div>
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    <p></p>
                    {!! Form::button("Save",["type" => "submit", "id" => "save", "class"=>"btn
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
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/admin-lte/dist/js/adminlte.min.js") }}" type="text/javascript"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>

    <script>
    $(document).ready(function(){      
      var postURL = "<?php echo url('addmore'); ?>";
      var i=1;  


      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><select class="form-control" name="id_barang[]"> @foreach($barang as $key => $value) <option value="{{$value}}">{{$key}}</option> @endforeach </select></td> <td>{!! Form::text("nama_barang[]",null,["class"=>"form-control".($errors->has('nama_barang')?" is-invalid":""),"autofocus",'placeholder'=>'nama_barang']) !!} {!! $errors->first('nama_barang','<span class="invalid-feedback">:message</span>') !!}</td><td>{!! Form::text("quantity[]",null,["class"=>"form-control".($errors->has('quantity')?" is-invalid":""),"autofocus",'placeholder'=>'stok terakhir barang']) !!}{!! $errors->first('quantity','<span class="invalid-feedback">:message</span>') !!}</td> <td>{!! Form::text("satuan[]",null,["class"=>"form-control".($errors->has('satuan')?" is-invalid":""),"autofocus",'placeholder'=>'satuan barang']) !!}{!! $errors->first('satuan','<span class="invalid-feedback">:message</span>') !!}</td><td>{!! Form::text("jumlah_barang_pinjam[]",null,["class"=>"form-control".($errors->has('jumlah_barang_pinjam')?" is-invalid":""),"autofocus",'placeholder'=>'jumlah_barang_pinjam']) !!}{!! $errors->first('quantity','<span class="invalid-feedback">:message</span>') !!}</td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#add_name').serialize(),
                type:'json',
                success:function(data)  
                {
                    if(data.error){
                        printErrorMsg(data.error);
                    }else{
                        i=1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display','block');
                        $(".print-error-msg").css('display','none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }  
           });  
      });  


      function printErrorMsg (msg) {
         $(".print-error-msg").find("ul").html('');
         $(".print-error-msg").css('display','block');
         $(".print-success-msg").css('display','none');
         $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
         });
      }
    });  
    $('#id_barang').change(function(){
    var id_barang = $(this).val();    
    if(id_barang){
        $.ajax({
           type:"GET",
           url:"{{url('api/getBarang')}}?id_barang="+id_barang,
           success:function(res){               
            if(res){
                    $("#state").append('<option value="'+key+'">'+value+'</option>');
           
            }else{
               $("#state").empty();
            }
           }
        });
    }else{
        $("#state").empty();
        $("#city").empty();
    }      
   });
    </script>
		<!-- <script>
       $(function () {
        
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
        
                    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
                        background: 'rgba(244, 86, 66)',
                        penColor: 'rgb(1, 1, 1)'
                    });
                    var saveButton = document.getElementById('save');
                    var cancelButton = document.getElementById('clear');
        
        
                    saveButton.addEventListener('click', function (event) {
                        if (signaturePad.isEmpty()) {
                            sweetAlert("Oops...", "Please provide signature first.", "error");
                        } else {
        
                            // do ajax to post it
                            $.ajax({
                                url : 'http://localhost:8000/pengajuanbarangbarus/create',
                                type: 'POST',
                                data : {
                                    signature_pegawai: signaturePad.toDataURL('image/png'),
                                },
                                success: function(response)
                                {
                                    sweetAlert("Success!", "Good stuff! Your signature is now saved", "success");
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
         </script> -->
	
</body>
</html>