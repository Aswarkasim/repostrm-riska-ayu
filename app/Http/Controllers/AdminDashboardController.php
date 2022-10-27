<?php

namespace App\Http\Controllers;

use App\Models\Bajar;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    function index()
    {
        $ptik = Matakuliah::whereProdi('PTIK')->get();
        $tekom = Matakuliah::whereProdi('TEKOM')->get();


        $data = [
            'ptik_mk'         => $ptik,
            'tekom_mk'         => $tekom,
            'percent_ptik'      => $this->countPercent($ptik),
            'percent_tekom'      => $this->countPercent($tekom),
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    private function countPercent($data)
    {
        $total_mk = count($data);
        $value = 0;
        foreach ($data as $item) {
            $cek = Bajar::whereMatakuliahId($item->id)->count();
            if ($cek   >= 1) {
                $value = $value + 1;
            }
        }

        $percent = $value / $total_mk * 100;
        return round($percent);
    }
}
