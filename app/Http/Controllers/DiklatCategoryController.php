<?php

namespace App\Http\Controllers;

use App\Models\DiklatCategory;
use App\Models\Diklat;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class DiklatCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diklatCat = DiklatCategory::all();
        $diklat = Diklat::all();
        return view('admin.dashboard.diklat.kategori', [
            'title' => "Diklat | Dashboard Admin Guruku",
            'diklatCat' => $diklatCat,
            'diklat' => $diklat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.diklat.createKategori', [
            'title' => "Buat Kategori Diklat | Dashboard Admin Guruku"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiklatCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:diklat_categories'
        ]);

        DiklatCategory::create($validatedData);

        return redirect('/dashboard/diklat-kategori')->with('added', 'Kategori Diklat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiklatCategory  $diklatCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DiklatCategory $diklatCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiklatCategory  $diklatCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DiklatCategory $diklat_kategori)
    {
        return view('admin.dashboard.diklat.editKategori', [
            'title' => "Edit Kategori Diklat | Dashboard Admin Guruku",
            'kategori' => $diklat_kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiklatCategoryRequest  $request
     * @param  \App\Models\DiklatCategory  $diklatCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiklatCategory $diklat_kategori)
    {
        $rules = [
            'name' => 'required'
        ];

        if ($request->slug != $diklat_kategori->slug) {
            $rules['slug'] = 'required|unique:diklat_categories';
        }

        $validatedData = $request->validate($rules);

        DiklatCategory::where('id', $diklat_kategori->id)->update($validatedData);

        return redirect('/dashboard/diklat-kategori')->with('added', 'Kategori Diklat Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiklatCategory  $diklatCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiklatCategory $diklatCategory)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(DiklatCategory::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
