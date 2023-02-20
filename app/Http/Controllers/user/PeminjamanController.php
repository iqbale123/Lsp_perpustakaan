<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\buku;
use App\Models\pemberitahuan;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function indexRiwayat()
     {
         $peminjaman = Peminjaman::where('user_id' , Auth::user()->id)->get();
         return view('user.peminjaman.riwayat' , compact('peminjaman'));
     }

     public function indexForm()
     {
         // $peminjaman = Peminjaman::where('id' , Auth::user()->id);
         $buku = buku::all();
         return view('user.peminjaman.form' , compact('buku'));
     }

     public function form(Request $request)
     {
         $buku = Buku::all();
         $buku_Id = $request->buku_Id;
         return view('user.peminjaman.form' , compact('buku' , 'buku_id'));

     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         //
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function storeForm(Request $request)
     {
         $peminjaman = Peminjaman::create([
             'user_id' => $request->user_id,
             'buku_id' => $request->buku_id,
             'tanggal_peminjaman' => $request->tanggal_peminjaman,
             'kondisi_buku_saat_dipinjam' => $request->kondisi_buku_saat_dipinjam
         ]);

         $buku = buku::where('id' , $request->buku_id)->first();
         if ($request->kondisi_buku_saat_dipinjam == 'baik') {
             $buku->update([
                 'j_buku_baik' => $buku->j_buku_baik -1
             ]);
         }

         if ($request->kondisi_buku_saat_dipinjam == 'rusak') {
             $buku->update([
                 'j_buku_rusak' => $buku->j_buku_rusak -1
             ]);
         }

         pemberitahuan::create([
             'isi' => Auth::user()->username . " Berhasil Meminjam Buku " . $buku->judul
         ]);

         return redirect()->route('user.peminjaman.riwayat');

     }

     /**
      * Display the specified resource.
      *
      * @param  \App\Models\Peminjaman  $peminjaman
      * @return \Illuminate\Http\Response
      */
     public function show(Peminjaman $peminjaman)
     {
         //
     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\Models\Peminjaman  $peminjaman
      * @return \Illuminate\Http\Response
      */
     public function edit(Peminjaman $peminjaman)
     {
         //
     }

     /**
      * Update the specified resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @param  \App\Models\Peminjaman  $peminjaman
      * @return \Illuminate\Http\Response
      */
     public function update(Request $request, Peminjaman $peminjaman)
     {
         //
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\Models\Peminjaman  $peminjaman
      * @return \Illuminate\Http\Response
      */
     public function destroy(peminjaman $peminjaman)
     {
         //
     }
}
