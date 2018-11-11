<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;

use App\Barang;

use Session;


use Input;




class ExcelbarangController extends Controller

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

                foreach ($barangs as $key => $value) {

                    $arr[] = ['id_barang' => $value->id_barang, 
                    'nama_barang' => $value->nama_barang,
                     'merk' => $value->merk, 
                     'spesifikasi_barang' => $value->spesifikasi_barang, 
                     'lokasi_barang' => $value->lokasi_barang,
                     'id_kategori' => $value->id_kategori,
                     'quantity' => $value->quantity,
                     'keterangan' => $value->keterangan
                    ];
                }
                if(!empty($arr)){
                    DB::table('barangs')->insert($arr);
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

        return \Excel::download(new Barang, 'report_barang.xls');
    }      

    public function exportFile2($type){
        
    return \Excel::download(new Barang, 'report_barang.xlsx');
     }    

     public function exportFile3($type){
        
    return \Excel::download(new Barang, 'report_barang.csv');
     }   
}