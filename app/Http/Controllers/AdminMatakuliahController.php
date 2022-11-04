<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\Pengampuh;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use RealRashid\SweetAlert\Facades\Alert;

class AdminMatakuliahController extends Controller
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
        $semester = request('semester');
        $prodi = request('prodi');
        $role = auth()->user()->role;

        $pmk = [];

        if ($role == 'admin') {



            if ($cari || $semester || $prodi) {

                if ($prodi && $semester) {
                    $matakuliah = Matakuliah::with('dosen')->where('name', 'like', '%' . $cari . '%')->whereSemester($semester)->whereProdi($prodi)->latest()->paginate(10);
                } else {
                    $matakuliah = Matakuliah::with('dosen')->where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
                }


                if ($semester) {
                    if ($prodi) {
                        $matakuliah = Matakuliah::with('dosen')->where('name', 'like', '%' . $cari . '%')->whereSemester($semester)->whereProdi($prodi)->latest()->paginate(10);
                    } else {
                        $matakuliah = Matakuliah::with('dosen')->where('name', 'like', '%' . $cari . '%')->whereSemester($semester)->latest()->paginate(10);
                    }
                } else if ($prodi) {
                    $matakuliah = Matakuliah::with('dosen')->where('name', 'like', '%' . $cari . '%')->whereProdi($prodi)->latest()->paginate(10);
                } else {
                    $matakuliah = Matakuliah::with('dosen')->where('name', 'like', '%' . $cari . '%')->latest()->paginate(10);
                }
            } else {
                $matakuliah = Matakuliah::with('dosen')->latest()->paginate(10);
            }
        } else {
            $user_id = auth()->user()->id;
            $pmk = Pengampuh::with('matakuliah')->whereDosenId($user_id)->get();
        }
        $data = [
            'title'   => 'Manajemen Matakuliah',
            'matakuliah' => $matakuliah,
            'content' => 'admin/matakuliah/index'
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
        $data = [
            'title'   => 'Manajemen Matakuliah Artikel',
            'dosen'    => User::whereRole('dosen')->get(),
            'content' => 'admin/matakuliah/add'
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
        // print_r($request);
        // die;
        // dd($request);
        $data = $request->validate([
            'name'              => 'required|min:3',
            'kode'              => 'required',
            // 'dosen_id'              => 'required',
            'semester'              => 'required',
            'prodi'              => 'required',

        ]);
        Matakuliah::create($data);
        Alert::success('Sukses', 'Matakuliah telah ditambahkan');
        return redirect('/admin/matakuliah');
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
        // $pengampuh = Pengampuh::with('dosen')->whereMatakuliahId($matakuliah->id)->get();
        // dd($pengampuh);
        $pmk = Pengampuh::with('dosen')->whereMatakuliahId($id)->get();
        $data = [
            'title'   => 'Matakuliah',
            'matakuliah' => $matakuliah,
            'pmk' => $pmk,
            'dosen'     => User::whereRole('dosen')->get(),
            'content' => 'admin/matakuliah/show'
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
        $matakuliah = Matakuliah::find($id);
        $data = [
            'title'   => 'Edit Matakuliah',
            'matakuliah' => $matakuliah,
            'dosen'    => User::whereRole('dosen')->get(),
            'content' => 'admin/matakuliah/add'
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
        $matakuliah = Matakuliah::find($id);
        $data = $request->validate([
            'name'              => 'required|min:3',
            'kode'              => 'required',
            // 'dosen_id'              => 'required',
            'semester'              => 'required',
            'prodi'              => 'required',

        ]);
        $matakuliah->update($data);
        Alert::success('Sukses', 'Matakuliah telah diubah');
        return redirect('/admin/matakuliah');
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
        DB::table('matakuliahs')->delete($id);
        Alert::success('success', 'Kateogri telah dihapus');
        return redirect('/admin/matakuliah');
    }

    function upload(Request $request, $id)
    {
        // dd($request->all());
        $matakuliah = Matakuliah::find($id);

        if ($request->hasFile('cover')) {

            if ($matakuliah->cover != null) {
                unlink($matakuliah->cover);
            }

            $cover = $request->file('cover');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $cover_name = $uuid1 . $uuid2 . '.' . $cover->getClientOriginalExtension();

            $storage = 'uploads/documents/';
            $cover->move($storage, $cover_name);
            // $data['path'] = $storage;
            $data['cover'] =  $storage . $cover_name;
        } else {
            $data['cover'] = $matakuliah->cover;
        }

        if ($request->hasFile('rps')) {
            if ($matakuliah->rps != null) {
                unlink($matakuliah->rps);
            }


            $rps = $request->file('rps');
            $uuid1 = Uuid::uuid4()->toString();
            $uuid2 = Uuid::uuid4()->toString();
            $rps_name = $uuid1 . $uuid2 . '.' . $rps->getClientOriginalExtension();

            $storage = 'uploads/documents/';
            $rps->move($storage, $rps_name);
            // $data['path'] = $storage;
            $data['rps'] =  $storage . $rps_name;
        } else {
            $data['rps'] = $matakuliah->rps;
        }


        $matakuliah->update($data);
        Alert::success('Sukses', 'Matakuliah telah diubah');
        return redirect('/admin/matakuliah/' . $id);
    }

    function download()
    {
        $file = request('file');
        return response()->download($file);
    }

    function addPengampuh(Request $request)
    {
        $data = $request->validate([
            'dosen_id'  => 'required',
            'matakuliah_id' => 'required'
        ]);
        Pengampuh::create($data);
        Alert::success('Sukses', 'Matakuliah telah diubah');
        return redirect('/admin/matakuliah/' . $data['matakuliah_id']);
    }

    public function deletePengampuh($id)
    {
        //
        $p = Pengampuh::find($id);
        $mk_id = $p->matakuliah_id;
        DB::table('pengampuhs')->delete($id);
        Alert::success('success', 'Kateogri telah dihapus');
        return redirect('/admin/matakuliah/' . $mk_id);
    }
}
