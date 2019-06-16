<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;

class ShopController extends Controller
{
    public function index(Request $request)
    {
      $query = Listing::join('categories', 'listings.categories_id', '=', 'categories.id')
      ->where('listings.visible', '1')
      ->where('categories.visible', '1')
      ->orderBy('listings.created_at')
      ->select('listings.*');

      if($request->input('categories_id') != NULL)
      {
        $query->where('listings.categories_id', $request->input('categories_id'));
      }

      return view('shop', ['listings' => $query->get()]);
    }
}