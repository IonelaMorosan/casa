<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Form;
use Encore\Admin\Grid;

class Listing extends Model
{
    protected $table = 'listings';
    public $incrementing = true;
    protected $primaryKey = 'id';
    public $timestamps = true;
}
