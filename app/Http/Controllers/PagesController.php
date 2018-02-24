<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request) {
        JavaScript::put([
            'user' => Auth::user(),
        ]);

        return view('welcome');
    }
}
