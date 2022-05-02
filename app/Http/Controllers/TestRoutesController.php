<?php

namespace App\Http\Controllers;

class TestRoutesController extends Controller
{
    public function index()
    {
        abort(500);
        return response('index page');
    }

    public function create()
    {
        return response('created', 200);
    }

    public function delete()
    {
        return response('cannot delete this', 400);
    }
}
