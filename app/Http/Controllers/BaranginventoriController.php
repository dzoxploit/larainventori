<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Departemen;
use App\Pegawai;
use App\Barang;
use App\Posisitions;
use App\Kategori;
use App\Pengajuanbarang;
use Carbon\Carbon;
use DB;

class BaranginventoriController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
               $pengajuanbarangbarus = DB::table('pengajuanbarangbarus')->get();
                return view('pengajuan.listpengajuan', ['pengajuanbarangbarus' => $pengajuanbarangbarus]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($no_order)
    {
        Pengajuanbarang::destroy($no_order);
        return redirect('baranginventory');
    }
    public function create(Request $request)
    {
          if ($request->isMethod('get')){
            $departemens = DB::table("departemens")->where('status','=','aktif')
            ->pluck("name_departemen","id_departemen");
            $kategoris = DB::table("kategoris")
            ->pluck("nama_kategori","id_kategori","harga_estimasi_minimum","harga_estimasi_maksimum");
            return view('pengajuan.pengajuan_add', ['departemens' => $departemens, 'kategoris' => $kategoris]);
          }
            else {
                $rules = [
                    'no_order' => 'required|string|min:8|max:20',
                    'date_order' => 'required|date',
                    'division_department' => 'required|string|min:5|max:20',
                    'nama_barang' => 'required|string|min:3|max:255',
                    'merk' => 'required|string|min:2|max:100',
                    'quantity' => 'required|string|max:3',
                    'satuan' => 'required|string|min:3',
                    'harga' => 'required|string|min:3|max:255',
                    'id_kategori' => 'required|string|min:1',
                    'id_pegawai' => 'required|string|min:3|max:255',
                    
                ];
                $this->validate($request, $rules);
                $pengajuanbarangbarus= new Pengajuanbarang();
                $pengajuanbarangbarus->no_order = $request->no_order;
                $pengajuanbarangbarus->date_order = $request->date_order;
                $pengajuanbarangbarus->division_department = $request->division_department;
                $pengajuanbarangbarus->nama_barang = $request->nama_barang;
                $pengajuanbarangbarus->merk = $request->merk;
                $pengajuanbarangbarus->quantity = $request->quantity;
                $pengajuanbarangbarus->satuan = $request->satuan;
                $pengajuanbarangbarus->harga = $request->harga;
                $pengajuanbarangbarus->id_kategori = $request->id_kategori;
                $pengajuanbarangbarus->id_pegawai = $request->id_pegawai;        
                $pengajuanbarangbarus->save();
                 // $data_uri = $request->file('signature_pegawai');
                // // dd($data_uri);
                // // $encoded_image = explode(",", $data_uri)[0];
                // // //$decoded_image = base64_decode($encoded_image);
        
                // // $sig = sha1($request->session()->get('users.name').$request->session()->get('user.nip')) . "_signature.png";
                // // $folder = '/uploads/';
        
                // // Storage::put($folder, $sig);
                
                return redirect('pengajuanbarangbarus')->with('success','Pengajuan barang baru created successfully');    
             }
    }
    public function updatepegawai(Request $request, $id)
    {

        if ($request->isMethod('get')) {
            $departemens = DB::table("departemens")->where('status','=','aktif')
            ->pluck("name_departemen","id_departemen");
            $kategoris = DB::table("kategoris")
            ->pluck("nama_kategori","id_kategori","harga_estimasi_minimum","harga_estimasi_maksimum");
            $posisitions = Posisitions::select('name_posisitions')
            ->where('posisitions','.','id_departemen', '=', 'departemens','.','id_departemen')
            ->get();
            return view('pengajuan.pengajuan_add', ['pengajuanbarangbarus' =>  Pengajuanbarang::where('no_order', $no_order)->firstOrFail()])->with(compact('departemens', $departemens, 'posisitions', $posisitions));
         } else {
            $rules = [
                'no_order' => 'required|string|min:8|max:20',
                'date_order' => 'required|date',
                'division_department' => 'required|string|min:5|max:20',
                'nama_barang' => 'required|string|min:3|max:255',
                'merk' => 'required|string|min:2|max:100',
                'quantity' => 'required|string|max:3',
                'satuan' => 'required|string|min:3',
                'harga' => 'required|string|min:3|max:255',
                'id_kategori' => 'required|string|min:1',
                'id_pegawai' => 'required|string|min:3|max:255',
                
            ];
            $this->validate($request, $rules);
            $pengajuanbarangbarus = Pengajuanbarang::where('no_order', $no_order)->firstOrFail();
            $pengajuanbarangbarus->no_order = $request->no_order;
            $pengajuanbarangbarus->date_order = $request->date_order;
            $pengajuanbarangbarus->division_department = $request->division_department;
            $pengajuanbarangbarus->nama_barang = $request->nama_barang;
            $pengajuanbarangbarus->merk = $request->merk;
            $pengajuanbarangbarus->quantity = $request->quantity;
            $pengajuanbarangbarus->satuan = $request->satuan;
            $pengajuanbarangbarus->harga = $request->harga;
            $pengajuanbarangbarus->id_kategori = $request->id_kategori;
            $pengajuanbarangbarus->id_pegawai = $request->id_pegawai;        
            $pengajuanbarangbarus->save();
            // $data_uri = $request->signature_pegawai;
            // $encoded_image = explode(",", $data_uri)[1];
            // $decoded_image = base64_decode($encoded_image);
            // $file = md5($decoded_image);
            // $sig = sha1($file) . "_signature.png";
            // $folder = '/uploads/';
    
            // Storage::put($folder, $sig);
            return redirect('pengajuanbarangbarus');
        }
        
    }
    public function updatehrd($request, $rules){
        if ($request->isMethod('get')) {
            $departemens = Departemen::all(['id_departemen', 'name_departemen']);
            $posisitions = Posisitions::select('name_posisitions')
            ->where('posisitions','.','id_departemen', '=', 'departemens','.','id_departemen')
            ->get();
            $kategori = Kategori::all(['id_kategori','nama_kategori']);
            $hrd = Pegawai::select(['nip','first_name'])->where('');
            return view('pengajuan_hrd.pengajuan_edithrd', ['pengajuanbarangbarus' => Pengajuanbarang::findOrFail($no_order)])->with(compact('departemens', $departemens, 'posisitions', $posisitions));
         } else {
            $rules = [
                'no_order' => 'required|string|min:8|max:20',
                'date_order' => 'required|date',
                'division_departement' => 'required|string|min:5|max:20',
                'nama_barang' => 'required|string|min:3|max:255',
                'quantity' => 'required|string|min:5|max:255',
                'satuan' => 'required|string|min:4',
                'harga' => 'required|string|min:3|max:255',
                'id_kategori' => 'required|string|min:1',
                'id_pegawai' => 'required|string|min:3|max:255',
                'id_hrd' => 'string',
                // 'id_direktur' => 'string',
                // 'signature_direktur' => 'string',
            ];

            $this->validate($request, $rules);
            $pengajuanbarangbarus= Pengajuanbarang::findOrFail($id);
            $pengajuanbarangbarus->no_order = $request->no_order;
            $pengajuanbarangbarus->date_order = $request->date_order;
            $pengajuanbarangbarus->division_department = $request->division_department;
            $pengajuanbarangbarus->nama_barang = $request->nama_barang;
            $pengajuanbarangbarus->merk = $request->merk;
            $pengajuanbarangbarus->quantity = $request->quantity;
            $pengajuanbarangbarus->satuan = $request->satuan;
            $pengajuanbarangbarus->harga = $request->harga;
            $pengajuanbarangbarus->id_kategori = $request->id_kategori;
            $pengajuanbarangbarus->id_pegawai = $request->id_pegawai;
            $pengajuanbarangbarus->id_hrd = $request->id_hrd; 
            $pengajuanbarangbarus->save();

            $barangs= new Barang();
            $barangs->nama_barang = $request->nama_barang;
            $barangs->merk = $request->merk;
            $barangs->quantity = $request->quantity;
            $barangs->satuan = $request->satuan;
            $barangs->harga = $request->harga;
            $barangs->status = 'belum tersedia';      
            $barangs->save();
            // $signature = new Signature;
            // $signature->id_pegawai = $request->session()->get('id_pegawai');
            // $signature->signature_hrd = $request->signature_hrd;
            // $data_uri = $request->signature;
            // $encoded_image = explode(",", $data_uri)[1];
            // //$decoded_image = base64_decode($encoded_image);
            // $sig = sha1($request->session()->get('nama_barang').$request->session()->get('no_order')) . "_signature.png";
            // $folder = '/uploads/signatures/';
            // Storage::put($folder, $sig);
            return redirect('pengajuanbarangbarus');
    }
}
    public function updatedirektur($request, $rules){
        if ($request->isMethod('get')) {
            $departemens = Departemen::all(['id_departemen', 'name_departemen']);
            $posisitions = Posisitions::select('name_posisitions')
            ->where('posisitions','.','id_departemen', '=', 'departemens','.','id_departemen')
            ->get();
            $kategori = Kategori::all(['id_kategori','nama_kategori']);
            return view('pengajuan_direktur.pengajuan_editdirektur', ['pengajuanbarangbarus' => Pengajuanbarang::findOrFail($no_order)])->with(compact('departemens', $departemens, 'posisitions', $posisitions));
         } else {
            $rules = [
                'no_order' => 'required|string|min:8|max:20',
                'date_order' => 'required|date',
                'division_departement' => 'required|string|min:5|max:20',
                'nama_barang' => 'required|string|min:3|max:255',
                'quantity' => 'required|string|min:5|max:255',
                'satuan' => 'required|string|min:4',
                'harga' => 'required|string|min:3|max:255',
                'id_kategori' => 'required|string|min:1',
                'id_pegawai' => 'required|string|min:3|max:255',
                'id_direktur' => 'string',
            ];
            $this->validate($request, $rules);
            $pengajuanbarangbarus= Pengajuanbarangbarus::findOrFail($id);
            $signature = new Signature;
            $signature->id_pegawai = $request->session()->get('id_pegawai');
            $signature->signature_direktur = $request->signature_direktur;
            $data_uri = $request->signature;
            $encoded_image = explode(",", $data_uri)[1];
            //$decoded_image = base64_decode($encoded_image);
            $sig = sha1($request->session()->get('nama_barang').$request->session()->get('no_order')) . "_signature.png";
            $folder = '/uploads/signatures/';
            Storage::put($folder, $sig);
            $pengajuanbarangbarus= Pengajuanbarangbarus::findOrFail($id);
            $pengajuanbarangbarus->no_order = $request->no_order;
            $pengajuanbarangbarus->date_order = $request->date_order;
            $pengajuanbarangbarus->division_departement = $request->division_departement;
            $pengajuanbarangbarus->nama_barang = $request->nama_barang;
            $pengajuanbarangbarus->harga = $request->harga;
            $pengajuanbarangbarus->id_pegawai = $request->id_pegawai;
            $pengajuanbarangbarus->signature_pegawai = $request->signature_pegawai;
            $pengajuanbarangbarus->id_direktur = $request->id_direktur;
            $pengajuanbarangbarus->signature_direktur = $request->signature_pegawai;
            $pengajuanbarangbarus->save();
            return redirect('pengajuanbarangbarus');
    }
  }
     public function show(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $departemens = DB::table("departemens")->where('status','=','aktif')
            ->pluck("name_departemen","id_departemen");
            $kategoris = DB::table("kategoris")
            ->pluck("nama_kategori","id_kategori","harga_estimasi_minimum","harga_estimasi_maksimum");
            $posisitions = Posisitions::select('name_posisitions')
            ->where('posisitions','.','id_departemen', '=', 'departemens','.','id_departemen')
            ->get();
            return view('pengajuan.pengajuan_add', ['pengajuanbarangbarus' =>  Pengajuanbarang::where('no_order', $no_order)->firstOrFail()])->with(compact('departemens', $departemens, 'posisitions', $posisitions));
         } else {
            $rules = [
                'no_order' => 'required|string|min:8|max:20',
                'date_order' => 'required|date',
                'division_department' => 'required|string|min:5|max:20',
                'nama_barang' => 'required|string|min:3|max:255',
                'merk' => 'required|string|min:2|max:100',
                'quantity' => 'required|string|max:3',
                'satuan' => 'required|string|min:3',
                'harga' => 'required|string|min:3|max:255',
                'id_kategori' => 'required|string|min:1',
                'id_pegawai' => 'required|string|min:3|max:255',
                
            ];
            $this->validate($request, $rules);
            $pengajuanbarangbarus = Pengajuanbarang::where('no_order', $no_order)->firstOrFail();
            $pengajuanbarangbarus->no_order = $request->no_order;
            $pengajuanbarangbarus->date_order = $request->date_order;
            $pengajuanbarangbarus->division_department = $request->division_department;
            $pengajuanbarangbarus->nama_barang = $request->nama_barang;
            $pengajuanbarangbarus->merk = $request->merk;
            $pengajuanbarangbarus->quantity = $request->quantity;
            $pengajuanbarangbarus->satuan = $request->satuan;
            $pengajuanbarangbarus->harga = $request->harga;
            $pengajuanbarangbarus->id_kategori = $request->id_kategori;
            $pengajuanbarangbarus->id_pegawai = $request->id_pegawai;        
            $pengajuanbarangbarus->save();
            return redirect('pengajuanbarangbarus');
        }
    }
}
