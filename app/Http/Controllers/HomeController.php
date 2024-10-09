<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talk;

class HomeController extends Controller
{

    public function index()
    {
        // Get talks with comments, ordered by the latest ones
        $talks = Talk::with('comments')->orderBy('created_at', 'desc')->get();
        return view('pages.home', compact('talks'));
    }
}
