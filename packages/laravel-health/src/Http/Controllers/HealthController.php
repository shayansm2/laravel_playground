<?php

namespace QueraCollege\LaravelHealth\Http\Controllers;

use Illuminate\Routing\Controller;

class HealthController extends Controller
{
    public function index()
    {
        return view('health::index');
    }
}
