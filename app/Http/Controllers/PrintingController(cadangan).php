<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Transaksi;
use App\Detail_transaksi;
use App\Printing;
use App\Layanan_tersedia;
use Illuminate\Support\Facades\Hash;
use App\Detail_layanan;
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

    
    public function home()
    {
        return redirect(route('everyone.index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $api_key = "AIzaSyBPFFbLQcq3u3L9BqtaKlcyEPs-h4j2RGM";

        $this->validate(request(),[
            'nama'=> 'required',
            'username'=> 'required|unique:printings',
            'email'=> 'required|unique:printings',
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
        $printing->email = $request->email;
        $printing->username = $request->username;
        $printing->password = Hash::make($request->password);
        $printing->kabupaten = $city;
        $printing->alamat = $request->get('lokasi');
        $printing->lat = $request->get('event_lat');
        $printing->lng = $request->get('event_lng');
        $printing->deskripsi = $request->get('deskripsi');
        $printing->save();
        return redirect('/home');
    }

    public function layanan()
    {
        $id = Auth()->printing()->id;        
        $printing = Printing::find($id);
        $jenis_layanans = Layanan_Tersedia::where('printing_id', $id)
                    ->get();
        foreach($jenis_layanans as $i => $jenis){
            $id_jenis[$i]=$jenis->id; 
        }
        $detail_layanans = Detail_layanan::whereIn('layanan_tersedia_id', $id_jenis)
                            ->orderBy('layanan_tersedia_id')
                            ->get();
        return view('printing/layanan-tersedia', compact('printing', 'jenis_layanans','detail_layanans','message'));
    }

    public function editLayanan($id)
    {
        $layanan = Detail_layanan::find($id);
        $jenis_printing = Layanan_Tersedia::find($layanan->layanan_tersedia_id);
        $jenis_layanans = Layanan_Tersedia::where('printing_id', $id)
                    ->get();
        return view('/printing/edit-layanan', compact('layanan','jenis_layanans','jenis_printing','id'));
    }

    public function storeEditLayanan($id, Request $req)
    {
        $ukuran = $req->ukuran_kertas;
        $jenis_kertas = $req->jenis_kertas;
        $jenis_printing = $req->jenis_printing;
        $harga = $req->harga;
        $layanan = Detail_layanan::find($id);
        $layanan->layanan_tersedia_id = $jenis_printing;
        $layanan->jenis_kertas = $jenis_kertas;
        $layanan->ukuran_kertas = $ukuran;
        $layanan->harga = $harga;
        $layanan->save();
        return redirect(route('printing.layanan'));
    }

    public function hapusLayanan($id)
    {
        $layanan = Detail_layanan::find($id);
        if(isset($layanan)){
            $layanan->delete();
        }
        return redirect(route('printing.layanan'));
            
    }

    public function tambahLayanan()
    {
        $id = Auth()->printing()->id;   
        $jenis_layanans = Layanan_Tersedia::where('printing_id', $id)
                    ->get();
        $message = "";
        return view('/printing/create-layanan', compact('jenis_layanans'));
    }

    public function storeLayanan(Request $req)
    {
        $ukuran = $req->ukuran_kertas;
        $jenis_kertas = $req->jenis_kertas;
        $jenis_printing = $req->jenis_printing;
        $harga = $req->harga;
        $exist = Detail_layanan::where('ukuran_kertas',$ukuran)
                ->where('jenis_kertas',$jenis_kertas)
                ->where('layanan_tersedia_id',$jenis_printing)
                ->get();
        if(isset($exist[0])) {
            $message = "Layanan sudah ada, inputkan layanan baru yang belum terdaftar.";
            $id = Auth()->printing()->id;   
            $jenis_layanans = Layanan_Tersedia::where('printing_id', $id)
                        ->get();
            return view('/printing/create-layanan', compact('jenis_layanans','message'));
        }
        else {
            $layanan = new Detail_layanan();
            $layanan->layanan_tersedia_id = $jenis_printing;
            $layanan->jenis_kertas = $jenis_kertas;
            $layanan->ukuran_kertas = $ukuran;
            $layanan->harga = $harga;
            $layanan->save();
            return redirect(route('printing.layanan'));
        }
    }

    public function tambahJenis()
    {
        $id = Auth()->printing()->id;   
        $jenis_layanans = Layanan_Tersedia::where('printing_id', $id)
                    ->get();
        return view('/printing/create-jenis', compact('jenis_layanans'));
    }

    public function storeJenis(Request $req)
    {
        $jenis_printing = $req->jenis_printing;
        $id = Auth()->printing()->id;
        $exist = Layanan_Tersedia::where('jenis_printing',$jenis_printing)
                ->get();

        if(isset($exist[0])) {
            $message = "Jenis Printing sudah ada, inputkan Jenis Printing baru yang belum terdaftar.";
            $jenis_layanans = Layanan_Tersedia::where('printing_id', $id)
                        ->get();
            return view('/printing/create-jenis', compact('jenis_layanans','message'));
        }
        else {
            $layanan = new Layanan_Tersedia();
            $layanan->jenis_printing = $jenis_printing;
            $layanan->printing_id = $id;
            $layanan->save();
            return redirect(route('printing.tambahLayanan'));
        }
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

    public function transaksi()
    {
        $auth_id = Auth()->printing()->id;

        $trx_2 = Transaksi::where('printing_id',$auth_id)
                    ->where('status_pemesanan',2)
                    ->get();
        $cart_2[0][0] = 0;            
            if(isset($trx_2[0])){
                foreach($trx_2 as $i=>$trx){
                    $id = $trx->id;
                    $cart_2[$i] = DB::select("
                        SELECT detail_transaksis.id, jumlah_halaman, jumlah_cetak, file, 
                            jenis_kertas, 
                            jenis_printing, 
                            users.nama as nama_user,
                            ukuran_kertas, detail_transaksis.harga,
                            (detail_transaksis.harga * jumlah_halaman * jumlah_cetak) AS total,
                            printings.nama as nama_printing,
                            detail_transaksis.`transaksi_id`
                        FROM detail_transaksis, transaksis, layanan_tersedias, printings, detail_layanans,users
                        WHERE transaksis.id = detail_transaksis.`transaksi_id`
                        AND transaksis.id = $id
                        AND detail_transaksis.`detail_layanan_id` = detail_layanans.id
                        AND detail_layanans.layanan_tersedia_id = layanan_tersedias.id
                        AND transaksis.printing_id = printings.id
                        AND transaksis.user_id = users.id
                        ORDER BY detail_transaksis.id");    
                }
            }

        $trx_3 = Transaksi::where('printing_id',$auth_id)
                    ->where('status_pemesanan', '>',2)
                    ->where('status_pemesanan', '<',5)
                    ->get();

        $cart_3[0][0] = 0;            
            if(isset($trx_3[0])){
                foreach($trx_3 as $i=>$trx){
                    $id = $trx->id;
                    $cart_3[$i] = DB::select("
                        SELECT detail_transaksis.id, jumlah_halaman, jumlah_cetak, file, 
                            jenis_kertas, 
                            jenis_printing, 
                            users.nama as nama_user,
                            ukuran_kertas, detail_transaksis.harga,
                            (detail_transaksis.harga * jumlah_halaman * jumlah_cetak) AS total,
                            printings.nama as nama_printing,
                            detail_transaksis.`transaksi_id`
                        FROM detail_transaksis, transaksis, layanan_tersedias, printings, detail_layanans,users
                        WHERE transaksis.id = detail_transaksis.`transaksi_id`
                        AND transaksis.id = $id
                        AND detail_transaksis.`detail_layanan_id` = detail_layanans.id
                        AND detail_layanans.layanan_tersedia_id = layanan_tersedias.id
                        AND transaksis.user_id = users.id
                        AND transaksis.printing_id = printings.id
                        ORDER BY detail_transaksis.id");   
                }
            }

        return view('/printing/transaksi', compact('cart_2','cart_3'));
    }

    public function trxSelesai($trx_id)
    {
        $transaksi = Transaksi::find($trx_id);
        $transaksi->status_pemesanan = 3;
        $transaksi->tgl_selesai = NOW();
        $transaksi->save();
        return redirect(route('printing.transaksi'));
    }

    public function profile()
    {
        $id = Auth()->printing()->id;
        $profile = Printing::find($id);
        return view('printing.profile', compact('profile'));
    }

    public function editProfile()
    {
        $id = Auth()->printing()->id;
        $profile = Printing::find($id);
        return view('printing.profile-edit', compact('profile'));
    }

    public function storeProfile(Request $request)
    {
        $id = Auth()->printing()->id;
        $foto = $request->file('foto');
        $nama = $request->nama;
        $deskripsi = $request->deskripsi;
        $printing = Printing::find($id);
        $username = $printing->username;
        $nama_file = $username.".jpg";
        $foto->storeAs('storage/printing_profile', $nama_file, 'public');
        $path = "storage/printing_profile/$nama_file";
        $printing->nama = $nama;
        $printing->deskripsi = $deskripsi;
        $printing->foto = $path;
        $printing->save();

        return redirect(route('printing.profile'));
    }

    public function download(Request $request)
    {
        $path = $request->path;
        return response()->download($path);
        return redirect(route('printing.transaksi'));
    }
}
