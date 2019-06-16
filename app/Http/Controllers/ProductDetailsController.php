<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;

class ProductDetailsController extends Controller
{
    public function index($id)
    {
      $listing = Listing::join('categories', 'listings.categories_id', '=', 'categories.id')
      ->where('listings.visible', '1')
      ->where('categories.visible', '1')
      ->where('listings.id', $id)
      ->orderBy('listings.created_at')
      ->select('listings.*', 'categories.name as categories_name')
      ->first();

      return view('product-details', ['listing' =>  $listing]);
    }
}