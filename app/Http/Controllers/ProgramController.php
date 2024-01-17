<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Kategori;
use App\Models\Program;

class ProgramController extends Controller
{
    public function home()
    {
        $program = Program::all()->sortBy('tanggal');
        $kategori = Kategori::all();
        return view('home', ['program' => $program, 'kategori' => $kategori]);
    }


    public function programPublik()
    {
        $program = Program::all()->sortBy('tanggal');
        $kategori = Kategori::all();
        return view('tampil.program', ['program' => $program, 'kategori' => $kategori]);
    }

    public function detailProgram($id)
    {
        $program = Program::find($id);

        return view('tampil.detailprogram', ['program' => $program]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $program = Program::all();
        $kategori = Kategori::all();
        return view('program.index', ['program' => $program, 'kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Kategori::all();
        return view('program.tambah', ['kategori'=>$categories]);
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
            'tempat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/program'), $imageName);
        
        $program = new Program();
        $program->title = $request->input('title');
        $program->pj_kegiatan = $request->input('pj_kegiatan');
        $program->tanggal = $request->input('tanggal');
        $program->tempat = $request->input('tempat');
        $program->kategori_id = $request->input('kategori_id');
        $program->deskripsi = $request->input('deskripsi');
        $program->image = $imageName;   
        $program->save();

        return redirect('/admin/program');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $program = Program::find($id);
        return view('program.detail', ['program' => $program]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::find($id);
        $kategori = Kategori::all();
        return view('program.edit', ['program' => $program, 'kategori' => $kategori]);
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
            'tempat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $program = Program::find($id);

        if ($program->image) {
        $oldImagePath = public_path('images/program') . '/' . $program->image;
        if (File::exists($oldImagePath)) {
            File::delete($oldImagePath);
        }
    }
        $program->title = $request->input('title');
        $program->pj_kegiatan = $request->input('pj_kegiatan');
        $program->tanggal = $request->input('tanggal');
        $program->tempat = $request->input('tempat');
        $program->kategori_id = $request->input('kategori_id');
        $program->deskripsi = $request->input('deskripsi');


        if ($request->has('image')) {
            $newImageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/program'), $newImageName);

            $program->image = $newImageName;
        }
        $program->save();

        return redirect('/admin/program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);

        // Hapus gambar terkait jika ada
        if ($program->image) {
            $imagePath = public_path('images/program') . '/' . $program->image;
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        $program->delete();

        return redirect('/admin/program');
    }
}