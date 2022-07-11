<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\ProductCategory;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ProductCategoryController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new ProductCategory(), function (Grid $grid) {
            $grid->column('id')->bold()->sortable();
            $grid->title->tree(false);
            $grid->order->orderable(); // 开启排序功能
            $grid->column('is_directory')->display(function ($value) {
                return $value ? '是' : '否';
            });
            $grid->column('depth');
            $grid->column('path');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new ProductCategory(), function (Show $show) {
            $show->field('id');
            $show->field('parent_id');
            $show->field('order');
            $show->field('title');
            $show->field('is_directory');
            $show->field('depth');
            $show->field('path');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ProductCategory, function (Form $form) {
            $form->display('id');
            $form->select('parent_id')->options(function (){
                return \App\Models\ProductCategory::selectOptions();
            })->saving(function ($v) {
                return (int) $v;
            })->required();
            $form->hidden('order');
            $form->text('title')->rules('required');
            $form->switch('is_directory');
            $form->hidden('depth')->default(1);
            $form->hidden('path');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
