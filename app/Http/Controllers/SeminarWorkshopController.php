<?php

namespace App\Http\Controllers;

use App\Models\SeminarWorkshop;
use App\Models\SeminarWorkshopCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SeminarWorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.seminarWorkshop.index', [
            'title' => "Seminar & Workshop | Dashboard Admin Guruku",
            'seminarWorkshop' => SeminarWorkshop::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.seminarWorkshop.create', [
            'title' => "Buat Seminar / Workshop Baru | Dashboard Admin Guruku",
            'swCat' => SeminarWorkshopCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSeminarWorkshopRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'seminar_workshop_category_id' => 'required',
            'tittle' => 'required',
            'slug' => 'required|unique:seminar_workshops',
            'desc_body' => 'required',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
            'speaker' => 'required',
            'regist_deadline' => 'required|date',
            'registLink' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('seminarWorkshop-images');
        }

        $validatedData['desc'] = Str::limit(strip_tags($request->desc_body), 150);

        SeminarWorkshop::create($validatedData);

        return redirect('/dashboard/seminar-workshop')->with('added', 'Data Kegiatan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SeminarWorkshop  $seminarWorkshop
     * @return \Illuminate\Http\Response
     */
    public function show(SeminarWorkshop $seminarWorkshop)
    {
        return view('admin.dashboard.seminarWorkshop.detail', [
            'title' => "Detail Kegiatan | Dashboard Admin Guruku",
            'seminarWorkshop' => $seminarWorkshop
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SeminarWorkshop  $seminarWorkshop
     * @return \Illuminate\Http\Response
     */
    public function edit(SeminarWorkshop $seminarWorkshop)
    {
        return view('admin.dashboard.seminarWorkshop.edit', [
            'title' => "Edit Kegiatan | Dashboard Admin Guruku",
            'swCat' => SeminarWorkshopCategory::all(),
            'seminarWorkshop' => $seminarWorkshop
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSeminarWorkshopRequest  $request
     * @param  \App\Models\SeminarWorkshop  $seminarWorkshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeminarWorkshop $seminarWorkshop)
    {
        $rules = [
            'tittle' => 'required',
            'seminar_workshop_category_id' => 'required',
            'desc_body' => 'required',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
            'speaker' => 'required',
            'regist_deadline' => 'required|date',
            'registLink' => 'required',
        ];

        if ($request->slug != $seminarWorkshop->slug) {
            $rules['slug'] = 'required|unique:seminar_workshops';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('seminarWorkshop-images');
        }

        $validatedData['desc'] = Str::limit(strip_tags($request->desc_body), 150);

        SeminarWorkshop::where('id', $seminarWorkshop->id)->update($validatedData);

        return redirect('/dashboard/seminar-workshop')->with('added', 'Data Kegiatan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SeminarWorkshop  $seminarWorkshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(SeminarWorkshop $seminarWorkshop)
    {
        if ($seminarWorkshop->image) {
            Storage::delete($seminarWorkshop->image);
        }

        SeminarWorkshop::destroy($seminarWorkshop->id);
        return redirect('/dashboard/seminar-workshop')->with('deleted', 'Data Kegiatan Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(SeminarWorkshop::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
}
