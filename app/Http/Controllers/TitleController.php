<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;

class TitleController extends Controller
{
    public function index(Title $title)
    {
    return view('titles.index')->with(['posts' => $title->getByTitle()]);
    }
}
