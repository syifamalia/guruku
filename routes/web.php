<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiklatCategoryController;
use App\Http\Controllers\DiklatController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeminarWorkshopCategoryController;
use App\Http\Controllers\SeminarWorkshopController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserArticleEbookController;
use App\Http\Controllers\UserDiklatController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegisterController;
use App\Http\Controllers\UserSeminarWorkshopController;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home', [
//         "title" => "Guruku"
//     ]);
// });

// HOME
Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'store']);

// SECTION USER

// Login User
Route::get('/signin', [UserLoginController::class, 'index'])->name('signin')->middleware('guest');
Route::post('/signin', [UserLoginController::class, 'authenticate']);
Route::post('/signout', [UserLoginController::class, 'signout']);

// Forgot Password
Route::get('/forgot-password', function () {
    return view('login.forgot-password',[
        "title" => "Lupa Password | Guruku"
    ]);
})->middleware('guest');
// Send Reset Link
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
// Reset Password
Route::get('/reset-password/{token}', function ($token) {
    return view('login.reset-password', [
        'token' => $token,
        'title' => "Reset Password | Guruku"
    ]);
})->middleware('guest')->name('password.reset');
// Reset Password
Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('signin')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

// Register User
Route::get('/signup', [UserRegisterController::class, 'index'])->middleware('guest');
Route::post('/signup', [UserRegisterController::class, 'store']);


// Account User
Route::get('/akun', [AccountController::class, 'index'])->middleware('auth');
Route::get('/akun/sertifikat', [AccountController::class, 'sertifikat'])->middleware('auth');
Route::get('/akun/pengaturan', [AccountController::class, 'pengaturan'])->middleware('auth');
Route::put('/akun/pengaturan/{user}', [AccountController::class, 'update'])->middleware('auth');
Route::resource('/akun/review', ReviewController::class)->middleware('auth')->except('create', 'show', 'update', 'destroy', 'edit');

// Pelatihan User
Route::get('/pelatihan', [PelatihanController::class, 'index']);
Route::get('/pelatihan/detail/{training:slug}', [PelatihanController::class, 'detail']);
Route::get('/pelatihan/modul/{training:slug}', [PelatihanController::class, 'showModul'])->middleware('auth');

// Diklat User
Route::get('/diklat', [UserDiklatController::class, 'index']);
Route::get('/diklat/{category:slug}', [UserDiklatController::class, 'cat']);
Route::post('/diklat/detail', [UserDiklatController::class, 'update'])->middleware('auth');
Route::get('/diklat/detail/{diklat:slug}', [UserDiklatController::class, 'detail']);

// Seminar Workshop User
Route::get('/seminar-workshop', [UserSeminarWorkshopController::class, 'index']);
Route::get('/seminar-workshop/{category:slug}', [UserSeminarWorkshopController::class, 'cat']);
Route::get('/seminar-workshop/detail/{seminarWorkshop:slug}', [UserSeminarWorkshopController::class, 'detail']);

// Artikel E-book User
Route::get('/artikel', [UserArticleEbookController::class, 'indexArtikel']);
Route::get('/artikel/kategori/{category:slug}', [UserArticleEbookController::class, 'catArticle']);
Route::get('/artikel/{article:slug}', [UserArticleEbookController::class, 'detailArticle']);
Route::get('/ebook', [UserArticleEbookController::class, 'indexEbook']);
Route::get('/ebook/spesial', [UserArticleEbookController::class, 'spesialEbook']);
Route::get('/ebook/terbaru', [UserArticleEbookController::class, 'newEbook']);
Route::get('/ebook/downloadEbook/{ebook:slug}', [UserArticleEbookController::class, 'downloadEbook']);


// SECTION ADMIN

// Login Admin
Route::get('/admin', [AdminLoginController::class, 'index'])->middleware('guest');
Route::post('/admin', [AdminLoginController::class, 'authenticate']);
Route::post('/logout', [AdminLoginController::class, 'logout']);

// Register Admin
Route::get('/register', [AdminRegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [AdminRegisterController::class, 'store']);

// Dashboard Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth:admin');
Route::get('/dashboard/user', [DashboardController::class, 'userIndex'])->middleware('auth:admin');
Route::get('/dashboard/admin', [DashboardController::class, 'adminIndex'])->middleware('auth:admin');
Route::get('/dashboard/review', [DashboardController::class, 'reviewIndex'])->middleware('auth:admin');
Route::get('/dashboard/kontak', [DashboardController::class, 'kontakIndex'])->middleware('auth:admin');

// Dashboard Admin - Pelatihan
Route::get('/dashboard/training/checkSlug', [TrainingController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/training', TrainingController::class)->middleware('auth:admin');

// Dashboard Admin - Modul Pelatihan
Route::get('/dashboard/module/checkSlug', [ModuleController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/module', ModuleController::class)->middleware('auth:admin')->except('index', 'show');

// Dashboard Admin - Diklat
Route::get('/dashboard/diklat/checkSlug', [DiklatController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/diklat', DiklatController::class)->middleware('auth:admin');

// Dashboard Admin - Kategori Diklat
Route::get('/dashboard/diklat-kategori/checkSlug', [DiklatCategoryController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/diklat-kategori', DiklatCategoryController::class)->middleware('auth:admin')->except('show', 'destroy');

// Dashboard Admin - Partisipan Diklat
Route::resource('/dashboard/diklat-partisipan', ParticipantController::class)->middleware('auth:admin')->except('create', 'store', 'show', 'destroy');

// Dashboard Admin - Seminar & Workshop
Route::get('/dashboard/seminar-workshop/checkSlug', [SeminarWorkshopController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/seminar-workshop', SeminarWorkshopController::class)->middleware('auth:admin');

// Dashboard Admin - Kategori Seminar & Workshop
Route::get('/dashboard/seminar-workshop-kategori/checkSlug', [SeminarWorkshopCategoryController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/seminar-workshop-kategori', SeminarWorkshopCategoryController::class)->middleware('auth:admin')->except('show', 'destroy');

// Dashboard Admin - Article
Route::get('/dashboard/article/checkSlug', [ArticleController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/article', ArticleController::class)->middleware('auth:admin');

// Dashboard Admin - Kategori Artikel
Route::get('/dashboard/article-category/checkSlug', [ArticleCategoryController::class, 'checkSlug'])->middleware('auth:admin');
Route::resource('/dashboard/article-category', ArticleCategoryController::class)->middleware('auth:admin')->except('show', 'destroy');

// Dashboard Admin - Ebook
Route::get('/dashboard/ebook/checkSlug', [EbookController::class, 'checkSlug'])->middleware('auth:admin');
Route::get('/dashboard/downloadEbook/{ebook:slug}', [EbookController::class, 'downloadEbook'])->middleware('auth:admin');
Route::resource('/dashboard/ebook', EbookController::class)->middleware('auth:admin');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('admin');
// Route::resource('training', TrainingController::class)->middleware('admin');

// Route Admin
// Route::get('/admin-pelatihan', [TrainingController::class, 'index']);
// Route::get('/admin-pelatihan/create', [TrainingController::class, 'create']);
// Route::get('/admin-pelatihan/{training}', [TrainingController::class, 'show']);
// Route::get('/training/{training}/editPelatihan', [TrainingController::class, 'edit']);
// Route::post('/admin-pelatihan', [TrainingController::class, 'store']);
// Route::delete('/admin-pelatihan/{training}', [TrainingController::class, 'destroy']);
// Route::patch('/admin-pelatihan/{training}', [TrainingController::class, 'update']);
