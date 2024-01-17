<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    public function AnggotaPublik()
    {
        $anggota = Anggota::all();
        return view('tampil.anggota', ['anggota' => $anggota]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('anggota.index', ['anggota' => $anggota]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'padukuhan' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/anggota'), $imageName);

        
        $anggota = new Anggota();
        $anggota->nama = $request->input('nama');
        $anggota->jabatan = $request->input('jabatan');
        $anggota->padukuhan = $request->input('padukuhan');
        $anggota->image = $imageName;   
        $anggota->save();

        return redirect('admin/anggota');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.detail', ['anggota' => $anggota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota.edit', ['anggota' => $anggota]);
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
        $anggota = Anggota::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'padukuhan' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama sebelum menyimpan yang baru
            Storage::disk('public')->delete($anggota->image);
            $imagePath = $request->file('image')->store('images/anggota', 'public');
        } else {
            // Jika tidak ada gambar baru, gunakan gambar yang lama
            $imagePath = $anggota->image;
        }

        $anggota->update([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
            'padukuhan' => $request->input('padukuhan'),
            'image' => $imagePath,
        ]);

        return redirect('/admin/anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();
        return redirect('/admin/anggota');
    }
}