<?php

namespace App\Http\Controllers;

use App\Models\Cpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DosenCplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $matakuliah_id = request('matakuliah_id');
        $cpl = Cpl::whereMatakuliahId($matakuliah_id)->paginate(10);
        $data = [
            'title'   => 'Manajemen Matakuliah',
            'cpl' => $cpl,
            'matakuliah_id' => $matakuliah_id,
            'content' => 'admin/cpl/index'
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
        $matakuliah_id = request('matakuliah_id');

        $data = [
            'title'   => 'Manajemen Matakuliah',
            'matakuliah_id' => $matakuliah_id,
            'content' => 'admin/cpl/add'
        ];
        return view('admin/layouts/wrapper', $data);
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
        $data = $request->validate([
            'cpl'              => 'required',
            'cpmk'              => 'required',
            'matakuliah_id' => 'required',

        ]);
        Cpl::create($data);
        Alert::success('Sukses', 'CPL telah ditambahkan');
        return redirect('/dosen/matakuliah/cpl?matakuliah_id=' . $data['matakuliah_id']);
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
        // $matakuliah_id = request('matakuliah_id');

        $data = [
            'title'   => 'Manajemen Matakuliah',
            'cpl'       => Cpl::find($id),
            'content' => 'admin/cpl/add'
        ];
        return view('admin/layouts/wrapper', $data);
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
        $cpl = Cpl::find($id);
        $data = $request->validate([
            'cpl'              => 'required',
            'cpmk'              => 'required',
            'matakuliah_id' => 'required',

        ]);
        $cpl->update($data);
        Alert::success('Sukses', 'CPL telah disimpan');
        return redirect('/dosen/matakuliah/cpl?matakuliah_id=' . $data['matakuliah_id']);
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
        $cpl = Cpl::find($id);
        $mk_id = $cpl->matakuliah_id;
        DB::table('cpls')->delete($id);
        Alert::success('success', 'Cpl telah dihapus');
        return redirect('/dosen/matakuliah/cpl?matakuliah_id=' . $mk_id);
    }
}
