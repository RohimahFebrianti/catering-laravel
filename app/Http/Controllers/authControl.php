<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class authControl extends Controller
{
    //
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
