<?php

namespace App\Admin\Controllers;

use App\Admin\Renderable\LicenseSelectTable;
use App\Models\License;
use App\Models\Site;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Banner;
use App\Models\Mail;
use App\Models\Product;
use App\Models\ProductCategory;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class SiteController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Site(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('domain');
            $grid->column('license_id');
            $grid->column('product_ids');
            $grid->column('article_ids');
            $grid->column('mail_id');
            $grid->column('banner_ids');
            $grid->column('process_status');
            $grid->column('remark');
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
        return Show::make($id, new Site(), function (Show $show) {
            $show->field('id');
            $show->field('domain');
            $show->field('license_id');
            $show->field('product_ids');
            $show->field('article_ids');
            $show->field('mail_id');
            $show->field('banner_ids');
            $show->field('process_status');
            $show->field('remark');
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
        return Form::make(new Site(), function (Form $form) {
            $form->display('id');
            $form->text('domain')->rules(function (Form $form) {
                // 如果不是编辑状态，则添加字段唯一验证
                if (!$id = $form->model()->id) {
                    return 'unique:sites';
                }
            }, ['unique'=>'该域名已存在，不能重复添加！',]);
            $form->selectTable('license_id')
                ->required()
                ->title(admin_trans_label('license'))
                ->dialogWidth('50%') // 弹窗宽度，默认 800px
                ->from(LicenseSelectTable::make(['id' => $form->getKey()])) // 设置渲染类实例，并传递自定义参数
                ->model(License::class, 'id', 'name'); // 设置编辑数据显示
            $form->hidden('product_ids');
            $form->hidden('article_ids');
            $form->hidden('mail_id');
            $form->hidden('banner_ids');

            $form->switch('process_status')->default(0);
            $form->text('remark')->saving(function ($v){
                return (string)$v;
            });

            $form->display('created_at');
            $form->display('updated_at');

            $form->saving(function (Form $form) {
                //商品
                $categorys = ProductCategory::where('is_directory', 0)->inRandomOrder()->take(3)->get('id');
                $productIds = [];
                if($categorys){
                    foreach ($categorys as $category){
                        $products = Product::where('category_id', '=', $category->id)->inRandomOrder()->take(3)->get('id');
                        foreach ($products as $product){
                            $productIds[] = $product->id;
                        }
                    }
                }
                $form->product_ids = implode(',', $productIds);

                //banner
                $banner = Banner::inRandomOrder()->take(3)->get('id');
                $form->banner_ids = Banner::doesntExist() ? '' : Banner::implode(',', $banner);

                //文章
                $artCate = ArticleCategory::get('id');
                $articleIds = [];
                foreach ($artCate as $itme){
                    $article = Article::where('category_id', '=', $itme['id'])->inRandomOrder()->take(1)->get('id');
                    $articleIds[] = $article[0]['id'];
                }
                $form->article_ids = implode(',', $articleIds);

                //邮箱
                $emailId = Mail::inRandomOrder()->take(1)->get('id');
                $form->mail_id = $emailId[0]['id'];
            });
        });
    }
}
