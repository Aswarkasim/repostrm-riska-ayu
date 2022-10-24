<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Pengampuh;
use Illuminate\Http\Request;

class DosenMatakuliahController extends Controller
{
    //

    public function index()
    {
        //
        $cari = request('cari');

        $dosen_id = auth()->user()->id;
        $pmk = Pengampuh::with('matakuliah')->whereDosenId($dosen_id)->get();
        // dd($pmk);
        $data = [
            'title'   => 'Manajemen Matakuliah',
            'pmk' => $pmk,
            'content' => 'admin/bajar/matakuliah'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    // public function tekom()
    // {
    //     //
    //     $cari = request('cari');

    //     $dosen_id = auth()->user()->id;
    //     $matakuliah = Matakuliah::with('dosen')->whereProdi('TEKOM')->whereDosenId($dosen_id)->paginate(10);
    //     $data = [
    //         'title'   => 'Manajemen Matakuliah',
    //         'matakuliah' => $matakuliah,
    //         'content' => 'admin/bajar/matakuliah'
    //     ];
    //     return view('admin/layouts/wrapper', $data);
    // }
}
