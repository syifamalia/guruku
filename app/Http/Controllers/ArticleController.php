<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\ArticleCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.article.index', [
            'title' => "Artikel | Dashboard Admin Guruku",
            'articles' => Article::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.article.create', [
            'title' => "Buat Seminar / Workshop Baru | Dashboard Admin Guruku",
            'articleCat' => ArticleCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'article_category_id' => 'required',
            'tittle' => 'required',
            'slug' => 'required|unique:articles',
            'desc_body' => 'required',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('article-images');
        }

        $validatedData['desc'] = Str::limit(strip_tags($request->desc_body), 150);

        Article::create($validatedData);

        return redirect('/dashboard/article')->with('added', 'Artikel Terbaru Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.dashboard.article.detail', [
            'title' => "Detail Artikel | Dashboard Admin Guruku",
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.dashboard.article.edit', [
            'title' => "Edit Artikel | Dashboard Admin Guruku",
            'articleCat' => ArticleCategory::all(),
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $rules = [
            'tittle' => 'required',
            'article_category_id' => 'required',
            'desc_body' => 'required',
            'image' => 'image|file|max:1024|dimensions:max_width=1280,max_height=720',
        ];

        if ($request->slug != $article->slug) {
            $rules['slug'] = 'required|unique:articles';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }

            $validatedData['image'] = $request->file('image')->store('article-images');
        }

        $validatedData['desc'] = Str::limit(strip_tags($request->desc_body), 150);

        Article::where('id', $article->id)->update($validatedData);

        return redirect('/dashboard/article')->with('added', 'Artikel Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete($article->image);
        }

        Article::destroy($article->id);
        return redirect('/dashboard/article')->with('deleted', 'Artikel Berhasil Dihapus!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Article::class, 'slug', $request->tittle);
        return response()->json(['slug' => $slug]);
    }
}
