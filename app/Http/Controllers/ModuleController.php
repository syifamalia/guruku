<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Http\Requests\StoreModuleRequest;
use App\Http\Requests\UpdateModuleRequest;
use App\Models\Training;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.modul.create', [
            'title' => "Buat Modul | Dashboard Admin Guruku",
            'trainings' => Training::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModuleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'training_id' => 'required',
            'subject' => 'required',
            'slug' => 'required|unique:modules',
            'videoLink' => 'required|unique:modules',
        ]);

        Module::create($validatedData);

        return redirect('/dashboard/training')->with('added', 'Modul Pelatihan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('admin.dashboard.modul.edit', [
            'title' => 'Edit Modul | Dashboard Admin Guruku',
            'module' => $module,
            'trainings' => Training::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModuleRequest  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $rules = [
            'training_id' => 'required',
            'subject' => 'required|max:255'
        ];

        if ($request->slug != $module->slug) {
            $rules['slug'] = 'required|unique:modules';
        }

        if ($request->videoLink != $module->videoLink) {
            $rules['videoLink'] = 'required|unique:modules';
        }

        $validatedData = $request->validate($rules);

        Module::where('id', $module->id)->update($validatedData);

        return redirect('/dashboard/training')->with('added', 'Modul Pelatihan Berhasil Ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        Module::destroy($module->id);
        return redirect('/dashboard/training')->with('deleted', 'Modul Pelatihan Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Module::class, 'slug', $request->subject);
        return response()->json(['slug' => $slug]);
    }
}
