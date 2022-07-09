<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('email');
            $grid->column('email_verified_at');
            $grid->column('password');
            $grid->column('remember_token');
            $grid->column('first_name');
            $grid->column('last_name');
            $grid->column('birthdate');
            $grid->column('gender');
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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('email');
            $show->field('email_verified_at');
            $show->field('password');
            $show->field('remember_token');
            $show->field('first_name');
            $show->field('last_name');
            $show->field('birthdate');
            $show->field('gender');
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
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('name')->rules('required');
            $form->email('email')->rules('required');
            $form->password('password')->saving(function ($vaule){
                return bcrypt($vaule);
            });
            $form->text('first_name')->default('');
            $form->text('last_name')->default('');
            $form->date('birthdate');
            $form->radio('gender')->options([0 => '空', 1=> '男', 2=>'女'])->default(0);

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
