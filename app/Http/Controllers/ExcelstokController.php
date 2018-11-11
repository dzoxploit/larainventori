<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;

use App\stok;

use Session;


use Input;




class ExcelstokController extends Controller

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

                foreach ($stok as $key => $value) {

                    $arr[] = ['id_barang' => $value->id_barang, 
                    'nama_barang' => $value->nama_barang,
                     'jumlah_barang_masuk' => $value->jumlah_barang_masuk, 
                     'jumlah_barang_keluar' => $value->jumlah_barang_keluar, 
                     'total_barang' => $value->total_barang,
                     'keterangan' => $value->keterangan,
                    ];
                }
                if(!empty($arr)){
                    DB::table('stok')->insert($arr);
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

        return \Excel::download(new stok, 'stok.xls');
    }      

    public function exportFile2($type){
        
    return \Excel::download(new stok, 'stok.xlsx');
     }    

     public function exportFile3($type){
        
    return \Excel::download(new stok, 'stok.csv');
     }   
}