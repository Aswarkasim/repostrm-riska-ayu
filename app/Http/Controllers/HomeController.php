<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        //

        $data = [
            'banner'    => Banner::get(),
            'post'     => Post::with('category')->paginate(8),
            'mk_ptik'   => Matakuliah::whereProdi('PTIK')->count(),
            'mk_tekom'   => Matakuliah::whereProdi('TEKOM')->count(),
            'content'  => 'home/home/index'
        ];
        return view('home/layouts/wrapper', $data);
    }
}
