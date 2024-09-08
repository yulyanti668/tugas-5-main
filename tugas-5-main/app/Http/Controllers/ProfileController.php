<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $profiles = Profile::all();
        $user = $request->session()->get('user');
        $profile = DB::table('profiles')->where('email', $user->email)->select('profiles.*')->first();

        return view('welcome', compact('profiles', 'user', 'profile'));
    }

    public function create()
    {
        //
    }
}
