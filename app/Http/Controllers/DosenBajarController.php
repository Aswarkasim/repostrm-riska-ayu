<?php

namespace App\Http\Controllers;

use App\Models\Bajar;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DosenBajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $dosen_id = auth()->user()->id;
        $bajar = Bajar::whereDosenId($dosen_id)->get();
        $data = [
            'title'   => 'Manajemen Bahan Ajar',
            'bajar' => $bajar,
            'content' => 'admin/bajar/show'
        ];
        return view('admin/layouts/wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bajar = Bajar::find($id);
        if ($bajar->file != null) {
            unlink($bajar->file);
        }
        $bajar->delete();
        Alert::success('Sukses', 'Bajar sukses dihapus');
        return redirect('/admin/bajar/' . $bajar->matakuliah_id);
    }

    function download()
    {
        // return Storage::download('/public/docs/format-excel.xlsx');
        // die('masuk');
        $file = request('file');
        return response()->download($file);
    }
}
