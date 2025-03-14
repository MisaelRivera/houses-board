<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index ()
    {
        return Inertia::render('Listing/Index', [
            'message' => 'Message from Laravel'
        ]);
    }

    public function show ()
    {
        return Inertia::render('Listing/Show');
    }
}
