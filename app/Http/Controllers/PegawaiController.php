<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PegawaiController extends Controller
{
    
    public function index()
    {
        return view('pegawai');
    }

    public function find_NIP(Request $request)
    {
        $nip = $request->get('nip');
        if($request->ajax()) {
            $data = '';
            $qry = DB::select("SELECT * FROM pegawai where nip='$nip'");
            foreach ($qry as $pgw) {
                $data = array(
                        'nama_pegawai'  =>  $pgw->nama_pegawai,
                        'alamat'        =>  $pgw->alamat
                    );
            }
            echo json_encode($data);
        }
    }

}
