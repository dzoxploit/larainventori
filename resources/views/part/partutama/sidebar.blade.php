<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="{{asset('images/'.Auth::user()->path_image)}}" class="img-circle" style="width:50px; height:50px;" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i><span>Home</span></a></li>
                <li class="master" style="border-style: solid; border-color: #2f2f3a; background:#19191e;"><a href="#">&nbsp;&nbsp;&nbsp;<span>Master Data</span></a></li>
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-male"></i><span>Pegawai</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('pegawais/create')}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-plus-square-o"></i>Add Pegawai</a>
                                        <a href="{{ url('/pegawais') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List Pegawai</a>
                                    </li>>
                                </ul>
                        </li>  
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-archive"></i><span>Kategori</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('kategoris/create')}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-plus-square-o"></i>Add kategori</a>
                                        <a href="{{ url('/kategoris') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List kategori</a>
                                    </li>>
                                </ul>
                        </li>  
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-map-marker"></i><span>Posisition</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('posisitions/create')}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-plus-square-o"></i>Add Posisition</a>
                                        <a href="{{ url('/posisitions') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List posisitions</a>
                                    </li>>
                                </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-map-marker"></i><span>Departemen</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('departemens/create')}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-plus-square-o"></i>Add Posisition</a>
                                        <a href="{{ url('/departemens') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List posisitions</a>
                                    </li>
                                </ul>
                        </li>  
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-angle-double-up"></i><span>Peminjaman barang </span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('peminjamanbarang/create')}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-plus-square-o"></i>Add Pengajuan barang baru</a>
                                        <a href="{{ url('/peminjamanbarang') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List pengajuan barang</a>
                                    </li>>
                                </ul>
                        </li>  
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-exchange"></i><span>Pengembalian barang</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="{{url('pengembalianbarang/create')}}">&nbsp;&nbsp;&nbsp;<i class="fa fa-plus-square-o"></i>Add Permintaan penggunaan barang</a>
                                        <a href="{{ url('/pengembalianbarang') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List penggunann barang</a>
                                    </li>
                                </ul>
                        </li>  
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-cube"></i><span>Barang</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                <li> <a href="{{ url('barang/create') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>Tambah barang</a></li>
                                <li> <a href="{{ url('/barang') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List barang</a></li>
                                   
                                </ul>
                        </li>  
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-cube"></i><span>Barang masuk</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                <li> <a href="{{ url('barangmasuk/create') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>Tambah barang</a></li>
                                 <li> <a href="{{ url('/barangmasuk') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List barang</a>
                                    </li>
                                </ul>
                        </li> 
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-cube"></i><span>Barang keluar</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                <li> <a href="{{ url('barangkeluar/create') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>Tambah barang</a></li>
                                <li> <a href="{{ url('/barangkeluar') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List barang</a>
                                    </li>
                                </ul>
                        </li> 
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-laptop"></i><span>Barang rusak</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                <li> <a href="{{ url('barangrusak/create') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>Tambah barang rusak</a></li>
                                <li> <a href="{{ url('/barangrusak') }}">&nbsp;&nbsp;&nbsp;<i class="fa fa-table"></i>List barang rusak</a>
                                    </li>
                                </ul>
                        </li> 
                        <li class="treeview">
                            <a href="#">&nbsp;&nbsp;&nbsp;<i class=" fa fa-user"></i><span>User managemen</span><i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                <li><a href="{{ url('/register') }}"><i class="fa fa-user-plus"></i>Add user</a></li>
                                <li><a href="{{ url('/user') }}"><i class="fa fa-table"></i>List user</a></li>
                                <li><a href="{{ url('/user/reset', Auth::user()->id) }}"><i class="fa fa-unlock-alt"></i>reset password</a></li>
                                </ul>
                        </li>  
                    </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

