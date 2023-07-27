<?php

namespace App\Http\Controllers;

use App\Models\SeminarWorkshopCategory;
use App\Http\Requests\StoreSeminarWorkshopCategoryRequest;
use App\Http\Requests\UpdateSeminarWorkshopCategoryRequest;
use App\Models\SeminarWorkshop;
use Illuminate\Http\Request;

class SeminarWorkshopCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $swCat = SeminarWorkshopCategory::all();
        $seminarWorkshop = SeminarWorkshop::all();
        return view('admin.dashboard.seminarWorkshop.kategori', [
            'title' => "Kategori Seminar & Workshop | Dashboard Admin Guruku",
            'swCat' => $swCat,
            'seminarWorkshop' => $seminarWorkshop
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.seminarWorkshop.createKategori', [
            'title' => "Buat Kategori Seminar & Workshop | Dashboard Admin Guruku"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSeminarWorkshopCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'slug' => 'required|unique:seminar_workshop_categories'
        ]);

        SeminarWorkshopCategory::create($validatedData);

        return redirect('/dashboard/seminar-workshop-kategori')->with('added', 'Kategori Seminar & Workshop Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeminarWorkshopCategory  $seminarWorkshopCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SeminarWorkshopCategory $seminarWorkshopCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeminarWorkshopCategory  $seminarWorkshopCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SeminarWorkshopCategory $seminar_workshop_kategori)
    {
        return view('admin.dashboard.seminarWorkshop.editKategori', [
            'title' => "Edit Kategori Seminar & Workshop | Dashboard Admin Guruku",
            'kategori' => $seminar_workshop_kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeminarWorkshopCategoryRequest  $request
     * @param  \App\Models\SeminarWorkshopCategory  $seminarWorkshopCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeminarWorkshopCategory $seminar_workshop_kategori)
    {
        $rules = [
            'tittle' => 'required'
        ];

        if ($request->slug != $seminar_workshop_kategori->slug) {
            $rules['slug'] = 'required|unique:seminar_workshop_categories';
        }

        $validatedData = $request->validate($rules);

        SeminarWorkshopCategory::where('id', $seminar_workshop_kategori->id)->update($validatedData);

        return redirect('/dashboard/seminar-workshop-kategori')->with('added', 'Kategori Seminar & Workshop Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeminarWorkshopCategory  $seminarWorkshopCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeminarWorkshopCategory $seminarWorkshopCategory)
    {
        //
    }
}
