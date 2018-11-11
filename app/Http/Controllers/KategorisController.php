<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use Carbon\Carbon;
use DB;

class KategorisController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
               $kategoris = DB::table('kategoris')->get();
                return view('kategori.listkategori', ['kategoris' => $kategoris]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id_kategori)
    {
        Kategori::destroy($id_kategori);
        return redirect('kategoris');
    }
    public function create(Request $request)
    {
          if ($request->isMethod('get'))
          return view('kategori.kategori_add');
            else {
                request()->validate([
                    'nama_kategori' => 'required|string|min:3|max:255',
                    'keterangan' => 'required|string|max:255',
                    'status' => 'required|string'
                ]);
                Kategori::create($request->all());
                return redirect('kategoris')->with('success','Kategoris created successfully');    
             }
    }
    public function update(Request $request, $id_kategori)
    {

        if ($request->isMethod('get')) {
            return view('kategori.kategori_edit', ['kategoris' => Kategori::where('id_kategori', $id_kategori)->firstOrFail()]);
         } else {
            $rules = [
                'nama_kategori' => 'required|string|min:3|max:255',
                'keterangan' => 'required|string|max:255',
                'status' => 'required|string'
            ];
            $this->validate($request, $rules);
            $kategoris= Kategori::where('id_kategori', $id_kategori)->firstOrFail();
            $kategoris->nama_kategori = $request->nama_kategori;
            $kategoris->keterangan = $request->keterangan;
            $kategoris->status = $request->status;
            $kategoris->save();
            return redirect('kategoris');
        }
        
    }

     public function show(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            return view('kategori.kategori_show', ['kategoris' => Kategori::findOrFail($id)]);
         } else {
            $rules = [
                'nama_kategori' => 'required|string|min:3|max:255',
                'harga_estimasi_minimum' => 'required_with:harga_estimasi_maksimum|integer|min:1|digits_between: 4,7',
                'harga_estimasi_maksimum' => 'required_with:initial_page|integer|greater_than_field:initial_page|digits_between:4,7'
            ];
            $this->validate($request, $rules);
            $kategoris= Kategori::findOrFail($id);
            $kategoris->name_server = $request->name_server;
            $kategoris->url = $request->url;
            $kategoris->uptime_check_enabled = $request->uptime_check_enabled;
            $kategoris->save();
            return redirect('kategoris');
        }
    }
}
