<?php

namespace App\Http\Controllers;

use App\Printing;
use App\Layanan_tersedia;
use App\Detail_print;
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
        $printings = Printing::where('kabupaten', 'like', "%$kota%")->get();
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
            $printing_id = $printing->id;
        }

        $layanans = Layanan_Tersedia::where('printing_id', $printing_id)
                    ->orderBy('detail__print_id')
                    ->get();
        //$jenis_prints = Jenis Layanan
        foreach($layanans as $i=>$layanan){
            $id_detail = $layanan->detail__print_id;
            $jenis_print_id[$i] = $layanan->detail__print_id;
        }
        
        $jenis_prints = Detail_print::WhereIn('id', $jenis_print_id)
                        ->get();
        
        //Mengambil Jenis printing yang ada dalam layanan
        //$j_p_tersedias = jenis printing tersedia
        //$j_p mengambil jenis_printing_id yang ada, idnya nanti disimpan $j_p_id
        $j_p = Detail_print::WhereIn('id', $jenis_print_id) 
                        ->get(['jenis_printing_id']);
        foreach($j_p as $i=>$j){
            $j_p_id[$i] = $j->jenis_printing_id;
        }
        $j_p_tersedias = Jenis_printing::WhereIn('id', $j_p_id)->get();

        //Mengambil detail_print_id yang jenis_printing_id nya di j_p_tersedias
        //Dengan j_p_tersedias dan $layanans
        //Caranya ambil cek id dari $layanans apakah sesuai dengan $j_p_tersedia
        
        foreach($j_p_tersedias as $i=>$j_p_tersedia){
            $j = 0;
            foreach($layanans as $layanan){
                $var = $layanan->detail_print->jenis_printing_id;
                if($var == $j_p_tersedia->id){
                    $tersedia_per_jenis[$i][$j] = $layanan->detail_print->id;
                    $j++;
                }
            }
        }
        $counter = count($tersedia_per_jenis);
        for($i=0;$i<$counter;$i++){
            $layanan_tersedia[$i] = Detail_print::whereIn('id', $tersedia_per_jenis[$i])->get();
            $counter_cus[$i] = count($tersedia_per_jenis[$i]);
            for($j=0;$j<$counter_cus[$i];$j++){
                $harga[$i][$j] = Layanan_Tersedia::where('printing_id', $printing_id)
                                ->where('detail__print_id', $layanan_tersedia[$i][$j]->id)
                                ->get();
            }
        }
        
        return view('detail-printing', compact('kota', 'printings', 'layanan_tersedia', 'jenis_prints','layanans', 'j_p_tersedias', 'counter', 'counter_cus', 'harga', 'printing_id'));
    }
}
