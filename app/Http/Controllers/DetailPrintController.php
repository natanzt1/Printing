<?php

namespace App\Http\Controllers;

use App\Detail_Print;
use App\Jenis_kertas;
use App\Ukuran_kertas;
use App\Jenis_printing;
use Illuminate\Http\Request;

class DetailPrintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $printings = Detail_Print::all();
        return view('admin/print/set-detail-printing', compact('printings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jeniss_p = Jenis_printing::all();  //Jenis Printing
        $jeniss_k = Jenis_kertas::all();    //Jenis Kertas
        $ukurans_k = Ukuran_kertas::all();  //Ukuran Kertas
        return view('admin/print/create', compact('jeniss_p', 'jeniss_k', 'ukurans_k'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //get data dari form
        $jenis_p = $request->jenis_printing;
        $jenis_k = $request->jenis_kertas;
        $ukuran_k = $request->ukuran_kertas;

        //Mengecek apakah data ada yang sama atau tidak
        $checkIfExist = Detail_Print::where("jenis_printing_id", $jenis_p)
                        ->where("jenis_kertas_id", $jenis_k)
                        ->where("ukuran_kertas_id", $ukuran_k)
                        ->get();
        
        foreach($checkIfExist as $check){
            //Redirect kembali ke halaman sebelumnya karena ada data yang sama
            return redirect('/admin/print/create'); 
            
        }
        
        $detail = new Detail_Print();
        $detail->jenis_printing_id = $jenis_p;
        $detail->jenis_kertas_id = $jenis_k;
        $detail->ukuran_kertas_id = $ukuran_k;
        $detail->save();
        return "Berhasil"; //Redirect ke halaman notif berhasil disimpan
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\detail_print  $detail_print
     * @return \Illuminate\Http\Response
     */
    public function show(detail_print $detail_print)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\detail_print  $detail_print
     * @return \Illuminate\Http\Response
     */
    public function edit(detail_print $detail_print)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\detail_print  $detail_print
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detail_print $detail_print)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\detail_print  $detail_print
     * @return \Illuminate\Http\Response
     */
    public function destroy(detail_print $detail_print)
    {
        //
    }
}
