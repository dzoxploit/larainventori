<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Barang;
use App\stok;
use App\Barangrusak;
use App\Supplier;
use Carbon\Carbon;
use DB;


class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barangs = DB::table('barangs')->get();
        return view('barang.listbarang', ['barangs' => $barangs]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id_barang)
    {
        Barang::destroy($id_barang);
        return redirect('barang');
    }
    public function create(Request $request)
    {
             if ($request->isMethod('get')){
             $kategoris = DB::table("kategoris")->pluck("id_kategori","nama_kategori");
             return view('barang.barang_add', ['kategoris' => $kategoris]);
             } else {
                $rules = [
                    'id_barang' => 'required|string',
                    'nama_barang' => 'required|string',
                    'merk' => 'required|string',
                    'spesifikasi_barang' => 'required|string',
                    'lokasi_barang' => 'required|string',
                    'id_kategori' => 'required|string',
                    'satuan' => 'required|string',
                    'status' => 'required|string',
                ];
                $this->validate($request, $rules);
                //tambah data barang
                $barang= new Barang;
                $barang->id_barang = $request->id_barang;
                $barang->nama_barang = $request->nama_barang;
                $barang->merk = $request->merk;
                $barang->spesifikasi_barang = $request->spesifikasi_barang;
                $barang->lokasi_barang = $request->lokasi_barang;
                $barang->id_kategori = $request->id_kategori;
                $barang->quantity = '0';
                $barang->satuan = $request->satuan;
                $barang->status = $request->status;
                $barang->save();

                $stok= new stok;
                $stok->kode_barang = $request->id_barang;
                $stok->nama_barang = $request->nama_barang;
                $stok->jumlah_barang_masuk = '0';
                $stok->jumlah_barang_keluar = '0';
                $stok->total_barang = '0';
                $stok->keterangan = 'barang inventori barang';
                $stok->save();

                $barangrusak= new Barangrusak;
                $barangrusak->id_barang = $request->id_barang;
                $barangrusak->nama_barang = $request->nama_barang;
                $barangrusak->merk = $request->merk;
                $barangrusak->id_kategori = $request->id_kategori;
                $barangrusak->quantity_rusak = '0';
                $barangrusak->satuan = $request->satuan;
                $barangrusak->save();



                   return redirect('barang')->with('success','Supplier created successfully');    
               }
    }
    public function update(Request $request, $id_barang)
    {

        if ($request->isMethod('get')) {
            $kategoris = DB::table("kategoris")->pluck("id_kategori","nama_kategori");
            return view('barang.barang_edit', ['barangs' => Barang::where('id_barang', $id_barang)->firstOrFail(),'kategoris' => $kategoris]);
         } else {
            $rules = [
                'id_barang' => 'required|string',
                'nama_barang' => 'required|string',
                'merk' => 'required|string',
                'spesifikasi_barang' => 'required|string',
                'lokasi_barang' => 'required|string',
                'id_kategori' => 'required|string',
                'satuan' => 'required|string',
                'status' => 'required|string',
            ];
            $this->validate($request, $rules);
            //tambah data barang
            $barang= Barang::where('id_barang','=',$request->id_barang)->firstOrFail();
            $barang->id_barang = $request->id_barang;
            $barang->nama_barang = $request->nama_barang;
            $barang->merk = $request->merk;
            $barang->spesifikasi_barang = $request->spesifikasi_barang;
            $barang->lokasi_barang = $request->lokasi_barang;
            $barang->id_kategori = $request->id_kategori;
            $barang->satuan = $request->satuan;
            $barang->status = $request->status;
            $barang->save();

            $stok = stok::where('id_barang', $request->id_barang)->firstOrFail();
            $stok->kode_barang = $request->id_barang;
            $stok->nama_barang = $request->nama_barang;
            $stok->keterangan = 'barang inventori barang';
            $stok->save();

            $barangrusak= Barangrusak::where('id_barang','=',$request->id_barang)->firstOrFail();;
            $barangrusak->id_barang = $request->id_barang;
            $barangrusak->nama_barang = $request->nama_barang;
            $barangrusak->merk = $request->merk;
            $barangrusak->id_kategori = $request->id_kategori;
            $barangrusak->satuan = $request->satuan;
            $barangrusak->save();
        }
        
    }

     public function show(Request $request, $id)
    {
       
        if ($request->isMethod('get')) {
            return view('supplier.supplier_edit', ['supplier' => Supplier::where('kode_supplier', $kode_supplier)->firstOrFail(),'kategoris' => $kategori]);
         } else {
            $rules = [
                'kode_supplier' => 'required|string|min:3|max:255',
                'nama_supplier' => 'required|string|min:3|max:255',
                'alamat_supplier' => 'required|string|min:3|max:255',
                'telp_supplier' => 'required|string|min:5|max:255',
                'kota_supplier' => 'required|string|min:5|max|255',
                
            ];
            $this->validate($request, $rules);
            $supplier= Supplier::where('kode_supplier', $kode_supplier)->firstOrFail();
            $supplier->nama_supplier = $request->nama_supplier;
            $supplier->alamat_supplier = $request->alamat_supplier;
            $supplier->telp_supplier = $request->telp_supplier;
            $supplier->kota_supplier = $request->kota_supplier;
            $supplier->save();
            return redirect('supplier');
        }
        
    }
}
