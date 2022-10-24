<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminDosenController extends Controller
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

        $dosen = User::whereRole('dosen')->latest()->paginate(10);

        if ($cari) {
            $dosen = User::where('name', 'like', '%' . $cari . '%')->whereRole('dosen')->latest()->paginate(10);
        } else {
            $dosen = User::whereRole('dosen')->latest()->paginate(10);
        }


        $data = [
            'title'   => 'Manajemen User',
            'dosen' => $dosen,
            'content' => 'admin/dosen/index'
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
            'title'   => 'Tambah User',
            'content' => 'admin/dosen/add'
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
        // Re Password harusnya tidak masuk
        $data = $request->validate([
            'name'          => 'required|min:3',
            'nidn'          => 'required',
            'nohp'          => 'required',
            'prodi'          => 'required',
        ]);
        $data['password'] = Hash::make($data['nidn']);
        $data['role'] = 'dosen';

        User::create($data);
        Alert::success('Sukses', 'Dosen telah ditambahkan');
        return redirect('/admin/dosen/create');
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
        $dosen = User::find($id);
        $data = [
            'title'   => 'Tambah User',
            'dosen' => $dosen,
            'content' => 'admin/dosen/add'
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
        $dosen = User::find($id);
        $data = $request->validate([
            'name'          => 'required|min:3',
            'nidn'          => 'required',
            'nohp'          => 'required',
            'prodi'          => 'required',
        ]);
        $data['password'] = Hash::make($data['nidn']);
        $data['role'] = 'dosen';

        $dosen->update($data);
        Alert::success('success', 'User telah diedit');
        return redirect('/admin/dosen/' . $dosen->id . '/edit');
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
        DB::table('users')->delete($id);
        Alert::success('success', 'User telah dihapus');
        return redirect('/admin/dosen');
    }
}
