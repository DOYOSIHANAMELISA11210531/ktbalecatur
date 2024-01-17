<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Rencana;
use Illuminate\Support\Facades\File;
// use File;
use GuzzleHttp\Psr7\UploadedFile;

class RencanaController extends Controller
{


    public function rencanaPublik()
    {
        $rencana = Rencana::all()->sortBy('tanggal');
        $kategori = Kategori::all();
        return view('tampil.rencana', ['rencana' => $rencana, 'kategori' => $kategori]);
    }

    public function detailRencana($id)
    {
        $rencana = Rencana::find($id);

        return view('tampil.detailrencana', ['rencana' => $rencana]);
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rencana = Rencana::all();
        $kategori = Kategori::all();
        return view('rencana.index', ['rencana' => $rencana, 'kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('rencana.tambah', ['kategori' => $kategori]);
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
            'title' => 'required|string|max:255',
            'pj_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/rencana'), $imageName);

        
        $rencana = new Rencana();
        $rencana->title = $request->input('title');
        $rencana->pj_kegiatan = $request->input('pj_kegiatan');
        $rencana->tanggal = $request->input('tanggal');
        $rencana->kategori_id = $request->input('kategori_id');
        $rencana->deskripsi = $request->input('deskripsi');
        $rencana->image = $imageName;   
        $rencana->save();

        return redirect('/admin/rencana');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rencana = Rencana::find($id);
        return view('rencana.detail', ['rencana' => $rencana]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rencana = Rencana::find($id);
        $kategori = Kategori::all();
        return view('rencana.edit', ['rencana' => $rencana, 'kategori' => $kategori]);
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
        $request->validate([
            'title' => 'required|string|max:255',
            'pj_kegiatan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $rencana = Rencana::find($id);

        if ($rencana->image) {
        $oldImagePath = public_path('images/rencana') . '/' . $rencana->image;
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }
        $rencana->title = $request->input('title');
        $rencana->pj_kegiatan = $request->input('pj_kegiatan');
        $rencana->tanggal = $request->input('tanggal');
        $rencana->kategori_id = $request->input('kategori_id');
        $rencana->deskripsi = $request->input('deskripsi');


        if ($request->has('image')) {
            $newImageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/rencana'), $newImageName);

            $rencana->image = $newImageName;
        }
        $rencana->save();

        return redirect('/admin/rencana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rencana = Rencana::findOrFail($id);

        // Hapus gambar terkait jika ada
        if ($rencana->image) {
            $imagePath = public_path('images/rencana') . '/' . $rencana->image;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

            $rencana->delete();
            return redirect('/admin/rencana');
    }

    
}