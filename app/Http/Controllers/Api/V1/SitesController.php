<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\BannerResource;
use App\Http\Resources\LicenseResource;
use App\Http\Resources\ProductResource;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Site;
use Illuminate\Http\Request;

class SitesController extends Controller
{
    protected $host;

    protected $site;

    public function __construct(Request $request)
    {
        $this->host = $request->header('host');
        $this->site = Site::where('domain', $this->host)->first();
    }

    public function license()
    {
        $license = $this->site->license;
        $license['email'] = $this->site->mail->email;
        return new LicenseResource($license);
    }

    public function banners()
    {
        $banners = $this->site->dataModel(new Banner, $this->site->banner_ids)->get();
        return BannerResource::collection($banners);
    }

    public function products()
    {
        $products = $this->site->dataModel(new Product, $this->site->product_ids)->where('on_sale', true)->get();
        return ProductResource::collection($products);
    }

    public function articles()
    {
        $articles = $this->site->dataModel(new Article, $this->site->article_ids)->get();
        return ArticleResource::collection($articles);
    }

}