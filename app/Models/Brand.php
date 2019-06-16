<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Encore\Admin\Form;
use Encore\Admin\Grid;


class Brand extends Model
{
    protected $table = 'brands';
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
