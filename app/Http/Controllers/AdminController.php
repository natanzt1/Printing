<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Transaksi;
use App\Printing;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view(route('everyone.index'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $this->create($request->all());

        return redirect(route('admin.index')); 
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Admin::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function index()
    {
        $admins = Admin::where('status',0)->get();
        $trx_bayars = Transaksi::where('status_pemesanan', 3)->get();
        $printings = Printing::where('status',0)->get();
        return view('admin.index', compact('admins','trx_bayars','printings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function getMember()
    {
        if(Auth()->admin()->status == 0){
            return redirect('admin.index');
        }
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    public function getPrinting()
    {
        if(Auth()->admin()->status == 0){
            return redirect('admin.index');
        }
        $printings = Printing::all();
        return view('admin.printing', compact('printings'));
    }

    public function getBannedMember()
    {
        if(Auth()->admin()->status == 0){
            return redirect('admin.index');
        }
        $users = User::where('status', 2)->get();
        return view('admin.user', compact('users'));
    }

    public function getBannedPrinting()
    {
        if(Auth()->admin()->status == 0){
            return redirect('admin.index');
        }
        $printings = Printing::where('status',2)->get();
        return view('admin.printing', compact('printings'));
    }

    public function bannedMember($id)
    {
        $user = User::find($id);
        $user->status = 2;
        $user->save();
        return redirect('admin.member');
    }

    public function restoreMember($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return redirect(route('admin.member'));
    }

    public function bannedPrinting($id)
    {
        $user = Printing::find($id);
        $user->status = 1;
        $user->save();
        return redirect(route('admin.printing'));
    }

    public function restorePrinting($id)
    {
        $user = Printing::find($id);
        $user->status = 1;
        $user->save();
        return redirect(route('admin.printing'));
    }

    public function getTransaksi()
    {
        $trx_bayars = Transaksi::where('status_pemesanan', 3)->get();
        return view('admin.transaksi', compact('trx_bayars'));
    }

    public function konfirmasiTrx($id)
    {
        $trx = Transaksi::find($id);
        $trx->status_pemesanan = 4;
        $trx->save();
        return redirect(route('admin.getTransaksi'));
    }

    public function tolakTrx($id)
    {
        $trx = Transaksi::find($id);
        $trx->status_pemesanan = 6;
        $trx->save();
        return redirect(route('admin.getTransaksi'));
    }
}
