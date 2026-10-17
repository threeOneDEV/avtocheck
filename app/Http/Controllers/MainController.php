<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index', [
            'services' => Service::all()
        ]);
    }
}
