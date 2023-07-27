<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Http\Requests\StoreEbookRequest;
use App\Http\Requests\UpdateEbookRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.ebook.index', [
            'title' => "E-book | Dashboard Admin Guruku",
            'ebooks' => Ebook::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.ebook.create', [
            'title' => "Buat Data E-book Baru | Dashboard Admin Guruku"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEbookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'slug' => 'required|unique:ebooks',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
            'author' => 'required',
            'file' => 'required|mimes:pdf|max:3000',
            'synopsis' => 'required|max:200',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('coverEbook-images');
        }

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->store('ebooks');
        }

        Ebook::create($validatedData);

        return redirect('/dashboard/ebook')->with('added', 'Ebook Terbaru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function show(Ebook $ebook)
    {
        return view('admin.dashboard.ebook.detail', [
            'title' => "Detail E-book | Dashboard Admin Guruku",
            'ebook' => $ebook
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Ebook $ebook)
    {
        return view('admin.dashboard.ebook.edit', [
            'title' => "Edit E-book | Dashboard Admin Guruku",
            'ebook' => $ebook
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEbookRequest  $request
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ebook $ebook)
    {
        $rules = [
            'tittle' => 'required',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
            'author' => 'required',
            'file' => 'mimes:pdf|max:3000',
            'synopsis' => 'required|max:250',
        ];

        if ($request->slug != $ebook->slug) {
            $rules['slug'] = 'required|unique:ebooks';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('coverEbook-images');
        }

        if ($request->file('file')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }

            $validatedData['file'] = $request->file('file')->store('ebooks');
        }

        Ebook::where('id', $ebook->id)->update($validatedData);

        return redirect('/dashboard/ebook')->with('added', 'Data E-book Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ebook  $ebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ebook $ebook)
    {
        if ($ebook->image) {
            Storage::delete($ebook->image);
        }

        if ($ebook->file) {
            Storage::delete($ebook->file);
        }

        Ebook::destroy($ebook->id);
        return redirect('/dashboard/ebook')->with('deleted', 'Data E-book Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
    
    public function downloadEbook(Ebook $ebook)
    {
        return Storage::download($ebook->file);
    }
}
