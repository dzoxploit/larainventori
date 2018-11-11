<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;
use Carbon\Carbon;
use App\Posisitions;
use DB;

class PosisitionsController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
               $posisitions = DB::table('posisitions')->get();
                return view('posisitions.listposisitions', ['posisitions' => $posisitions]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Posisitions::destroy($id);
        return redirect('posisitions');
    }
    public function create(Request $request)
    {
          if ($request->isMethod('get')){
            $departemens = $info = DB::table("departemens")->where('status','=','aktif')
            ->pluck("name_departemen","id_departemen");
            return view('posisitions.posisitions_add', ['departemens' => $departemens]);
          }
            else {
                request()->validate([
                    'name_posisitions' => 'required|string|min:5|max:20',
                    'id_departemen' => 'required|string|min:3|max:255',
                ]);
                Posisitions::create($request->all());
            return redirect('posisitions')->with('success','Posisitions created successfully');    
             }
    }
    public function update(Request $request, $id_posisitions)
    {

        if ($request->isMethod('get')) {
            $departemens = $info = DB::table("departemens")->where('status','=','aktif')
            ->pluck("name_departemen","id_departemen");
            return view('pegawai.pegawai_edit', ['posisitions' => Posisitions::where('id_posisitions', $id_posisitions)->firstOrFail(),'departemens' => $departemens]);
         } else {
            $rules = [
                'name_posisitions' => 'required|string|min:5|max:20',
                'id_departemen' => 'required|string|min:3|max:255',
            ];
            $this->validate($request, $rules);
            $posisitions= Posisitions::findOrFail($id);
            $posisitions->name_posisitions = $request->name_posisitions;
            $posisitions->id_departemen = $request->id_departemen;
            $posisitions->save();
            return redirect('posisitions');
        }
        
    }

     public function show(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $departemens = Departemen::all(['id_departemen', 'name_departemen']);
            return view('pegawai.pegawai_edit', ['pegawais' => Pegawai::findOrFail($id),'departemens' => $departemens]);
         } else {
            $rules = [
                'name_posisitions' => 'required|string|min:5|max:20',
                'id_departemen' => 'required|string|min:3|max:255',
            ];
            $this->validate($request, $rules);
            $posisitions= Posisitions::findOrFail($id);
            $posisitions->name_posisitions = $request->name_posisitions;
            $posisitions->id_departemen = $request->id_departemen;
            $posisitions->save();
            return redirect('posisitions');
        }
    }
}
