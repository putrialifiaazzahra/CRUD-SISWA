<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::latest()->paginate(10);
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nisn'           => 'required',
            'nis'            => 'required',
            'nama_siswa'     => 'required',
            'id_kelas'       => 'required',
            'alamat'         => 'required',
            'no_tlp'         => 'required',
            'id_spp'         => 'required'
        ]);


        $siswa = Siswa::create([
            'nisn'           => $request->nisn,
            'nis'            => $request->nis,
            'nama_siswa'     => $request->nama_siswa,
            'id_kelas'       => $request->id_kelas,
            'alamat'         => $request->alamat,
            'no_tlp'         => $request->no_tlp,
            'id_spp'         => $request->id_spp
        ]);

        if($siswa){
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
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
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request, [
            'nisn'           => 'required',
            'nis'            => 'required',
            'nama_siswa'     => 'required',
            'id_kelas'       => 'required',
            'alamat'         => 'required',
            'no_tlp'         => 'required',
            'id_spp'         => 'required'
        ]);

        //get data siswa by ID
        $siswa = Siswa::findOrFail($siswa->id);

        if($request->file('nipd') == "") {

            $siswa->update([
                'nisn'           => $request->nisn,
            'nis'            => $request->nis,
            'nama_siswa'     => $request->nama_siswa,
            'id_kelas'       => $request->id_kelas,
            'alamat'         => $request->alamat,
            'no_tlp'         => $request->no_tlp,
            'id_spp'         => $request->id_spp
            ]);

        } else {

            $siswa->update([
                'nisn'           => $request->nisn,
            'nis'            => $request->nis,
            'nama_siswa'     => $request->nama_siswa,
            'id_kelas'       => $request->id_kelas,
            'alamat'         => $request->alamat,
            'no_tlp'         => $request->no_tlp,
            'id_spp'         => $request->id_spp
            ]);

        }

        if($siswa){
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        if($siswa){
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
