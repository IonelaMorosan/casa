<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\Category;
use App\Models\Listing;
use App\Services\CategoryService;

class ListingController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Listings';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Listing());

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'));
        $grid->column('price', __('Price'))->editable();
        $grid->rate()->display(function ($rate) {
            $html = "<i class='fa fa-star' style='color:#ff8913'></i>";
            if ($rate < 1) {
                return '';
            }
            return join('&nbsp;', array_fill(0, min(5, $rate), $html));
        });
        $grid->categories_id('Category')->display(function($category_id) {
            $categoryService = new CategoryService();
            $categoryMap = $categoryService->getAvailableAsArray();
            return $categoryMap[$category_id];
        });
        $grid->picture_1()->image();
        $states = [
            '1' => ['text' => 'ON'],
            '0' => ['text' => 'OFF'],
        ];
        $grid->visible()->switch($states);
        $grid->column('created_at', __('Created at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed   $id
     * @return Show
     */
    protected function detail($id)
    {
        
        $show = new Show(Listing::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('price', __('Price'));
        $show->field('rate', __('Rate'));
        $show->field('color', __('Color'));
        $show->field('description', __('Description'));
        $show->field('visible', __('Visible'));
        $show->picture_1()->image();
        $show->picture_2()->image();
        $show->picture_3()->image();
        $show->picture_4()->image();
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Listing());
        $categoryService = new CategoryService();

        $form->display('id', __('ID'));
        $form->text('name', __('Name'))->rules('required');
        $form->number('price', __('Price'))->default(0)->rules('required');
        $form->number('rate')->default(5);
        $form->select('color')->options(["black", "white", "red", "green", "yellow"])->rules('required');
        $form->switch('visible')->default('1');
        $form->select('categories_id', __('Category'))->options($categoryService->getAvailableAsArray())->rules('required');
        $form->textarea('description', __('Desciption'));
        $form->image('picture_1')->uniqueName();
        $form->image('picture_2')->uniqueName();
        $form->image('picture_3')->uniqueName();
        $form->image('picture_4')->uniqueName();
        $form->display('created_at', __('Created At'));
        $form->display('updated_at', __('Updated At'));

        return $form;
    }
}
