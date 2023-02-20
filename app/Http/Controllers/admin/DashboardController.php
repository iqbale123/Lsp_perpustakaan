<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\identitas;
use App\Models\peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota = User::where('role' , 'user')->count();
        $buku = buku::count();
        $peminjaman = peminjaman::count();
        $pengembalian =  Peminjaman::where('user_id' , Auth::user()->id)->where('tanggal_pengembalian', null)->count();
        $identitas = identitas::first();
        // dd($countAnggota,$countBuku,$countPeminjaman,$countPengembalian);
        return view('admin.dashboard', compact('anggota','peminjaman','pengembalian','buku','identitas'));
    }
}
