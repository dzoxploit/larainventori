<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Departemen | List data departemen</title>
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
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <div class="box">
        <div class="box-header">
          <h3 class="box-title">Lists table departemen data</h3>
        </div>
        {!! Form::close() !!}
        <!-- /.box-header -->
        <div class="box-body table-responsive">
        <table id="example" class="table table-responsive table-striped">
        <thead>
            <tr>
                <th>id departemen</th>
                <th>name departemen</th>
                <th>id_headofdept</th>
                <th>name_headofdept</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @php
  $i=1;
@endphp
      @foreach($departemens as $departemens)
          <tr>
              <td style="vertical-align: middle;text-align: center">{{$departemens->id_departemen}}</td>
              <td style="vertical-align: middle">{{ $departemens->name_departemen }}</td>
              <td style="vertical-align: middle">{{ $departemens->id_headofdept}}</td>
              <td style="vertical-align: middle">{{ $departemens->status}}</td>
              <td>
              <form id="frm_{{$departemens->id_departemen}}"
                      action="{{url('departemens/delete/'.$departemens->id_departemen)}}"
                      method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                      <a class="btn btn-success btn-sm" title="Create"
                      href="{{url('departemens/create')}}">
                      <i class="fa fa-plus"></i></a>
                          <a class="btn btn-info btn-sm" title="Show"
                      href="{{url('departemens/show/'.$departemens->id_departemen)}}"><i class="fa fa-search"></i></a>
                      <input type="hidden" name="_method" value="delete"/>
                      {{csrf_field()}}
                      <a class="btn btn-danger btn-sm" title="Delete"
                      href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$departemens->id_departemen}}').submit()">
                      <i class="fa fa-trash"></i>
                      </a>
                  </form>
              @endforeach
  </td>
          </tr>                                         
        </tbody>
    </table>
        </div>
        <!-- /.box-body -->
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


