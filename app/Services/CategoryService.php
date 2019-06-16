<?php
namespace App\Services;
use App\Models\Category;

class CategoryService
{
  public function getAvailable() 
  {
    return Category::where('visible', '1')->orderBy('display_order')->get();
  }

  public function getAvailableAsArray() 
  {
    $categories = Category::orderBy('display_order')->get();
    $map = array();
    foreach($categories as $category) 
    {
      $map[$category->id] = $category->name;
    }
    return $map;
  }
}