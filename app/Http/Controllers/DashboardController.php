<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Contact;
use App\Models\Diklat;
use App\Models\Review;
use App\Models\Training;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $newTraining = Training::select()->orderByDesc('created_at')->limit(3)->get();
        $newDiklat = Diklat::select()->orderByDesc('created_at')->limit(3)->get();
        return view('admin.dashboard.index', [
            'title' => "Dashboard Admin Guruku",
            'newTraining' => $newTraining,
            'newDiklat' => $newDiklat,
            'diklat' => Diklat::all()->count(),
            'training' => Training::all()->count(),
            'user' => User::all()->count(),
            'admin' => Admin::all()->count(),
        ]);
    }

    public function userIndex()
    {
        return view('admin.dashboard.userIndex', [
            'title' => "User Guruku | Dashboard Admin Guruku",
            'users' => User::all()
        ]);
    }

    public function adminIndex()
    {
        return view('admin.dashboard.adminIndex', [
            'title' => "Admin Guruku | Dashboard Admin Guruku",
            'admins' => Admin::all()
        ]);
    }

    public function editUser(User $user)
    {
        return view('admin.dashboard.user.edit', [
            'title' => "Edit User Guruku | Dashboard Admin Guruku",
            'users' => $user
        ]);
    }

    public function reviewIndex()
    {
        return view('admin.dashboard.reviewIndex', [
            'title' => "Review Guruku | Dashboard Admin Guruku",
            'reviews' => Review::all()
        ]);
    }
    
    public function kontakIndex()
    {
        return view('admin.dashboard.kontakIndex', [
            'title' => "Kontak Guruku | Dashboard Admin Guruku",
            'contacts' => Contact::all()
        ]);
    }
}
