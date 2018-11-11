<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departemen;
use App\Pegawai;
use Carbon\Carbon;
use DB;

class DepartemenController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
               $departemens = DB::table('departemens')->get();
                return view('departemen.listdepartemen', ['departemens' => $departemens]);
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id_departemen)
    {
        Departemen::destroy($id_departemen);
        return redirect('departemens');
    }
    public function create(Request $request)
    {
          if ($request->isMethod('get')){
        
          return view('departemen.departemen_add');
          }
            else {
                request()->validate([
                    'name_departemen' => 'required|string|min:3|max:255',
                    'status' => 'required|string|min:5|max:255',
                    
                ]);
                Departemen::create($request->all());
                return redirect('departemens')->with('success','Departemens created successfully');    
             }
    }
    public function update(Request $request, $id_departemen)
    {
        if ($request->isMethod('get')) {
            $pegawais = DB::table("pegawais")
            ->where('id_departemen','=',$id_departemen)
            ->pluck("first_name","nip");
            return view('departemen.departemen_edit', ['departemens' => Departemen::where('id_departemen', $id_departemen)->firstOrFail(), 'pegawais' => $pegawais]);
         } else {
            $rules = [
                'name_departemen' => 'required|string|min:3|max:255',
                'id_headofdept' => 'required|string|max:20',
                'status' => 'required|string|min:5|max:255',
            ];
            $this->validate($request, $rules);
            $departemens= Departemen::where('id_departemen', $id_departemen)->firstOrFail();
            $departemens->name_departemen = $request->name_departemen;
            $departemens->id_headofdept = $request->id_headofdept;
            $departemens->status = $request->status;
            $departemens->save();
            return redirect('departemens');
        }
        
    }

     public function show(Request $request, $id_departemen)
    {
        if ($request->isMethod('get')) {
            $pegawais = DB::table("pegawais")
            ->where('id_departemen',$request->id_headofdept)
            ->pluck("name_departemen","id_departemen");
            return view('departemen.departemen_edit', ['departemen' => Departemens::findOrFail($id_departemen), 'pegawais' => $pegawais]);
         } else {
            $rules = [
                'name_departemen' => 'required|string|min:3|max:255',
                'id_headofdept' => 'required|string|min:5|max:20',
                'status' => 'required|string|min:5|max:255',
            ];
            $this->validate($request, $rules);
            $departemens= Departemen::findOrFail($id_departemen);
            $departemens->name_departemen = $request->name_departemen;
            $departemens->id_headofdept = $request->id_headofdept;
            $departemens->status = $request->status;
            $departemens->save();
            return redirect('departemens');
        }
    }
}
