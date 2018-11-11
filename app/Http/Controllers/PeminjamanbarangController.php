<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Peminjamanbarang;
use App\Detailpeminjaman;
use App\Barang;

use Carbon\Carbon;
use DB;


class PeminjamanbarangController extends Controller
{
    public function index(Request $request)
    {
        $peminjamanbarang = Peminjamanbarang::all();
        $detailpeminjaman = DB::table('detail_peminjaman')->where('no_peminjaman','=','12')->get();
        $barang = DB::table('barangs')->where('status','=','1')->get();
        return view('peminjaman.listpeminjaman', ['peminjamanbarang' => $peminjamanbarang, 'detailpeminjaman' => $detailpeminjaman, 'barang' => $barang]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($kode_supplier)
    {
        Supplier::destroy($kode_supplier);
        return redirect('supplier');
    }
    public function create(Request $request)
    {
        if ($request->isMethod('get')){
            $barang = DB::table('barangs')->where('status','=','1')
            ->pluck('id_barang','nama_barang','quantity','satuan');
            $pegawais = DB::table("pegawais")
            ->pluck("nip","first_name","last_name");
            return view('peminjaman.peminjaman_add', ['barang' => $barang, 'pegawais' => $pegawais]);
          } else {
            $rules = [
                    'no_pinjam' => 'required|string',
                    'tgl_pengembalian' => 'required|date',
                    'id_pegawai' => 'required|string',
                    'keterangan' => 'string',
                    'id_barang' => 'required|string',
                    'nama_barang' => 'required|string',
                    'satuan' => 'required|string',
                    'jumlah_barang_pinjam' => 'required_with:quantity|integer|min:1|digits_between: 4,7',
                    'quantity' => 'required_with:jumlah_barang_pinjam|integer|greater_than_field:jumlah_barang_pinjam|digits_between:4,7',
                ];
                $this->validate($request, $rules);
                $peminjamanbarang = new Peminjamanbarang;
                $peminjamanbarang->no_pinjam = $request->no_pinjam;
                $peminjamanbarang->tgl_pinjam = \Carbon\Carbon::now();
                $peminjamanbarang->tgl_pengembalian = $request->tgl_pengembalian;
                $peminjamanbarang->id_pegawai = $request->id_pegawai;
                $peminjamanbarang->keterangan = $request->keterangan;
                $peminjamanbarang->status_peminjaman = '1';
                $peminjamanbarang->save();

                $detailpeminjaman = new Detailpeminjaman;
                $detailpeminjaman->no_peminjaman = $request->no_pinjam;
                $detailpeminjaman->id_barang = $request->id_barang;
                $detailpeminjaman->nama_barang = $request->nama_barang;
                $detailpeminjaman->quantity = $request->jumlah_barang_pinjam;
                $detailpeminjaman->satuan = $request->satuan;
                $detailpeminjaman->status_detail = '1';        
                $detailpeminjaman->save();

                $barangdipinjam = Barang::where('id_barang','=',$request->id_barang)->firstOrFail();
                $barangdipinjam->quantity = $barangdipinjam->quantity - $request->jumlah_barang_pinjam;
                $barangdipinjam->save();
                return redirect('peminjamanbarang')->with('success','Peminjaman barang baru created successfully');
         }
    }
    public function update(Request $request, $kode_supplier)
    {

        if ($request->isMethod('get')) {
            return view('supplier.supplier_edit', ['supplier' => Supplier::where('kode_supplier', $kode_supplier)->firstOrFail()]);
         } else {
            $rules = [
                'kode_supplier' => 'required|string',
                'nama_supplier' => 'required|string|min:3|max:255',
                'alamat_supplier' => 'required|string|min:3|max:255',
                'telp_supplier' => 'required|string|min:5|max:255',
                'kota_supplier' => 'required|string|min:5|max|255',
                
            ];
            $this->validate($request, $rules);
            $suppliers= Supplier::where('kode_supplier', $kode_supplier)->firstOrFail();
            $suppliers->nama_supplier = $request->nama_supplier;
            $suppliers->nama_supplier = $request->nama_supplier;
            $suppliers->alamat_supplier = $request->alamat_supplier;
            $suppliers->telp_supplier = $request->telp_supplier;
            $suppliers->kota_supplier = $request->kota_supplier;
            $suppliers->save();
            return redirect('supplier');
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
