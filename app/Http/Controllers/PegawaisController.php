<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;
use App\Pegawai;
use App\Posisitions;
use Carbon\Carbon;
use DB;

class PegawaisController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
               $pegawais = DB::table('pegawais')->get();
                return view('pegawai.listpegawai', ['pegawais' => $pegawais]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Pegawai::destroy($id);
        return redirect('pegawais');
    }
    public function create(Request $request)
    {
          if ($request->isMethod('get')){
            $departemens = $info = DB::table("departemens")->where('status','=','aktif')
            ->pluck("name_departemen","id_departemen");
            $posisitions = $info = DB::table("posisitions")
            ->pluck("name_posisitions","id_posisitions");
            return view('pegawai.pegawai_add', ['departemens' => $departemens, 'posisitions' => $posisitions]);
          }
            else {
                request()->validate([
                    'nip' => 'required|string|min:5|max:20',
                    'first_name' => 'required|string|min:3|max:255',
                    'last_name' => 'required|string|min:5|max:20',
                    'address' => 'required|string|min:3|max:255',
                    'email' => 'required|string|min:5|max:255',
                    'posisition' => 'string|min:3|max:255',
                    'no_mobile' => 'required|string|max:12',
                    'id_departemen' => 'required|string|min:3|max:255',
                    'status' => 'required|string|min:3|max:255',
                    
                ]);
                Pegawai::create($request->all());
                return redirect('pegawais')->with('success','Pegawais created successfully');    
             }
    }
    public function update(Request $request, $nip)
    {

        if ($request->isMethod('get')) {
            $departemens = $info = DB::table("departemens")
            ->pluck("name_departemen","id_departemen");
            $posisitions = $info = DB::table("posisitions")
            ->pluck("name_posisitions","id_posisitions");
            return view('pegawai.pegawai_edit', ['pegawais' => Pegawai::where('nip', $nip)->firstOrFail(),'departemens' => $departemens, 'posisitions' => $posisitions]);
            
         } else {
            $rules = [
                'nip' => 'required|string|min:5|max:20',
                'first_name' => 'required|string|min:3|max:255',
                'last_name' => 'required|string|min:5|max:20',
                'address' => 'required|string|min:3|max:255',
                'email' => 'required|string|min:5|max:255',
                'posisition' => 'required|string|min:3|max:255',
                'no_mobile' => 'required|string|max:12',
                'id_departemen' => 'required|string|min:3|max:255',
                'status' => 'required|string|min:3|max:255',
            ];
            $this->validate($request, $rules);
            $pegawais= Pegawai::where('nip', $nip)->firstOrFail();
            $pegawais->nip = $request->nip;
            $pegawais->first_name = $request->first_name;
            $pegawais->last_name = $request->last_name;
            $pegawais->address = $request->address;
            $pegawais->email = $request->email;
            $pegawais->posisition = $request->posisition;
            $pegawais->no_mobile = $request->no_mobile;
            $pegawais->id_departemen = $request->id_departemen;
            $pegawais->status = $request->status;
            $pegawais->save();
            return redirect('pegawais');
        }
        
    }

     public function show(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            return view('pegawai.pegawai_show', ['kategoris' => Kategori::findOrFail($id)]);
         } else {
            $rules = [
                'nip' => 'required|string|min:5|max:20',
                'first_name' => 'required|string|min:3|max:255',
                'last_name' => 'required|string|min:5|max:20',
                'address' => 'required|string|min:3|max:255',
                'email' => 'required|string|min:5|max:255',
                'posisition' => 'required|string|min:3|max:255',
                'no_mobile' => 'required|string|min:12|max:13',
                'id_departemen' => $request->get('departemens'),
                'status' => 'required|string|min:3|max:255',
            ];
            $this->validate($request, $rules);
            $pegawais= Pegawai::findOrFail($id);
            $pegawais->nip = $request->nip;
            $pegawais->first_name = $request->first_name;
            $pegawais->last_name = $request->last_name;
            $pegawais->address = $request->address;
            $pegawais->email = $request->email;
            $pegawais->posisition = $request->posisition;
            $pegawais->no_mobile = $request->no_mobile;
            $pegawais->id_departemen = $request->id_departemen;
            $pegawais->status = $request->status;
            $pegawais->save();
            return redirect('pegawais');
        }
    }
}
