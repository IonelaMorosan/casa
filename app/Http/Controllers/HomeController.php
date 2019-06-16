<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
      return view('index', ['categories' => Category::where('visible', '1')->orderBy('display_order')->get()]);
    }
}