<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Layout\Row;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Tree;
use App\Admin\Repositories\ProductCategory;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ProductCategoryController extends AdminController
{
    public function index(Content $content)
    {
        return $content->header('树状模型')
            ->body(function (Row $row) {
                $tree = new Tree(new ProductCategory());

                $row->column(12, $tree);
            });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ProductCategory(), function (Form $form) {
            $form->display('id');
            $form->text('parent_id');
            $form->text('order');
            $form->text('title');
            $form->text('is_directory');
            $form->text('depth');
            $form->text('path');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
