<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Article;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ArticleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Article(), function (Grid $grid) {
            // 使用 with 来预加载商品类目数据，减少 SQL 查询
            $grid->model()->with(['category']);

            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('category.title', '分类名称');
            //$grid->column('content');
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
        return Show::make($id, Article::with('category'), function (Show $show) {

            $show->field('id');
            $show->field('title');
            $show->field('category.title', '分类名称');
            $show->field('content');
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
        return Form::make(new Article(), function (Form $form) {
            $form->display('id');
            $form->text('title')->rules('required');
            $form->select('category_id')->options(function (){
                return \App\Models\ArticleCategory::selectOptions();
            })->saving(function ($v) {
                return (int) $v;
            })->required();
            $form->editor('content')->rules('required');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
