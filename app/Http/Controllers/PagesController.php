<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use JavaScript;
use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function index(Request $request) {
        $user = Auth::user() ? User::with('professional', 'classroom')->find(Auth::user()->id) : null;

        JavaScript::put([
            'user' =>  $user
        ]);


        return view('vue');
    }
}
