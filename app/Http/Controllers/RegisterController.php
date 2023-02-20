<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $anggota = User::where('role', 'user')->get();
        $count = count($anggota);
        $code = 'AA00' . $count +1;
        return view('auth.register', compact('anggota'));
    }

    public function store(Request $request)
    {
        $anggota = User::where('role', 'user')->get();
        $count = count($anggota);
        $code = 'AA00' . $count +1;

        $user = User::create([
            'kode' => $code,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'role' =>'user',
            'verif' => 'unverified',
            'join_date' => Carbon::now()
        ]);

        if ($user) {
            return redirect()->route('login');
        }

        // dd($user);
        return redirect()->back();
    }
}
