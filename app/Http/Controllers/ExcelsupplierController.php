<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;

use App\Supplier;

use Session;


use Input;




class ExcelsupplierController extends Controller

{

	/**

     * Create a new controller instance.

     *

     * @return void

     */

    public function importExportView(){

        return view('import_export');

    }



    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function importFile(Request $request){

        if($request->hasFile('sample_file')){

            $path = $request->file('sample_file')->getRealPath();

            $data = \Excel::load($path)->get();



            if($data->count()){

                foreach ($supplier as $key => $value) {

                    $arr[] = ['kode_supplier' => $value->kode_barang, 
                    'nama_supplier' => $value->nama_barang,
                     'alamat_supplier' => $value->jumlah_barang_masuk, 
                     'telp_supplier' => $value->jumlah_barang_keluar, 
                     'kota_supplier' => $value->total_barang,
                    ];
                }
                if(!empty($arr)){
                    DB::table('supplier')->insert($arr);
                    dd('Insert Recorded successfully.');
                }
            }
        }

        dd('Request data does not have any files to import.');      
    } 

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function exportFile($type){

        return \Excel::download(new Supplier, 'report_supplier_barang.xls');
    }      

    public function exportFile2($type){
        
    return \Excel::download(new Supplier, 'report_supplier_barang.xlsx');
     }    

     public function exportFile3($type){
        
    return \Excel::download(new Supplier, 'report_supplier_barang.csv');
     }   
}