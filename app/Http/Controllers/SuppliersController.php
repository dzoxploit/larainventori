<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Supplier;
use Carbon\Carbon;
use DB;


class SuppliersController extends Controller
{
    public function index(Request $request)
    {
               $supplier = DB::table('suppliers')->get();
                return view('supplier.listsupplier', ['supplier' => $supplier]);
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
             if ($request->isMethod('get'))
             return view('supplier.supplier_add');
               else {
                $rules = [
                    'kode_supplier' => 'required|string',
                    'nama_supplier' => 'required|string',
                    'alamat_supplier' => 'required|string',
                    'telp_supplier' => 'required|string',
                    'kota_supplier' => 'required|string',
                    
                ];
                $this->validate($request, $rules);
                $suppliers= new Supplier;
                $suppliers->kode_supplier = $request->kode_supplier;
                $suppliers->nama_supplier = $request->nama_supplier;
                $suppliers->alamat_supplier = $request->alamat_supplier;
                $suppliers->telp_supplier = $request->telp_supplier;
                $suppliers->kota_supplier = $request->kota_supplier;
                $suppliers->save();
                   return redirect('supplier')->with('success','Supplier created successfully');    
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
