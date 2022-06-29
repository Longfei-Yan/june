<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\License;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class LicenseController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new License(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('photo')->image();
            $grid->column('logo')->image();
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->quickSearch('name')->placeholder('搜索名称');
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('%name%');

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
        return Show::make($id, new License(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('title');
            $show->field('address');
            $show->field('about');
            $show->field('photo')->image();
            $show->field('logo')->image();

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
        return Form::make(new License(), function (Form $form) {
            $form->display('id');
            $form->text('name')->required();
            $form->text('title')->required();
            $form->text('address')->required();
            $form->text('about')->required();
            $form->image('photo')->move('images/license')->autoUpload();
            $form->image('logo')->move('images/logo')->uniqueName()->autoUpload();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
