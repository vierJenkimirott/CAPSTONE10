<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapsController extends Controller
{
    public function showCaps()
    {
        return view('caps');
    }

    // You can add more methods here if needed, such as handling form submissions or other actions related to the caps view.
}
