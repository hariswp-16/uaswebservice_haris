<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Golongan;
use App\Models\karyawan;

class GolonganController extends Controller
{
    public function index()
    {
        return Golongan::all();
    }
    public function create(Request $request)
    {
        foreach ($request->list_golongan as $key => $value) {
            Golongan::create([
                'nama_golongan' => $value['nama_golongan'],
                'gaji_pokok' => $value['gaji_pokok'],
                'tunjangan_istri' => $value['tunjangan_istri'],
                'tunjangan_anak' => $value['tunjangan_anak'],
                'id_Karyawan' => $value['id_karyawan']
            ]);
            $golongan = Golongan::create($golongan);
        }

        return response()->json([
                'message'       => 'success',
                'data_Karyawan'  => $golongan
            ], 200);
    }
    public function edit($id)
    {
        $karywan = Karyawan::with('golongan')->where('id', $id)->first();
        return response()->json([
                'message'       => 'success',
                'data_Karyawan'  => $golongan
            ], 200);
    }
    public function update(Request $request, $id)
    {
        $golongan= Golongan::find($id)->update; 
        foreach ($request->list_golongan as $key => $value) {
            $golongan->update([
                'nama_golongan' => $value['nama_golongan'],
                'gaji_pokok' => $value['gaji_pokok'],
                'tunjangan_istri' => $value['tunjangan_istri'],
                'tunjangan_anak' => $value['tunjangan_anak'],
                'id_Karyawan' => $karyawan->id
            ]);
        }



        return response()->json([
                'message'       => 'success',
                'data_Karyawan'  => $golongan
            ], 200);
    }

    public function delete($id)
    {
        $golongan = Golongan::find($id)->delete();

        return response()->json([
                'message'       => 'data Golongan berhasil dihapus'
            ], 200);
    }
}
