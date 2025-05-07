<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwardsController extends Controller
{
    public function show()
    {
        return view('forms.awards'); 
    }
}
