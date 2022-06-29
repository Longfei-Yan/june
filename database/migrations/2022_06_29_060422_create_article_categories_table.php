<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('parent_id')->default('0')->comment('父类ID');
            $table->string('title')->default('')->comment('标题');
            $table->integer('order')->default(0)->comment('排序');
            $table->unsignedTinyInteger('depth')->default(1)->comment('层级');
            $table->unsignedTinyInteger('show')->default(1)->comment('显示');
            $table->string('icon')->default('')->comment('图标');
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
        Schema::dropIfExists('article_categories');
    }
}
