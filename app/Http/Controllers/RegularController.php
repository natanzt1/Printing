<?php

namespace App\Http\Controllers;

use App\Printing;
use App\Layanan_tersedia;
use App\Detail_layanan;
use App\Jenis_printing;
use Illuminate\Http\Request;

class RegularController extends Controller
{
    /**
     * Display a Home View.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request)
    {
        return view('index');
    }    

     /**
     * Display printings in a Certain City.
     *
     * @return \Illuminate\Http\Response
     */
    public function kota($kota)
    {
        $printings = Printing::where('kabupaten', 'like', "%$kota%")
                        ->where('status',1)
                        ->get();
        return view('printing-city', compact('kota', 'printings'));
    }

     /**
     * Display a detail printing.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailprinting($kota,$nama)
    {
        /*return $layanan->detail_print->jenis_printing->nama;*/
        $printings = Printing::where('nama', $nama)->get();
        foreach($printings as $printing){
            $id = $printing->id;
        }
        $printing_id = $id;
        $printing = Printing::find($id);
        $jenis_layanans = Layanan_Tersedia::where('printing_id', $id)
                    ->get();
        foreach($jenis_layanans as $i => $jenis){
            $id_jenis[$i]=$jenis->id; 
        }
        if(isset($id_jenis[0])){
            $detail_layanans = Detail_layanan::whereIn('layanan_tersedia_id', $id_jenis)
                            ->orderBy('layanan_tersedia_id')
                            ->get();
        }   
        
        return view('detail-printing', compact('kota', 'printings', 'printing', 'jenis_layanans','detail_layanans', 'printing_id'));
    }
}
