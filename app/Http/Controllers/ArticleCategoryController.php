<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategory;
use App\Http\Requests\StoreArticleCategoryRequest;
use App\Http\Requests\UpdateArticleCategoryRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleCat = ArticleCategory::all();
        $articles = Article::all();
        return view('admin.dashboard.article.kategori', [
            'title' => "Artikel | Dashboard Admin Guruku",
            'articleCat' => $articleCat,
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.article.createKategori', [
            'title' => "Buat Kategori Artikel | Dashboard Admin Guruku"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required',
            'slug' => 'required|unique:article_categories'
        ]);

        ArticleCategory::create($validatedData);

        return redirect('/dashboard/article-category')->with('added', 'Kategori Artikel Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCategory $articleCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategory $articleCategory)
    {
        return view('admin.dashboard.article.editKategori', [
            'title' => "Edit Kategori Seminar & Workshop | Dashboard Admin Guruku",
            'kategori' => $articleCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleCategoryRequest  $request
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategory $articleCategory)
    {
        $rules = [
            'tittle' => 'required'
        ];

        if ($request->slug != $articleCategory->slug) {
            $rules['slug'] = 'required|unique:article_categories';
        }

        $validatedData = $request->validate($rules);

        ArticleCategory::where('id', $articleCategory->id)->update($validatedData);

        return redirect('/dashboard/article-category')->with('added', 'Kategori Artikel Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategory  $articleCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCategory $articleCategory)
    {
        //
    }
}
