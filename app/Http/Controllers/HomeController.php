<?php

namespace App\Http\Controllers;

use App\Models\members;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = members::all();

        return view('home', compact('members'));
    }

}
