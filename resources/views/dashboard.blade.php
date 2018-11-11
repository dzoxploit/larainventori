<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Lara inventori | Dashboard</title>
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
    <!--[if lt IE 9]>\
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
    #logo {
        Padding-bottom:30px;
        width:100px;
        height:70px;
    }
    .fa-arrow-down{
        color:red;
        font-size:20px;
    }
    .fa-arrow-up{
        color:green;
        font-size:20px;
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
<div class="col-md-3 col-sm-6 col-xs-35">
<div class="info-box">
<!-- Apply any bg-* class to to the icon to color it -->
<span class="info-box-icon bg-orange"><i class="fa fa-desktop"></i></span>
<div class="info-box-content">
  <span class="info-box-text">Perminjaman</span>
  <span class="info-box-number">{{ $countpeminjaman }}</span>
</div><!-- /.info-box-content -->
</div>
</div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
        <!-- Apply any bg-* class to to the icon to color it -->
        <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
        <span class="info-box-text">Pengembalian</span>
        <span class="info-box-number">{{ $countpengembalian }}</span>
        </div><!-- /.info-box-content -->
    </div>
    </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green"><i class="fa fa-desktop"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Barang</span>
                <span class="info-box-number">{{ $countbarang }}</span>
                </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
            </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-red"><i class="fa fa-desktop"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Supplier barang</span>
                        <span class="info-box-number">{{ $countsupplier }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-red"><i class="fa fa-desktop"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Pegawai</span>
                        <span class="info-box-number">{{ $countpegawai }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-purple"><i class="fa fa-cubes"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Barang masuk</span>
                        <span class="info-box-number">{{ $countbarangmasuk }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-yellow"><i class="fa fa-archive"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Barang keluar</span>
                        <span class="info-box-number">{{ $countbarangrusak }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon bg-yellow"><i class="fa fa-archive"></i></span>
                        <div class="info-box-content">
                        <span class="info-box-text">Barang rusak</span>
                        <span class="info-box-number">{{ $countbarangrusak }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                    </div>
                    <div class="col-md-12">
                    <div class="row">
<div class="container">
  <div class="jumbotron" style="background:#1fddff;">
    <h2>Applikasi lara inventori</h2> 
    <p>Applikasi yang digunakan untuk pendataan peminjaman barang dan pengelolaan barang inventaris version 0.0.1 Didin nur yahya (Dzix open source)</p> 
    <p>Nama: Didin nur yahya</p> 
  <p>Kelas: XII RPL</p> 
  </div>
</div>
</div>
</div>
</section>
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


