<?php

namespace App\Admin\Controllers;

use Dcat\Admin\Widgets\Card;
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
            $grid->model()->with(['license', 'mail', 'products', 'articles']);
            $grid->column('id')->sortable();
            $grid->column('domain')->copyable();
            $grid->column('license.name','公司名称');
            $grid->products()->pluck('title')->label();
            //$grid->articles()->pluck('title')->label('danger');
            //$grid->column('mail.email');
            $grid->column('banner_ids');
            $grid->column('process_status')->using(Site::$status)->dot(Site::$dot);
            $grid->column('remark') ->display('详情') // 设置按钮名称
            ->expand(function () {
                // 返回显示的详情
                // 这里返回 content 字段内容，并用 Card 包裹起来
                $card = new Card(null, $this->remark);

                return "<div style='padding:10px 10px 0'>$card</div>";
            });
            //$grid->column('updated_at')->sortable();

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
        return Show::make($id, Site::with(['license', 'mail', 'products', 'articles']), function (Show $show) {
            $show->field('id');
            $show->field('domain');
            $show->field('license.name', '公司名称');
            $show->relation('products', function ($model) {
                $grid = new Grid(Product::with(['category']));
                $grid->model()->join('product_site', function ($join) use ($model) {
                    $join->on('product_site.product_id', 'id')
                        ->where('site_id', '=', $model->id);
                });

                // 设置路由
                $grid->setResource('products');
                $grid->column('id')->sortable();
                $grid->column('title');
                $grid->column('category.title', '分类');
                $grid->column('description');
                $grid->column('image')->image();
                $grid->column('on_sale')->switch();
                $grid->column('rating_progress')->progressBar();
                $grid->column('sold_count');
                $grid->column('review_count');
                $grid->column('price');
                $grid->column('created_at');
                $grid->column('updated_at')->sortable();

                $grid->filter(function (Grid\Filter $filter) {
                    $filter->equal('id')->width('300px');
                    $filter->where('title', function ($query) {
                        $query->where('title', 'like', "%{$this->input}%");
                    });
                });

                return $grid;
            });
            $show->relation('articles', function ($model) {
                $grid = new Grid(Article::with(['category']));
                $grid->model()->join('article_site', function ($join) use ($model) {
                    $join->on('article_site.article_id', 'id')
                        ->where('site_id', '=', $model->id);
                });

                // 设置路由
                $grid->setResource('articles');
                $grid->column('id')->sortable();
                $grid->column('title');
                $grid->column('category.title', '分类');
                $grid->column('created_at');
                $grid->column('updated_at')->sortable();

                $grid->filter(function (Grid\Filter $filter) {
                    $filter->equal('id')->width('300px');
                    $filter->where('title', function ($query) {
                        $query->where('title', 'like', "%{$this->input}%");
                    });
                });

                return $grid;
            });
            $show->field('article_ids');
            $show->field('mail.email');
            $show->field('banner_ids');
            $show->field('process_status')->using(Site::$status)->dot(Site::$dot);
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
        return Form::make(Site::with(['products']), function (Form $form) {
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
                ->model(License::class, 'id', 'name');
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
                    Site::products()->detach();
                    Site::products()->attach($productIds);
                    $form->product_ids = implode(',', $productIds);
                }else{
                    $form->product_ids = '';
                }

                //banner
                $banners = Banner::inRandomOrder()->take(3)->get('id');
                $bannerIds = [];
                if ($banners){
                    foreach ($banners as $banner){
                        $bannerIds[] = $banner->id;
                    }
                    $form->banner_ids = implode(',', $bannerIds);
                }else{
                    $form->banner_ids = '';
                }

                //文章
                $artCate = ArticleCategory::get('id');
                $articleIds = [];
                if ($artCate) {
                    foreach ($artCate as $itme) {
                        $article = Article::where('category_id', '=', $itme['id'])->inRandomOrder()->take(1)->get('id');
                        $articleIds[] = $article[0]['id'];
                    }
                    Site::articles()->detach();
                    Site::articles()->attach($articleIds);
                    $form->article_ids = implode(',', $articleIds);
                }else{
                    $form->article_ids = '';
                }

                //邮箱
                $emailId = Mail::inRandomOrder()->take(1)->get('id');
                $form->mail_id = $emailId[0]['id'];
            });
        });
    }
}
