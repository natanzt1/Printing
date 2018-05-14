<?php

namespace App\Http\Controllers;

use App\Printing;
use App\Layanan_tersedia;
use App\Detail_print;
use App\Jenis_printing;
use Illuminate\Http\Request;

class PrintingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:printing');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('printing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register-printing');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $api_key = "AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM";

        $this->validate(request(),[
            'nama'=> 'required',
            'lokasi'=> 'required',
            'event_lat' => 'required',
            'event_lng' => 'required',
            'deskripsi' => 'required'
        ]);

        function get_data($url_par) {
            $ch = curl_init();
            $timeout = 5;
            curl_setopt($ch, CURLOPT_URL, $url_par);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }

        $lat = $request->get('event_lat');
        $lng = $request->get('event_lng');
        
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lng&key=$api_key";
        $html= get_data("$url");
        $data = json_decode($html);
        $result = $data->results[0]->address_components;
        $city = $result[4]->long_name;

        $printing = new Printing();
        $printing->nama = $request->get('nama');
        $printing->kabupaten = $city;
        $printing->alamat = $request->get('lokasi');
        $printing->lat = $request->get('event_lat');
        $printing->lng = $request->get('event_lng');
        $printing->deskripsi = $request->get('deskripsi');
        $printing->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function show(Printing $printing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function edit(Printing $printing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Printing $printing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Printing  $printing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Printing $printing)
    {
        //
    }

    /**
     * Edit Layanan Si Printing
     *
     */
    public function layananTersedia($id)
    {
        $printing = Printing::find($id);
        $layanans = Layanan_Tersedia::where('printing_id', $id)
                    ->orderBy('detail__print_id')
                    ->get();
        foreach($layanans as $i=>$layanan){
            $id_detail = $layanan->detail__print_id;
            $jenis = Detail_print::find($id_detail);
            $jenis_print_id[$i] = $jenis->id;
        }
         
        $jenis_prints = Detail_print::WhereIn('id', $jenis_print_id)->get();
        /*$c = 0; //Counter utk menghitung jumlah layanan tersedia.
        $jeniss_p[0] = $jenis_prints[0];
        $jeniss_p_id[0] = $jenis_prints_id[0];
        for($a=1;$a<=$i;$a++){
            if($jeniss_p[$c] != $jenis_prints[$a]){
                $c++;
                $jeniss_p[$c] = $jenis_prints[$a];
                $jeniss_p_id[$c] = $jenis_prints_id[$a];
            }
        }*/

        return view('printing/layanan-tersedia', compact('printing', 'jenis_prints', 'id', 'layanans'));
    }
    public function tambahLayananTersedia($id)
    {
        $printing = Printing::find($id);
        $exists = Layanan_tersedia::where('printing_id', $id)->get();
        foreach($exists as $i=>$exist){
            $exist_id[$i] = $exist->detail__print_id;
        }

        //Mengambil data Detail Print yang blm ada di layanan_printing
        $details = Detail_print::whereNotIn('id', $exist_id)->get(); 
        return view('/printing/create-layanan-tersedia', compact('details','id', 'printing'));
    }

    public function storeTambahLayananTersedia($id, Request $request)
    {
        $layanans = $request->get('layanan');
        foreach($layanans as $layanan) {
            $new = new Layanan_tersedia();
            $new->printing_id = $id;
            $new->detail__print_id = $layanan;
            $new->save();
        }
        return "Layanan Berhasil Ditambahkan";
    }
}
