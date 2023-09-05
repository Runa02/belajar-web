<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MasterkontakController extends Controller
{
    public function index()
    {
        return view ('admin.masterkontak');
    }
}
