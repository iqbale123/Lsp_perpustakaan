<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $imageName = time().'.'.$request->foto->extension();
        $request->foto->move(public_path('img'),$imageName);
        $user = User::find($id)->update($request->all());
        if ($request->password != null) {
            $user2 = User::find($id)->update([
                'password' => bcrypt($request->password)
            ]);
        }

        $user3 = User::find($id)->update([
            'foto' => $imageName
        ]);

        if ($user && $user2 && $user3) {
            return redirect()->back();
        }
        return redirect()->back();

    }
}
