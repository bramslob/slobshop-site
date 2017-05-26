<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ListsController extends BaseController
{
    public function index()
    {
        return view('Lists.index');
    }
}