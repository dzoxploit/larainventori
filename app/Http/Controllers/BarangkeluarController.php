<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barangkeluar;
use App\Barang;
use App\stok;
use Carbon\Carbon;
use DB;


class BarangkeluarController extends Controller
{
    public function index(Request $request)
    {
               $barangkeluar = DB::table('barang_keluar')->get();
                return view('barangkeluar.list_barangkeluar', ['barangkeluar' => $barangkeluar]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id_barang_keluar)
    {

        Barang::destroy($id_barang_keluar);
        return redirect('barangkeluar');
    }
    public function create(Request $request)
    {
          if ($request->isMethod('get')){
            $pegawais = DB::table("pegawais")->pluck("nip","first_name");
            $barangs = DB::table("barangs")->pluck("id_barang","nama_barang");
            $stok = DB::table("stok")->pluck("kode_barang","jumlah_barang_masuk","jumlah_keluar_barang");
            return view('barangkeluar.barangkeluar_add', ['barangs' => $barangs,'pegawais' => $pegawais,'stok' => $stok]);
          }
            else {
                $rules = [
                    'id_barang_keluar' => 'required|string', 
                    'kode_barang' => 'required|string',
                    'penerima' => 'required|string',
                    'jumlah_barang_keluar' => 'required|string',
                    'keperluan' => 'string',
                ];
                $this->validate($request, $rules);
                $barangkeluar= new Barangkeluar;
                $barangkeluar->id_barang_keluar = $request->id_barang_keluar;
                $barangkeluar->kode_barang = $request->kode_barang;
                $barangkeluar->tgl_keluar = \Carbon\Carbon::now();
                $barangkeluar->penerima = $request->penerima;
                $barangkeluar->jumlah_barang_keluar = $request->jumlah_barang_keluar;
                $barangkeluar->keperluan = $request->keperluan;
                $barangkeluar->save();

                //update data jumlah 
                $stok = stok::where('kode_barang', $request->kode_barang)->firstOrFail();
                $stok->jumlah_barang_keluar = $stok->jumlah_barang_keluar + $request->jumlah_barang_keluar;
                $stok->total_barang = $stok->total_barang - $request->jumlah_barang_keluar;
                $stok->save();


                //update data barang
                $barang= Barang::where('id_barang', $request->kode_barang)->firstOrFail();
                $barang->quantity = $barang->quantity - $request->jumlah_barang_keluar;
                $barang->save();

                return redirect('barangkeluar')->with('success','Barang masuk created successfully');    
             }
    }
    public function update(Request $request, $id_barang_keluar)
    {

        if ($request->isMethod('get')){
            $barangs = DB::table("barangs")->pluck("id_barang","nama_barang");            
            $stok = DB::table("stok")->pluck("kode_barang","jumlah_barang_masuk");
            $pegawais = DB::table("pegawais")->pluck("nip",'first_name');
            return view('barangrusak.barangkeluar', ['barangkeluar' => Barangkeluar::where('id_barang_keluar', $id_barang_keluar)->firstOrFail(),'pegawais' => $pegawais,'barangs' => $barangs,'stok' => $stok]);
          }
            else {
                $rules = [
                    'kode_barang' => 'required|string',
                    'tgl_keluar' => 'required|date',
                    'penerima' => 'required|string',
                    'jumlah_barang_keluar1' => 'required|string',
                    'jumlah_keluar_barang' => 'required|string',
                    'keperluan' => 'string',
                ];
                $this->validate($request, $rules);
                $barangkeluar= Barangkeluar::where('id_barang_keluar', $id_barang_keluar);
                $barangkeluar->kode_barang = $request->kode_barang;
                $barangkeluar->nama_barang = $request->nama_barang;
                $barangkeluar->tgl_keluar = $request->tgl_keluar;
                $barangkeluar->penerima = $request->penerima;
                $barangkeluar->jumlah_barang_keluar = $request->jumlah_barang_keluar;
                $barangkeluar->keperluan = $request->keperluan;
                $barangkeluar->save();

                //update data jumlah 
                $stok = Stok::where('kode_barang', $request->kode_barang)->firstOrFail();
                $stok->jumlah_barang_keluar = $request->jumlah_keluar_barang1 + $request->jumlah_barang_keluar;
                $stok->total_barang = $request->jumlah_barang_masuk - $stok->jumlah_barang_keluar;
                $stok->save();


                //update data barang
                $barangs= Barang::where('kode_barang', $request->kode_barang)->firstOrFail();
                $barangs->jumlah_barang_keluar = $request->jumlah_barang_keluar;
                $barangs->quantity = $request->quantity - $request->jumlah_barang_keluar;
                $barangs->save();


                return redirect('barangkeluar')->with('success','Barang masuk created successfully');    
             }
        
    }

     public function show(Request $request, $id_barang_keluar)
    {
       
        
        if ($request->isMethod('get')){
            $barangs = DB::table("barangs")->pluck("id_barang","nama_barang");
            $stok = DB::table("stok")->pluck("kode_barang","jumlah_barang_masuk");
            $pegawais = DB::table("pegawais")->pluck("nip",'first_name');
            return view('barangmasuk.barang_masuk_add', ['pegawais' => $pegawais,'barangs' => $barangs,'stok' => $stok]);
          }
            else {
                $rules = [
                    'kode_barang' => 'required|string',
                    'tgl_keluar' => 'required|date',
                    'penerima' => 'required|string',
                    'jumlah_barang_keluar1' => 'required|string',
                    'jumlah_keluar_barang' => 'required|string',
                    'keperluan' => 'string',
                ];
                $this->validate($request, $rules);
                $barangkeluar= Barangkeluar::where('id_barang_keluar', $id_barang_keluar);
                $barangkeluar->kode_barang = $request->kode_barang;
                $barangkeluar->nama_barang = $request->nama_barang;
                $barangkeluar->tgl_keluar = $request->tgl_keluar;
                $barangkeluar->penerima = $request->penerima;
                $barangkeluar->jumlah_barang_keluar = $request->jumlah_barang_keluar;
                $barangkeluar->keperluan = $request->lokasi_barang;
                $barangkeluar->save();

                //update data jumlah 
                $stok = Stok::where('kode_barang', $request->kode_barang)->firstOrFail();
                $stok->jumlah_barang_keluar = $request->jumlah_keluar_barang1 + $request->jumlah_barang_keluar;
                $stok->total_barang = $request->jumlah_barang_masuk - $stok->jumlah_barang_keluar;
                $stok->save();


                //update data barang
                $barangs= Barang::where('kode_barang', $request->kode_barang)->firstOrFail();
                $barangs->jumlah_barang_keluar = $request->jumlah_barang_keluar;
                $barangs->quantity = $request->quantity - $request->jumlah_barang_keluar;
                $barangs->save();


                return redirect('barangkeluar')->with('success','Barang masuk created successfully');    
             }
        
    }
}
