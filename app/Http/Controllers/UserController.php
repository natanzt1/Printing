<?php

namespace App\Http\Controllers;

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
        $foto->storeAs('member_profile', $nama_file, 'public');
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

        if(isset($transaksi[0])){
            $trx_id = $transaksi[0]->id;
            $details = Detail_transaksi::where('transaksi_id', $trx_id)->get();
            if(isset($details[0])){
                foreach($details as $j=>$detail){
                    $existed[$j] = $detail->layanan_tersedia_id;
                }
                $layanans = Layanan_Tersedia::where('printing_id',$printing_id)
                        ->whereIn('detail__print_id', $tersedia2)
                        ->whereNotIn('id', $existed)
                        ->get();
            }
            else{
                $layanans = Layanan_Tersedia::where('printing_id',$printing_id)
                    ->whereIn('detail__print_id', $tersedia2)
                    ->get();
            }
            
        }
        else{
            $layanans = Layanan_Tersedia::where('printing_id',$printing_id)
                    ->whereIn('detail__print_id', $tersedia2)
                    ->get();
        }

        return view('/member/transaksi-2', compact('jenis_printing', 'layanans', 'printing'));
    }
    public function transaksi3(Request $request,$printing_id)
    {
        $printing = Printing::find($printing_id);
        $jumlah = $request->jumlah;
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
            return "berhasil";
            $transaksi = Transaksi::where('user_id', $member)
                    ->where('printing_id',$printing_id)
                    ->where('status_pemesanan', 0)
                    ->get();
        }
        $trx_id = $transaksi[0]->id;
        $details_trx = Detail_transaksi::where('transaksi_id', $trx_id)
                    ->where('layanan_tersedia_id', $layanan_selected)
                    ->get();
        if(empty($details_trx[0])){
            $transaksi_id = $transaksi[0]->id;
            $new_detail = new Detail_transaksi();
            $new_detail->transaksi_id = $transaksi_id;
            $new_detail->layanan_tersedia_id = $layanan_selected;
            $new_detail->jumlah = $jumlah;
            $new_detail->harga = $layanan->harga;

            $file = $request->file('file');
            $filename = $request->file('file')->getClientOriginalName();
            $ext = explode(".", $filename);
            $ext =  end($ext);
            $nama_file = $trx_id."_"."$layanan_selected".".".$ext;
            $file->storeAs("uploaded_file/$member", $nama_file, 'public');
            $path = "storage/uploaded_file/$member/$nama_file";
            
            $new_detail->file = $path;
            $new_detail->save();
        }
        return view('/member/transaksi-3', compact('printing'));
    }
}

