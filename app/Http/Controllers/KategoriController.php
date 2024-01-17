<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Kategori::all();
        return view('kategori.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.tambah');
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
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        Kategori::create([
            'name' => $request->input('name'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect('/admin/kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Kategori::findOrFail($id);
        return view('kategori.detail', ['category' => $category]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Kategori::findOrFail($id);
        return view('kategori.edit', ['category' => $category]);
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
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $category = Kategori::findOrFail($id);
        $category->update([
            'name' => $request->input('name'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect('/admin/kategori');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Kategori::findOrFail($id);
        $category->delete();
        return redirect('/admin/kategori');
    }
}