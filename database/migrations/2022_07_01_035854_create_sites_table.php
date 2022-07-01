<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domain')->default('')->comment('域名');
            $table->unsignedBigInteger('license_id')->default('0')->comment('执照ID');
            $table->string('product_ids')->default('')->comment('商品IDS');
            $table->string('article_ids')->default('')->comment('文章IDS');
            $table->unsignedBigInteger('mail_id')->default('0')->comment('邮箱ID');
            $table->string('banner_ids')->default('')->comment('横幅IDS');
            $table->unsignedTinyInteger('process_status')->default('0')->comment('处理状态');
            $table->string('remark')->default('')->comment('备注');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
    }
}
