<?php

namespace App\Http\Controllers;

use App\Models\Bajar;
use App\Models\Matakuliah;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cari = request('cari');

        if ($cari) {
            $bajar = Bajar::with('matakuliah')->where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
        } else {
            $bajar = Bajar::with('matakuliah')->latest()->paginate(10);
        }
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
        // dd($request->all());
        $data = $request->validate([
            'name'              => 'required',
            'matakuliah_id'              => 'required',
            // 'dosen_id'              => 'required',
            'desc'              => 'required',

        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $file_name = $uuid1 . $uuid2 . '.' . $file->getClientOriginalExtension();

            $storage = 'uploads/documents/';
            $file->move($storage, $file_name);
            // $data['path'] = $storage;
            $data['file'] =  $storage . $file_name;
        } else {
            $data['file'] = NULL;
        }

        Bajar::create($data);
        Alert::success('Sukses', 'Bahan ajar telah ditambahkan');
        return redirect('/admin/bajar/' . $data['matakuliah_id']);
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
        $matakuliah = Matakuliah::find($id);
        $bajar = Bajar::whereMatakuliahId($id)->get();
        $data = [
            'title'     => 'Bahan Ajar',
            'bajar'     => $bajar,
            'matakuliah' => $matakuliah,
            'content'   => 'admin/bajar/show'
        ];
        return view('admin/layouts/wrapper', $data);
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
    }
}
