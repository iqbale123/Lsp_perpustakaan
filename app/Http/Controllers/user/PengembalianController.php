<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function indexForm()
    {
        $judulBuku =  peminjaman::where('user_id' , Auth::user()->id)->where('tanggal_pengembalian' , null)->get();
        return view('user.pengembalian.form' , compact('judulBuku'));
    }

    public function indexRiwayat()
    {
        $pengembalian = Peminjaman::where('user_id' , Auth::user()->id)->get();
        // dd($pengembalian);
        return view('user.pengembalian.riwayat' , compact('pengembalian'));
    }

    public function storeForm(Request $request)
    {
        $cek = peminjaman::where('user_id' , $request->user_id)
                        ->where('buku_id' , $request->buku_id)
                        ->first();

        $cek->update([
            'tanggal_pengembalian'  => $request->tanggal_pengembalian,
            'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan
        ]);

        if ($request->kondisi_buku_saat_dikembalikan == 'baik') {
            $buku = Buku::where('id' , $request->buku_id)->first();

            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik + 1

            ]);

            $cek->update([
                'denda' => 0
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'rusak') {
            $buku = Buku::where('id' , $request->buku_id)->first();

            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1

            ]);

            $cek->update([
                'denda' => 20000
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'hilang') {
            $buku = buku::where('id' , $request->buku_id)->first();
            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik - 1

            ]);

            $cek->update([
                'denda' => 200000
            ]);
        }

        // Pemberitahuan::create([

        //     'isi' => Auth::user()->username . " Berhasil Mengembalikan Buku " . $buku->judul
        // ]);

        return redirect()->route('user.pengembalian.riwayat');
    }
}
