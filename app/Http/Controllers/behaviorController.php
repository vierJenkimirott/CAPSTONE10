<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BehaviorController extends Controller
{
    public function showBehavior()
    {
        return view('behavior');
    }

    // You can add more methods here if needed, such as handling form submissions or other actions related to the caps view.
}
