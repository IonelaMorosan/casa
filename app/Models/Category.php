<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Form;
use Encore\Admin\Grid;


class Category extends Model
{
    protected $table = 'categories';
    public $incrementing = true;
    protected $primaryKey = 'id';
    public $timestamps = true;

    public static function grid($callback)
    {
        return new Grid(new static, $callback);
    }
    public static function form($callback)
    {
        return new Form(new static, $callback);
    }
}
