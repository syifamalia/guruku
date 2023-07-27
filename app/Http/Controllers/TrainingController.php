<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Training;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::all();
        return view('admin.dashboard.training.pelatihan', [
            'title' => "Pelatihan | Dashboard Admin Guruku",
            'trainings' => $trainings,
            'modules' => Module::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.training.createPelatihan', [
            'title' => "Buat Pelatihan | Dashboard Admin Guruku"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTrainingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'slug' => 'required|unique:trainings',
            'desc_body' => 'required',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
            'trainer' => 'required',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('training-images');
        }

        $validatedData['desc'] = Str::limit(strip_tags($request->desc_body), 150);

        Training::create($validatedData);

        return redirect('/dashboard/training')->with('added', 'Data Pelatihan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        $modules = Module::where('training_id', $training->id)->get();
        return view('admin.dashboard.training.detailPelatihan', [
            'title' => "Detail Pelatihan | Dashboard Admin Guruku",
            'training' => $training,
            'modules' => $modules
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        return view('admin.dashboard.training.editPelatihan', [
            'title' => "Edit Pelatihan | Dashboard Admin Guruku",
            'training' => $training
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrainingRequest  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $rules = [
            'tittle' => 'required',
            'desc_body' => 'required',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
            'trainer' => 'required',
        ];

        if ($request->slug != $training->slug) {
            $rules['slug'] = 'required|unique:trainings';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('training-images');
        }

        $validatedData['desc'] = Str::limit(strip_tags($request->desc_body), 150);

        Training::where('id', $training->id)->update($validatedData);

        return redirect('/dashboard/training')->with('added', 'Data Pelatihan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        if ($training->image) {
            Storage::delete($training->image);
        }

        Training::destroy($training->id);
        Module::where('training_id', $training->id)->delete();
        return redirect('/dashboard/training')->with('deleted', 'Data Pelatihan Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Training::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
}
