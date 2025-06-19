<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class DashboardController extends Controller
{
    public function index()
    {
        Session::put('device', 1);
        
        $profil = DB::table('profil')->first();

        Session::put('alamat', $profil->alamat);
        Session::put('email', $profil->email);
        Session::put('no_hp', $profil->no_hp);
        Session::put('rekening', $profil->rekening);

        $cekUser = session()->get('idTamu');

        if ($cekUser) {
            $keranjang = DB::table('keranjang')->where('id_tamu', $cekUser)->where('status', 0)->get();
            // Menyimpan jumlah item dalam keranjang
            Session::put('jmlIsiKeranjang', $keranjang->count());
        }

        $produk = DB::table('produk')->get();
        $dataUser = DB::table('pelanggan')->pluck('id_tamu');
        $data = [
            'produk'    =>  $produk,
            'dataUser'    =>  $dataUser,
        ];

        return view('website.dashboard.index', $data);
    }

    public function storeId(Request $request)
    {
        Session::put('idTamu', $request->idTamu);

        $tamu  = DB::table('pelanggan')->where('id_tamu', $request->idTamu)->first();

        if(!$tamu){
            DB::table('pelanggan')->insert([
                'id_tamu'   => $request->idTamu,
            ]);
        }

        return response()->json(['message' => 'Berhasil memasang idTamu.']);
    }

    public function show($id = NULL)
    {
        $produk = DB::table('produk')->where('id', $id)->first();
        $data = [
            'produk'    =>  $produk,
        ];

        return view('website.dashboard.show', $data);
    }
}
