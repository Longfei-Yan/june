<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Product;
use App\Models\ProductSku;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Log;

class ProductController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Product(), function (Grid $grid) {
            $grid->model()->with(['category']);

            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('category.title', '类目');
            $grid->column('description');
            $grid->column('image')->image();
            $grid->column('on_sale')->switch();
            $grid->column('rating');
            $grid->column('sold_count');
            $grid->column('review_count');
            $grid->column('price');
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
        return Show::make($id, new Product(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('description');
            $show->field('image');
            $show->field('on_sale');
            $show->relation('skus', 'SKU 列表', function ($model) {
                $grid = new Grid(new ProductSku());
                $grid->model()->where('product_id', $model->id);
                // 设置路由
                $grid->setResource('skus');
                $grid->title;
                $grid->description;
                $grid->price;
                $grid->stock;
                $grid->disableCreateButton();
                return $grid;
            });
            $show->field('rating');
            $show->field('sold_count');
            $show->field('review_count');
            $show->field('price');
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
        return Form::make(Product::with('skus'), function (Form $form) {
            $form->display('id');
            $form->select('category_id')->options(function (){
                return \App\Models\ProductCategory::selectOptions();
            })->saving(function ($v) {
                return (int) $v;
            })->required();
            $form->text('title')->rules('required');
            $form->image('image')->rules('required|image')->move('images/goods')->uniqueName()->autoUpload();
            $form->editor('description')->rules('required');
            $form->switch('on_sale')->default(0);
            // 一对多
            $form->fieldset(__('商品规格'), function (Form $form){
                $form->hasMany('skus', '', function (Form\NestedForm $form) {
                    $form->text('title')->rules('required');
                    $form->text('description')->rules('required');
                    $form->text('price')->rules('required|numeric|min:0.01');
                    $form->text('stock')->rules('required|integer|min:0');
                });
            });

            $form->hidden('price');
            //取sku最小价格为spu的价格
            $form->saving(function (Form $form) {
                $form->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;
            });

//            $form->text('rating');
//            $form->text('sold_count');
//            $form->text('review_count');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
