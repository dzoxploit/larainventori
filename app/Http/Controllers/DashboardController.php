<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjamanbarang;
use App\Pengembalianbarang;
use App\Barang;
use App\Pegawai;
use App\Barangmasuk;
use App\Barangkeluar;
use App\Barangrusak;
use App\Supplier;
use App\Userdata;
use DB;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
       $countpengembalian   = Pengembalianbarang::select('no_pengembalian')->get()->count();
       $countpeminjaman   = Peminjamanbarang::select('no_pinjam')->get()->count();
       $countpegawai   = Pegawai::select('nip')->get()->count();
       $countsupplier = Supplier::select('kode_supplier')->get()->count();
       $countbarang = Barang::select('id_barang')->get()->count();
       $countbarangmasuk = Barangmasuk::select('id_masuk_barang')->get()->count();
       $countbarangrusak = Barangrusak::select('id_barang')->get()->count();
       $peminjaman = DB::table('peminjaman_barang')->where('status_peminjaman','=','1')->pluck("no_pinjam","id_pegawai","tanggal_peminjaman");     
       return view('dashboard', compact('countpengembalian','countpeminjaman','countbarang','countpegawai','countsupplier','peminjaman','countbarangmasuk','countbarangrusak','count'));
    }
}
