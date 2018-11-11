<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barangrusak;
use App\Barang;
use Carbon\Carbon;
use DB;


class BarangrusakController extends Controller
{
    public function index(Request $request)
    {
               $barangrusak = DB::table('barang_rusak')->get();
                return view('barangrusak.list_barangrusak', ['barangrusak' => $barangrusak]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
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
                    'kode_barang' => 'required|string',
                    'tgl_keluar' => 'required|date',
                    'penerima' => 'required|string',
                    'jumlah_barang_keluar' => 'required|string',
                    'keperluan' => 'string',
                ];
                $this->validate($request, $rules);
                $barangkeluar= new Barangkeluar;
                $barangkeluar->kode_barang = $request->kode_barang;
                $barangkeluar->nama_barang = $request->nama_barang;
                $barangkeluar->tgl_keluar = $request->tgl_keluar;
                $barangkeluar->penerima = $request->penerima;
                $barangkeluar->jumlah_barang_keluar = $request->jumlah_barang_keluar;
                $barangkeluar->keperluan = $request->keperluan;
                $barangkeluar->save();

                //update data jumlah 
                $stok = Stok::where('kode_barang', $request->kode_barang)->firstOrFail();
                $stok->jumlah_barang_keluar = $stok->jumlah_barang_keluar + $request->jumlah_barang_keluar;
                $stok->total_barang = $stok->total_barang - $request->jumlah_barang_keluar;
                $stok->save();


                //update data barang
                $barangs= Barang::where('kode_barang', $request->kode_barang)->firstOrFail();
                $barangs->quantity = $barangs->quantity - $request->jumlah_barang_keluar;
                $barangs->save();

                return redirect('barangkeluar')->with('success','Barang masuk created successfully');    
             }
    }
    public function update(Request $request, $id_barang)
    {
        if ($request->isMethod('get')){
            return view('barangrusak.barangrusak_update', ['barangrusak' => Barangrusak::where('id_barang', $id_barang)->firstOrFail()]);
          }
            else {
                $rules = [
                    'nama_barang' => 'required|string',
                    'merk' => 'required|string',
                    'id_kategori' => 'required|string',
                    'quantity_rusak' => 'required|string',
                    'jumlah_diperbaiki' => 'required|string',
                    'satuan' => 'string',
                ];
                $this->validate($request, $rules);
                $barangrusak= Barangrusak::where('id_barang', $id_barang)->firstOrFail();
                $barangrusak->nama_barang = $request->nama_barang;
                $barangrusak->merk = $request->merk;
                $barangrusak->id_kategori = $request->id_kategori;
                $barangrusak->quantity_rusak = $barangrusak->quantity_rusak - $request->jumlah_diperbaiki;
                $barangrusak->satuan= $request->satuan;
                $barangrusak->save();

            
                //update data barang
                $barang= Barang::where('id_barang','=',$request->id_barang)->firstOrFail();
                $barang->quantity = $barang->quantity + $request->jumlah_diperbaiki;
                $barang->save();


                return redirect('barangrusak')->with('success','Barang masuk created successfully');    
             }
        
    }
}
