<?php

namespace App\Http\Controllers;
use App\Models\Comics;


use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
  {
    $comics = Comics::all();
    return view('comic.index', compact('comics'));
  }
}
