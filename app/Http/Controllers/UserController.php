<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Printing;
use App\Layanan_Tersedia;
use App\Detail_print;
use App\Jenis_printing;
use App\Transaksi;
use App\Detail_transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = User::find($id);

        return view('/member/profile', compact('member', 'id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = User::find($id);
        return view('/member/profile-edit', compact('member', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foto = $request->file('foto');
        $nama = $request->nama;
        $member = User::find($id);
        $username = $member->username;
        $nama_file = $username.".jpg";
        $foto->storeAs('storage/member_profile', $nama_file, 'public');
        $path = "storage/member_profile/$nama_file";
        $member->nama = $nama;
        $member->foto = $path;
        $member->save();
        return view("/member/profile", compact('id','member'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function transaksi(Request $request,$printing_id)
    {
        $printing = Printing::find($printing_id);
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
        return view('/member/transaksi', compact('printing','j_p_tersedias'));
    }

    public function transaksi2(Request $request,$printing_id)
    {
        $printing = Printing::find($printing_id);
        $jenis_id = $request->jenis_printing;
        $member = $request->member_id;
        $jenis_printing = Jenis_printing::find($jenis_id);
        $tersedias = Layanan_Tersedia::where('printing_id', $printing_id)
                    ->orderBy('detail__print_id')
                    ->get();
        foreach($tersedias as $i=> $tersedia){
            if($tersedia->detail_print->jenis_printing_id == $jenis_id){
                $tersedia2[$i]=$tersedia->detail_print->id;
            }
        }
        $transaksi = Transaksi::where('user_id', $member)
                    ->where('status_pemesanan', 0)
                    ->where('printing_id',$printing_id)
                    ->get();

        $layanans = Layanan_Tersedia::where('printing_id',$printing_id)
                    ->whereIn('detail__print_id', $tersedia2)
                    ->get();

        return view('/member/transaksi-2', compact('jenis_printing', 'layanans', 'printing'));
    }
    public function transaksi3(Request $request,$printing_id)
    {
        $printing = Printing::find($printing_id);
        $jumlah_halaman = $request->jumlah_halaman;
        $jumlah_cetak = $request->jumlah_cetak;
        $member = $request->member_id;
        $layanan_selected = $request->kertas;

        $layanan = Layanan_Tersedia::find($layanan_selected);

        $transaksi = Transaksi::where('user_id', $member)
                    ->where('printing_id',$printing_id)
                    ->where('status_pemesanan', 0)
                    ->get();

        if(empty($transaksi[0])){
            $new_transaksi = new Transaksi();
            $new_transaksi->user_id = $member;
            $new_transaksi->printing_id = $printing_id;
            $new_transaksi->save();
            $transaksi = Transaksi::where('user_id', $member)
                    ->where('printing_id',$printing_id)
                    ->where('status_pemesanan', 0)
                    ->get();
        }

        $trx_id = $transaksi[0]->id;

        $new_detail = new Detail_transaksi();
        $new_detail->transaksi_id = $trx_id;
        $new_detail->layanan_tersedia_id = $layanan_selected;
        $new_detail->jumlah_halaman = $jumlah_halaman;
        $new_detail->jumlah_cetak = $jumlah_cetak;
        $new_detail->harga = $layanan->harga;

        $file = $request->file('file');
        $filename = $request->file('file')->getClientOriginalName();
        $ext = explode(".", $filename);
        $ext =  end($ext);
        $string = str_random(15);
        $nama_file = $string.'_'.$trx_id."_"."$layanan_selected".".".$ext;
        $file->storeAs("uploaded_file/$member", $nama_file, 'public');
        $path = "storage/uploaded_file/$member/$nama_file";
            
        $new_detail->file = $path;
        $new_detail->save();
        
        return view('/member/transaksi-3', compact('printing'));
    }

    public function cart($member_id)
    {
        $auth_id = Auth()->user()->id;
        if($member_id == $auth_id){
            $trx_0 = Transaksi::where('user_id',12)
                        ->where('status_pemesanan',0)
                        ->get();

            $cart_0[0][0] = 0;            
            if(isset($trx_0[0])){
                foreach($trx_0 as $i=>$trx){
                    $id = $trx->id;
                    $cart_0[$i] = DB::select("
                        SELECT detail_transaksis.id, jumlah_halaman, jumlah_cetak, file, 
                            jenis_kertas.nama as jenis_kertas, 
                            jenis_printings.nama as jenis_printing, 
                            ukuran_kertas.nama as ukuran_kertas, detail_transaksis.harga,
                            (detail_transaksis.harga * jumlah_halaman * jumlah_cetak) AS total,
                            printings.nama as nama_printing,
                            detail_transaksis.`transaksi_id`
                        FROM detail_transaksis, transaksis, layanan_tersedias, jenis_kertas, detail__prints, jenis_printings, ukuran_kertas, printings
                        WHERE transaksis.id = detail_transaksis.`transaksi_id`
                        AND transaksis.id = $id
                        AND detail_transaksis.`layanan_tersedia_id` = layanan_tersedias.id
                        AND layanan_tersedias.detail__print_id = detail__prints.id
                        AND detail__prints.jenis_kertas_id = jenis_kertas.id
                        AND detail__prints.jenis_printing_id = jenis_printings.id
                        AND detail__prints.ukuran_kertas_id = ukuran_kertas.id
                        AND transaksis.printing_id = printings.id
                        ORDER BY detail_transaksis.id");    
                }
            }

            $trx_1 = Transaksi::where('user_id',$auth_id)
                        ->where('status_pemesanan',1)
                        ->get();
            $cart_1[0][0] = 0;
            if(isset($trx_1[0])){
                foreach($trx_1 as $i=>$trx){
                    $id = $trx->id;
                    $cart_1[$i] = DB::select("
                        SELECT detail_transaksis.id, jumlah_halaman, jumlah_cetak, file, 
                            jenis_kertas.nama as jenis_kertas, 
                            jenis_printings.nama as jenis_printing, 
                            ukuran_kertas.nama as ukuran_kertas, detail_transaksis.harga,
                            (detail_transaksis.harga * jumlah_halaman * jumlah_cetak) AS total,
                            printings.nama as nama_printing,
                            detail_transaksis.`transaksi_id`
                        FROM detail_transaksis, transaksis, layanan_tersedias, jenis_kertas, detail__prints, jenis_printings, ukuran_kertas, printings
                        WHERE transaksis.id = detail_transaksis.`transaksi_id`
                        AND transaksis.id = $id
                        AND detail_transaksis.`layanan_tersedia_id` = layanan_tersedias.id
                        AND layanan_tersedias.detail__print_id = detail__prints.id
                        AND detail__prints.jenis_kertas_id = jenis_kertas.id
                        AND detail__prints.jenis_printing_id = jenis_printings.id
                        AND detail__prints.ukuran_kertas_id = ukuran_kertas.id
                        AND transaksis.printing_id = printings.id
                        ORDER BY detail_transaksis.id, printings.id");    
                }
            }

            $trx_2 = Transaksi::where('user_id',$auth_id)
                        ->where('status_pemesanan',2)
                        ->get();
            $cart_2[0][0] = 0;
            if(isset($trx_2[0])){
                foreach($trx_2 as $i=>$trx){
                    $id = $trx->id;
                    $cart_2[$i] = DB::select("
                        SELECT detail_transaksis.id, jumlah_halaman, jumlah_cetak, file, 
                            jenis_kertas.nama as jenis_kertas, 
                            jenis_printings.nama as jenis_printing, 
                            ukuran_kertas.nama as ukuran_kertas, detail_transaksis.harga,
                            (detail_transaksis.harga * jumlah_halaman * jumlah_cetak) AS total,
                            printings.nama as nama_printing,
                            detail_transaksis.`transaksi_id`
                        FROM detail_transaksis, transaksis, layanan_tersedias, jenis_kertas, detail__prints, jenis_printings, ukuran_kertas, printings
                        WHERE transaksis.id = detail_transaksis.`transaksi_id`
                        AND transaksis.id = $id
                        AND detail_transaksis.`layanan_tersedia_id` = layanan_tersedias.id
                        AND layanan_tersedias.detail__print_id = detail__prints.id
                        AND detail__prints.jenis_kertas_id = jenis_kertas.id
                        AND detail__prints.jenis_printing_id = jenis_printings.id
                        AND detail__prints.ukuran_kertas_id = ukuran_kertas.id
                        AND transaksis.printing_id = printings.id
                        ORDER BY detail_transaksis.id");    
                }
            }

            $trx_3 = Transaksi::where('user_id',$auth_id)
                        ->where('status_pemesanan',3)
                        ->orWhere('status_pemesanan',4)
                        ->get();

            $cart_3[0][0] = 0;
            if(isset($trx_3[0])){
                foreach($trx_3 as $i=>$trx){
                    $id = $trx->id;
                    $cart_3[$i] = DB::select("
                        SELECT detail_transaksis.id, jumlah_halaman, jumlah_cetak, file, 
                            jenis_kertas.nama as jenis_kertas, 
                            jenis_printings.nama as jenis_printing, 
                            ukuran_kertas.nama as ukuran_kertas, detail_transaksis.harga,
                            (detail_transaksis.harga * jumlah_halaman * jumlah_cetak) AS total,
                            printings.nama as nama_printing,
                            detail_transaksis.`transaksi_id`,
                            status_pemesanan
                        FROM detail_transaksis, transaksis, layanan_tersedias, jenis_kertas, detail__prints, jenis_printings, ukuran_kertas, printings
                        WHERE transaksis.id = detail_transaksis.`transaksi_id`
                        AND transaksis.id = $id
                        AND detail_transaksis.`layanan_tersedia_id` = layanan_tersedias.id
                        AND layanan_tersedias.detail__print_id = detail__prints.id
                        AND detail__prints.jenis_kertas_id = jenis_kertas.id
                        AND detail__prints.jenis_printing_id = jenis_printings.id
                        AND detail__prints.ukuran_kertas_id = ukuran_kertas.id
                        AND transaksis.printing_id = printings.id
                        ORDER BY detail_transaksis.id");    
                }
            }

            $trx_4 = Transaksi::where('user_id',$auth_id)
                        ->where('status_pemesanan',5)
                        ->get();

            $cart_4[0][0] = 0;
            if(isset($trx_4[0])){
                foreach($trx_0 as $i=>$trx){
                    $id = $trx->id;
                    $cart_4[$i] = DB::select("
                        SELECT detail_transaksis.id, jumlah_halaman, jumlah_cetak, file, 
                            jenis_kertas.nama as jenis_kertas, 
                            jenis_printings.nama as jenis_printing, 
                            ukuran_kertas.nama as ukuran_kertas, detail_transaksis.harga,
                            (detail_transaksis.harga * jumlah_halaman * jumlah_cetak) AS total,
                            printings.nama as nama_printing,
                            detail_transaksis.`transaksi_id`
                        FROM detail_transaksis, transaksis, layanan_tersedias, jenis_kertas, detail__prints, jenis_printings, ukuran_kertas, printings
                        WHERE transaksis.id = detail_transaksis.`transaksi_id`
                        AND transaksis.id = $id
                        AND detail_transaksis.`layanan_tersedia_id` = layanan_tersedias.id
                        AND layanan_tersedias.detail__print_id = detail__prints.id
                        AND detail__prints.jenis_kertas_id = jenis_kertas.id
                        AND detail__prints.jenis_printing_id = jenis_printings.id
                        AND detail__prints.ukuran_kertas_id = ukuran_kertas.id
                        AND transaksis.printing_id = printings.id
                        ORDER BY detail_transaksis.id");    
                }
            }
            return view('/member/cart', compact('auth_id','cart_0','cart_1','cart_2','cart_3','cart_4'));
        }
        else{
            return redirect(route('member.cart', $auth_id));
        }  
    }

    public function download(Request $request)
    {
        $auth_id = Auth()->user()->id;
        $path = $request->path;
        return response()->download($path);
        return redirect(route('member.cart', $auth_id));
    }

    public function checkout($trx_id)
    {
        $auth_id = Auth()->user()->id;
        $trx = Transaksi::find($trx_id);
        $trx->status_pemesanan = 1;
        $trx->save();
        return redirect(route('member.cart', $auth_id));
    }

    public function getbukti($trx_id)
    {
        $total = DB::select("
                    SELECT SUM(detail_transaksis.harga * jumlah_halaman * jumlah_cetak) AS total
                    FROM detail_transaksis, transaksis
                    WHERE transaksis.id = detail_transaksis.`transaksi_id`
                    AND detail_transaksis.`transaksi_id`=$trx_id ;");    
        return view('/member/upload-bukti', compact('trx_id','total'));
        
    }

    public function postbukti(Request $request, $trx_id)
    {
        $auth_id = Auth()->user()->id;

        $file = $request->file('bukti');
        $filename = $request->file('bukti')->getClientOriginalName();
        $ext = explode(".", $filename);
        $ext =  end($ext);
        $string = str_random(15);
        $nama_file = $string.'_'.$trx_id."_"."bukti".".".$ext;
        $file->storeAs("uploaded_file/$auth_id/bukti", $nama_file, 'public');
        $path = "storage/uploaded_file/$auth_id/bukti/$nama_file";

        $trx = Transaksi::find($trx_id);
        $trx->status_pemesanan = 2;
        $trx->bukti_pembayaran = $path;
        $trx->save();
        return redirect(route('member.cart', $auth_id));
    }

    public function getrating($trx_id)
    {
        $trx = Transaksi::find($trx_id);
        $printing_id = $trx->printing_id;
        $printing = Printing::find($printing_id);
        
        return view('/member/rating', compact('printing','trx_id'));
    }

    public function postrating($trx_id, Request $request)
    {   
        $auth_id = Auth()->user()->id;
        $rating = $request->rating;
        $trx = Transaksi::find($trx_id);
        $trx->rating = $rating;
        $trx->status_pemesanan = 4;
        $trx->save();
        $printing_id = $trx->printing_id;
        $printing = Printing::find($printing_id);
        $ratings = DB::select("SELECT SUM(rating) AS ratings, COUNT(id) AS count FROM transaksis
                WHERE printing_id = $printing_id
                and status_pemesanan > 3
                Group by printing_id");
        if(isset($ratings[0])){
            $rating_new = ($ratings[0]->ratings + $rating) / ($ratings[0]->count+1);    
        }
        else{
            $rating_new = $rating;
        }
        $printing->rating = $rating_new;
        $printing->save();
        return redirect(route('member.cart', $auth_id));
    }
}

