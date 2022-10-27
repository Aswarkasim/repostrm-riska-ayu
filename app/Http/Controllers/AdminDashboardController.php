<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    function index()
    {
        $data = [
            'ptik_mk'         => Matakuliah::whereProdi('PTIK')->get(),
            'tekom_mk'         => Matakuliah::whereProdi('TEKOM')->get(),
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    }
}
