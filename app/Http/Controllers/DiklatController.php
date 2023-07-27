<?php

namespace App\Http\Controllers;

use App\Models\Diklat;
use App\Models\DiklatCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DiklatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.diklat.index', [
            'title' => "Diklat | Dashboard Admin Guruku",
            'diklats' => Diklat::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.diklat.create', [
            'title' => "Buat Diklat | Dashboard Admin Guruku",
            'diklatCat' => DiklatCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiklatsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'diklat_category_id' => 'required',
            'tittle' => 'required',
            'slug' => 'required|unique:diklats',
            'desc_body' => 'required',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
            'trainer' => 'required',
            'regist_deadline' => 'required|date',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('diklat-images');
        }

        $validatedData['desc'] = Str::limit(strip_tags($request->desc_body), 150);

        Diklat::create($validatedData);

        return redirect('/dashboard/diklat')->with('added', 'Data Diklat Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diklat  $diklat
     * @return \Illuminate\Http\Response
     */
    public function show(Diklat $diklat)
    {
        return view('admin.dashboard.diklat.detail', [
            'title' => "Detail Diklat | Dashboard Admin Guruku",
            'diklat' => $diklat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diklat  $diklat
     * @return \Illuminate\Http\Response
     */
    public function edit(Diklat $diklat)
    {
        return view('admin.dashboard.diklat.edit', [
            'title' => "Edit Diklat | Dashboard Admin Guruku",
            'diklatCat' => DiklatCategory::all(),
            'diklat' => $diklat
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiklatsRequest  $request
     * @param  \App\Models\Diklats  $diklats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diklat $diklat)
    {
        $rules = [
            'tittle' => 'required',
            'diklat_category_id' => 'required',
            'desc_body' => 'required',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
            'trainer' => 'required',
            'regist_deadline' => 'required|date',
        ];

        if ($request->slug != $diklat->slug) {
            $rules['slug'] = 'required|unique:diklats';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('diklat-images');
        }

        $validatedData['desc'] = Str::limit(strip_tags($request->desc_body), 150);

        Diklat::where('id', $diklat->id)->update($validatedData);

        return redirect('/dashboard/diklat')->with('added', 'Data Diklat Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diklat $diklat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diklat $diklat)
    {
        if ($diklat->image) {
            Storage::delete($diklat->image);
        }

        Diklat::destroy($diklat->id);
        return redirect('/dashboard/diklat')->with('deleted', 'Data Diklat Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Diklat::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
}
