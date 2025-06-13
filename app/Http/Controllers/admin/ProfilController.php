<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = DB::table('profil')->first();
        $data = [
            'title' => 'Profil',
            'profil' => $profil,
        ];

        return view('admin.profil.index', $data);
    }

    public function update(Request $request, $id)
    {
        $profil = DB::table('profil')->where('id', $id)->first();

        $data = [
            'alamat' => $request->alamat,
            'no_hp' => $request->noHp,
            'email' => $request->email,
            'rekening' => $request->rekening,
        ];

        DB::table('profil')->where('id', $id)->update($data);

        return redirect()->back()->with('success', 'Profil berhasil diupdate');
    }
}
