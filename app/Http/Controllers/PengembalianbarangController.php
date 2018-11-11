<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Barangrusak;
use App\Barang;
use App\Detailpeminjaman;
use App\Peminjamanbarang;
use App\Pengembalianbarang;
use Carbon\Carbon;
use DB;

class PengembalianbarangController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
     $pengembalian = Pengembalianbarang::all();
    //  $detailpeminjaman = DB::table('detail_peminjaman')->where('no_pinjam','=',$pengembalian->kode_peminjaman)->pluck('nama_barang','quantity','satuan');
     $barang = DB::table('barangs')->where('status','=','1')->pluck('id_barang','nama_barang','quantity','satuan');
     $detailpeminjaman = DB::table('detail_peminjaman')->where('no_peminjaman','=','12')->get();
     return view('pengembalian.listpengembalian', ['pengembalian' => $pengembalian,'detailpeminjaman' => $detailpeminjaman, 'barang' => $barang]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($no_pengembalian, $no_pinjam)
    {
        Pengembalian::destroy($no_pengembalian);
        Peminjaman::destory($no_pinjam);
        Detailpeminjamam::destroy($no_pinjam);
        return redirect('pengembalian');
    }
    public function create(Request $request)
    {
          if ($request->isMethod('get')){
            $peminjaman = DB::table('peminjaman_barang')->where('status_peminjaman','=','1')->pluck('no_pinjam');
            $peminjamanvalidasi = Peminjamanbarang::all();
            $barang = DB::table('barangs')->where('status','=','1')
            ->pluck('id_barang','nama_barang','quantity','satuan');
            $pegawais = DB::table("pegawais")->where('nip','=','1')
            ->pluck("nip","first_name","last_name");
            return view('pengembalian.pengembalian_add', ['peminjaman' => $peminjaman, 'barang' => $barang, 'pegawais' => $pegawais]);
          }
            else {
                $rules = [
                    'no_pengembalian' => 'required|string',
                    'no_pinjam' => 'required|string',
                    'tgl_pinjam' => 'required|date',
                    'id_pegawai' => 'required|string',
                    'keterangan' => 'string',
                    'id_barang' => 'required|string',
                    'nama_barang' => 'required|string',
                    'quantity' => 'string',
                    'status_barang' => 'required|string',
                ];
                $this->validate($request, $rules);
                $pengembalianbarang = new Pengembalianbarang;
                $pengembalianbarang->no_pengembalian = $request->no_pengembalian;
                $pengembalianbarang->kode_peminjaman = $request->no_pinjam;
                $pengembalianbarang->tanggal_pengembalian = Carbon::now();
                $pengembalianbarang->status_pengembalian = '1';
                $pengembalianbarang->keterangan = $request->keterangan;
                $pengembalianbarang->save();

                $peminjamanbarang = Peminjamanbarang::where('no_pinjam','=',$request->no_pinjam)->firstOrFail();
                $peminjamanbarang->status_peminjaman='0';
                $peminjamanbarang->save();
            
                $detailpeminjaman = Detailpeminjaman::where('no_peminjaman','=',$request->no_pinjam)->firstOrFail();
                $detailpeminjaman->status_detail = '0';        
                $detailpeminjaman->save();


                if($request->status_barang == '1' && $request->jumlah_barang_baik != null && $request->jumlah_barang_rusak == null){
                   
                    $barangbenar = Barang::where('id_barang','=',$request->id_barang)->firstOrFail();
                    $barangbenar->quantity = $barangbenar->quantity + $request->jumlah_barang_baik;
                    $barangbenar->save();
                } else if($request->status_barang == '0' && $request->jumlah_barang_rusak != null && $request->jumlah_barang_baik == null ){
                   
                    $barangrusak = Barangrusak::where('id_barang','=', $request->id_barang)->firstOrFail();
                    $barangrusak->quantity_rusak = $barangrusak->quantity_rusak + $request->jumlah_barang_buruk;
                    $barangrusak->save();
                } else if($request->status_barang == '1' && $request->jumlah_barang_rusak == null && $request->jumlah_barang_baik == null){
                  
                    $barangbenar = Barang::where('id_barang','=', $request->id_barang)->firstOrFail();
                    $barangbenar->quantity = $barangbenar->quantity + $request->quantity;
                    $barangbenar->save();
                
              } else if($request->status_barang == '0' && $request->jumlah_barang_rusak == null && $request->jumlah_barang_baik == null ){
                 $barangrusak = Barangrusak::where('id_barang','=', $request->id_barang)->firstOrFail();
                 $barangrusak->quantity_rusak = $barangrusaktampil->quantity_rusak + $request->quantity;
                 $barangrusak->save();
            } else if($request->status_barang == '0' && $request->jumlah_barang_rusak != null && $request->jumlah_barang_baik != null ){
                $barangbenar = Barang::where('id_barang','=',$request->id_barang)->firstOrFail();
                $barangbenar->quantity = $barangbenar->quantity + $request->jumlah_barang_baik;
                $barangbenar->save();

                $barangrusak = Barangrusak::where('id_barang','=', $request->id_barang)->firstOrFail();
                $barangrusak->quantity_rusak = $barangrusak->quantity_rusak + $request->jumlah_barang_buruk;
                $barangrusak->save();

            }
                return redirect('pengembalianbarang')->with('success','Peminjaman barang baru created successfully');    
             }
    }
    public function update(Request $request, $no_pinjam, $id_barang)
    {

        // if ($request->isMethod('get')){
        //     $peminjaman = DB::table('peminjaman_barang')->where('status_peminjaman','=','1')->pluck('no_pinjam','tgl_pinjam','tgl_pengembalian','id_pegawai','keterangan');
        //     $barang = DB::table('barangs')->where('status','=','1')
        //     ->pluck('id_barang','nama_barang','quantity','satuan');
        //     $pegawais = DB::table("pegawais")->where('nip','=',$peminjaman->id_pegawai)
        //     ->pluck("nip","first_name","last_name");
        //     return view('pengembalian.pengajuan_add', ['departemens' => $departemens, 'kategoris' => $kategoris]);
        //   }
        //     else {
        //         $rules = [
        //             'no_pengembalian' => 'required|string',
        //             'no_pinjam' => 'required|string|min:8|max:20',
        //             'tgl_pinjam' => 'required|date',
        //             'tanggal_pengembalian' => 'required|date',
        //             'id_pegawai' => 'required|string',
        //             'keterangan' => 'string',
        //             'status_peminjaman' => 'required|string|min:3|max:255',
        //             'id_barang' => 'required|string',
        //             'nama_barang' => 'required|string',
        //             'jumlah_quantity' => 'string',
        //             'jumlah_barang_baik' => 'string',
        //             'jumlah_barang_rusak' => 'string',
        //             'satuan' => 'required|string',
        //             'status_barang' => 'required|string',
        //         ];
        //         $this->validate($request, $rules);
        //         $pengembalianbarang = new Pengembalianbarang();
        //         $pengembalianbarang->kode_peminjaman = $request->no_pinjam;
        //         $pengembalianbarang->tanggal_pengembalian = Carbon::now();
        //         $pengembalianbarang->status_pengembalian = '1';
        //         $pengembalianbarang->keterangan = $request->keterangan;
        //         $pengembalianbarang->save();

        //         $this->validate($request, $rules);
        //         $detailpeminjaman = Detailpeminjaman::where('no_peminjaman','=',$request->no_pinjam);
        //         $detailpeminjaman->status_detail = $request->status_detail;        
        //         $detailpeminjaman->save();

        //         $barangrusaktampil = DB::table('barang_rusak')->where('id_barang','=',$request->id_barang)
        //         ->pluck('id_barang','nama_barang','quantity_rusak','satuan');

        //         if($request->status_barang == '1' && $request->jumlah_barang_baik != null){
        //             $this->validate($request, $rules);
        //             $barangbenar = Barang::where('id_barang','=',$request->id_barang)->firstOrFail();
        //             $barangbenar->quantity = $request->quantity + $request->jumlah_barang_baik;
        //             $barangbenar->save();
        //         } else if($request->status_barang == '0' && $request->jumlah_barang_buruk != null && $request->jumlah_barang_baik == null ){
        //             $this->validate($request, $rules);
        //             $barangrusak = Barangrusak::where('id_barang','=', $request->id_barang)->firstOrFail();
        //             $barangrusak->quantity_rusak = $barangrusaktampil->quantity_rusak + $request->jumlah_barang_buruk;
        //             $barangrusak->save();
        //         } else if($request->status_barang == '1' && $request->jumlah_barang_buruk != null && $request->jumlah_barang_baik != null){
        //             $this->validate($request, $rules);
        //             $barangrbenar = Barangr::where('id_barang','=', $request->id_barang)->firstOrFail();
        //             $barangbenar->quantity = $request->quantity + $request->jumlah_quantity;
        //             $barangbenar->save();
                
        //       } else if($request->status_barang == '0' && $request->jumlah_barang_buruk != null && $request->jumlah_barang_baik == null ){
        //          $this->validate($request, $rules);
        //          $barangrusak = Barangrusak::where('id_barang','=', $request->id_barang)->firstOrFail();
        //          $barangrusak->quantity_rusak = $barangrusaktampil->quantity_rusak + $request->jumlah_quantity;
        //          $barangrusak->save();
        //     }
        //         return redirect('pengembalianbarang')->with('success','Peminjaman barang baru created successfully');    
        //      }
        
    }
     public function show(Request $request, $id)
    {
        // if ($request->isMethod('get')){
        //     $peminjaman = DB::table('peminjaman_barang')->where('status_peminjaman','=','1')->pluck('no_pinjam','tgl_pinjam','tgl_pengembalian','id_pegawai','keterangan');
        //     $barang = DB::table('barangs')->where('status','=','1')
        //     ->pluck('id_barang','nama_barang','quantity','satuan');
        //     $pegawais = DB::table("pegawais")->where('nip','=',$peminjaman->id_pegawai)
        //     ->pluck("nip","first_name","last_name");
        //     return view('pengembalian.pengajuan_add', ['departemens' => $departemens, 'kategoris' => $kategoris]);
        //   }
        //     else {
        //         $rules = [
        //             'no_pengembalian' => 'required|string',
        //             'no_pinjam' => 'required|string|min:8|max:20',
        //             'tgl_pinjam' => 'required|date',
        //             'tanggal_pengembalian' => 'required|date',
        //             'id_pegawai' => 'required|string',
        //             'keterangan' => 'string',
        //             'status_peminjaman' => 'required|string|min:3|max:255',
        //             'id_barang' => 'required|string',
        //             'nama_barang' => 'required|string',
        //             'jumlah_quantity' => 'string',
        //             'jumlah_barang_baik' => 'string',
        //             'jumlah_barang_rusak' => 'string',
        //             'satuan' => 'required|string',
        //             'status_barang' => 'required|string',
        //         ];
        //         $this->validate($request, $rules);
        //         $pengembalianbarang = new Pengembalianbarang();
        //         $pengembalianbarang->kode_peminjaman = $request->no_pinjam;
        //         $pengembalianbarang->tanggal_pengembalian = Carbon::now();
        //         $pengembalianbarang->status_pengembalian = '1';
        //         $pengembalianbarang->keterangan = $request->keterangan;
        //         $pengembalianbarang->save();

        //         $this->validate($request, $rules);
        //         $detailpeminjaman = Detailpeminjaman::where('no_peminjaman','=',$request->no_pinjam);
        //         $detailpeminjaman->status_detail = $request->status_detail;        
        //         $detailpeminjaman->save();

        //         $barangrusaktampil = DB::table('barang_rusak')->where('id_barang','=',$request->id_barang)
        //         ->pluck('id_barang','nama_barang','quantity_rusak','satuan');

        //         if($request->status_barang == '1' && $request->jumlah_barang_baik != null){
        //             $this->validate($request, $rules);
        //             $barangbenar = Barang::where('id_barang','=',$request->id_barang)->firstOrFail();
        //             $barangbenar->quantity = $request->quantity + $request->jumlah_barang_baik;
        //             $barangbenar->save();
        //         } else if($request->status_barang == '0' && $request->jumlah_barang_buruk != null && $request->jumlah_barang_baik == null ){
        //             $this->validate($request, $rules);
        //             $barangrusak = Barangrusak::where('id_barang','=', $request->id_barang)->firstOrFail();
        //             $barangrusak->quantity_rusak = $barangrusaktampil->quantity_rusak + $request->jumlah_barang_buruk;
        //             $barangrusak->save();
        //         } else if($request->status_barang == '1' && $request->jumlah_barang_buruk != null && $request->jumlah_barang_baik != null){
        //             $this->validate($request, $rules);
        //             $barangrbenar = Barangr::where('id_barang','=', $request->id_barang)->firstOrFail();
        //             $barangbenar->quantity = $request->quantity + $request->jumlah_quantity;
        //             $barangbenar->save();
                
        //       } else if($request->status_barang == '0' && $request->jumlah_barang_buruk != null && $request->jumlah_barang_baik == null ){
        //          $this->validate($request, $rules);
        //          $barangrusak = Barangrusak::where('id_barang','=', $request->id_barang)->firstOrFail();
        //          $barangrusak->quantity_rusak = $barangrusaktampil->quantity_rusak + $request->jumlah_quantity;
        //          $barangrusak->save();
        //     }
        //         return redirect('pengembalianbarang')->with('success','Peminjaman barang baru created successfully');    
        //      }
    }
}
