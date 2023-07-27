<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserArticleEbookController extends Controller
{
    public function indexArtikel()
    {
        return view('articleEbook.indexArtikel', [
            "title" => "Artikel | Guruku",
            "categories" => ArticleCategory::all(),
            "articles" => Article::latest()->paginate(6)
        ]);
    }

    public function catArticle(ArticleCategory $category)
    {
        $articles = Article::where('article_category_id', $category->id)->latest()->paginate(6);
        return view('articleEbook.categoryArticle', [
            "title" =>  "Artikel " . $category->tittle . " | Guruku",
            "articles" => $articles,
            "categories" => ArticleCategory::all(),
            "category" => $category
        ]);
    }

    public function detailArticle(Article $article)
    {
        $random = Article::inRandomOrder()->limit(3)->whereNotIn('id', [request()->article->id])->get();

        return view('articleEbook.detailArticle', [
            "title" => "Detail Kegiatan | Guruku",
            "article" => $article,
            "randArticle" => $random
        ]);
    }

    public function indexEbook()
    {
        return view('articleEbook.indexEbook', [
            "title" => "Ebook | Guruku",
            "tittle" => "List Semua Ebook",
            "ebooks" =>  Ebook::latest()->paginate(6)
        ]);
    }

    public function spesialEbook()
    {
        return view('articleEbook.indexEbook', [
            "title" => "Ebook Spesial | Guruku",
            "tittle" => "List Ebook Spesial",
            "ebooks" =>  Ebook::where('downloadCount', '>', 1)->latest()->paginate(6)
        ]);
    }
    
    public function newEbook()
    {
        return view('articleEbook.indexEbook', [
            "title" => "Ebook Terbaru | Guruku",
            "tittle" => "List Ebook Terbaru",
            "ebooks" =>  Ebook::select()->orderByDesc('created_at')->limit(6)->paginate(6)
        ]);
    }

    public function downloadEbook(Ebook $ebook)
    {
        $klik = $ebook->downloadCount + 1;
        Ebook::where('id', $ebook->id)->update(['downloadCount' => $klik]);
        return Storage::download($ebook->file);
    }
}
