<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sumberdana;
use Carbon\Carbon;
use DB;


class SumberdanaController extends Controller
{
    public function index(Request $request)
    {
               $sumberdana = DB::table('sumber_dana')->get();
                return view('sumberdana.listdana', ['sumberdana' => $sumberdana]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id_sumber_dana)
    {
        Sumberdana::destroy($id_sumber_dana);
        return redirect('sumberdana');
    }
    public function create(Request $request)
    {
          if ($request->isMethod('get')){
            return view('sumberdana.sumber_dana_add');
          }
            else {
                $rules = [
                    'nama_sumber_dana' => 'required|string',
                    'inventori_dana' => 'required|string',
                ];
                $this->validate($request, $rules);
                //tambah data barang
                $sumberdana= new Sumberdana;
                $sumberdana->nama_sumber_dana = $request->nama_sumber_dana;
                $sumberdana->investor_dana = $request->nama_barang;           
                return redirect('sumberdana')->with('success','Barang created successfully');
            }
    }
    public function update(Request $request, $id_sumber_dana)
    {

        if ($request->isMethod('get')) {
            return view('sumberdana.sumberdana_edit', ['sumberdana' => Sumberdana::where('id_sumber_dana', $id_sumber_dana)->firstOrFail()]);
         } else {
            $rules = [
                'nama_sumber_dana' => 'required|string',
                'inventori_dana' => 'required|string',
            ];
            $this->validate($request, $rules);
            $sumberdana= Sumberdana::where('id_sumber_dana', $id_sumber_dana)->firstOrFail();
            $sumberdana->nama_sumber_dana = $request->nama_sumber_dana;
            $sumberdana->investor_dana = $request->nama_barang;           
            return redirect('barang');
        }
        
    }

    public function show(Request $request, $id_sumber_dana)
    {

        if ($request->isMethod('get')) {
            return view('sumberdana.sumberdana_show', ['sumberdana' => Sumberdana::where('id_sumber_dana', $id_sumber_dana)->firstOrFail()]);
         } else {
            return redirect('barang');
        }
        
    }
}
