<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Barangmasuk;
use App\Barang;
use App\supplier;
use App\stok;
use Carbon\Carbon;
use DB;


class BarangmasukController extends Controller
{
    public function index(Request $request)
    {
               $barangmasuk = DB::table('barang_masuk')->get();
                return view('barangmasuk.listbarangmasuk', ['barangmasuk' => $barangmasuk]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id_masuk_barang)
    {
        Barangnasuk::destroy($id_masuk_barang);
        return redirect('barangmasuk');
    }
    public function create(Request $request)
    {
          if ($request->isMethod('get')){
            $supplier = DB::table("suppliers")->pluck("kode_supplier","nama_supplier");
            $barangs = DB::table("barangs")->pluck("id_barang","nama_barang");
            $stok = DB::table("stok")->pluck("kode_barang","jumlah_barang_masuk");
            return view('barangmasuk.barangmasuk_add', ['supplier' => $supplier,'barangs' => $barangs,'stok' => $stok]);
          }
            else {
                $rules = [
                    'id_masuk_barang' => 'required|string',
                    'kode_barang' => 'required|string',
                    'jumlah_masuk' => 'required|string',
                    'kode_supplier' => 'required|string',
                ];
                $this->validate($request, $rules);
                $barangmasuk = new Barangmasuk;
                $barangmasuk->id_masuk_barang = $request->id_masuk_barang;
                $barangmasuk->kode_barang = $request->kode_barang;
                $barangmasuk->tanggal_masuk = \Carbon\Carbon::now();
                $barangmasuk->jumlah_masuk = $request->jumlah_masuk;
                $barangmasuk->kode_supplier = $request->kode_supplier;
                $barangmasuk->save();

                //update data jumlah 
                $stok = stok::where('kode_barang', $request->kode_barang)->firstOrFail();
                $stok->jumlah_barang_masuk = $stok->jumlah_barang_masuk + $request->jumlah_masuk;
                $stok->total_barang = $stok->total_barang + $request->jumlah_masuk;
                $stok->save();

                $barang= Barang::where('kode_barang', $request->kode_barang)->firstOrFail();
                $barang->quantity = $barang->quantity - $request->jumlah_barang_masuk;
                $barang->save();
                
                return redirect('barangmasuk')->with('success','Barang masuk created successfully');    
             }
    }
    public function update(Request $request, $id_masuk_barang)
    {

        if ($request->isMethod('get')) {
            $supplier = DB::table("supplier")->pluck("kode_supplier","nama_supplier");
            $barangs = DB::table("barangs")->pluck("id_barang","nama_barang");
            $stok = DB::table("stok")->pluck("kode_barang","jumlah_barang_masuk");
            return view('barangmasuk.barang_masuk_edit', ['barangmasuk' => Barangmasuk::where('id_masuk_barang', $id_barang)->firstOrFail(),'supplier' => $supplier, 'barangs' => $barangs, 'stok' => $stok]);
         } else {
            $rules = [
                'kode_barang' => 'required|string|min:3|max:255',
                'tanggal_masuk' => 'required|date',
                'jumlah_masuk' => 'required|string|min:5|max:255',
                'kode_supplier' => 'required|string|min:5|max|255',
            ];
            $this->validate($request, $rules);
            $barangmasuk= Barangmasuk::where('id_barang', $id_barang)->firstOrFail();
            $barangmasuk->kode_barang = $request->kode_barang;
            $barangmasuk->tanggal_masuk = $request->tanggal_masuk;
            $barangmasuk->jumlah_masuk = $request->jumlah_masuk;
            $barangmasuk->kode_supplier = $request->lokasi_barang;
            $barangmasuk->save();

            $stok = Stok::where('kode_barang', $request->kode_barang)->firstOrFail();
            $stok->jumlah_barang_masuk = $request->jumlah_barang_masuk + $request->jumlah_masuk;
            $stok->save();
            return redirect('barang');
        }
        
    }

     public function show(Request $request, $id_masuk_barang)
    {
       
        if ($request->isMethod('get')) {
            $supplier = DB::table("supplier")->pluck("kode_supplier","nama_supplier");
            $barangs = DB::table("barangs")->pluck("id_barang","nama_barang");
            $stok = DB::table("stok")->pluck("kode_barang","jumlah_barang_masuk");
            return view('barangmasuk.barang_masuk_edit', ['barangmasuk' => Barangmasuk::where('id_masuk_barang', $id_barang)->firstOrFail(),'supplier' => $supplier, 'barangs' => $barangs, 'stok' => $stok]);
         } else {
            $rules = [
                'kode_barang' => 'required|string|min:3|max:255',
                'tanggal_masuk' => 'required|date',
                'jumlah_masuk' => 'required|string|min:5|max:255',
                'kode_supplier' => 'required|string|min:5|max|255',
            ];
            $this->validate($request, $rules);
            $barangmasuk= Barangmasuk::where('id_barang', $id_barang)->firstOrFail();
            $barangmasuk->kode_barang = $request->kode_barang;
            $barangmasuk->tanggal_masuk = $request->tanggal_masuk;
            $barangmasuk->jumlah_masuk = $request->jumlah_masuk;
            $barangmasuk->kode_supplier = $request->lokasi_barang;
            $barangmasuk->save();

            $stok = Stok::where('kode_barang', $request->kode_barang)->firstOrFail();
            $stok->jumlah_barang_masuk = $request->jumlah_barang_masuk + $request->jumlah_masuk;
            $stok->save();
            return redirect('barang');
        }
        
    }
}
