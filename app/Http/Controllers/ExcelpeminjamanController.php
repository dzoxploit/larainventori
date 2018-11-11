<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;

use App\Peminjamanbarang;

use Session;


use Input;




class ExcelpeminjamanController extends Controller

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

                foreach ($peminjamanbarang as $key => $value) {

                    $arr[] = ['no_peminjaman' => $value->nip, 
                    'first_name' => $value->nama_barang,
                     'last_name' => $value->merk, 
                     'address' => $value->spesifikasi_barang, 
                     'email' => $value->lokasi_barang,
                     'no_mobile' => $value->id_kategori,
                     'no_mobile' => $value->quantity,
                     'id_departemen' => $value->keterangan,
                     'status' => $value->status
                    ];
                }
                if(!empty($arr)){
                    DB::table('pegawais')->insert($arr);
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

        return \Excel::download(new Pegawai, 'report_pegawai.xls');
    }      

    public function exportFile2($type){
        
    return \Excel::download(new Pegawai, 'report_pegawai.xlsx');
     }    

     public function exportFile3($type){
        
    return \Excel::download(new Pegawai, 'report_pegawai.csv');
     }   
}