<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Listing;
use App\Admin\Controllers\ListingController;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $grid = new Grid(new Listing);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->picture()->image();
        $states = [
            '1' => ['text' => 'ON'],
            '0' => ['text' => 'OFF'],
        ];
        $grid->visible()->switch($states);
        $grid->column('display_order', __('Order'))->editable();
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        
        return $content
            ->title('Dashboard')
            ->row($grid);
    }
}
