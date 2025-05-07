<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function show()
    {
        return view('forms.work'); 
    }
}
