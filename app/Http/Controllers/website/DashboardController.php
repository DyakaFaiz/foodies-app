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
        Session::put('device', 0);

        $produk = DB::table('produk')->get();
        $data = [
            'produk'    =>  $produk,
        ];

        return view('website.dashboard.index', $data);
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
