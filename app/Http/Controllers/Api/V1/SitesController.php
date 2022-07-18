<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\CommentRequest;
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
        $banners = $this->site->banners;
        return BannerResource::collection($banners);
    }

    public function products()
    {
        $products = $this->site->products;
        return ProductResource::collection($products);
    }

    public function articles()
    {
        $articles = $this->site->articles;
        return ArticleResource::collection($articles);
    }

    public function addComment(CommentRequest $request)
    {
        $this->site->comments()->create($request->only([
            'name',
            'email',
            'subject',
            'message',
        ]));
    }

}
