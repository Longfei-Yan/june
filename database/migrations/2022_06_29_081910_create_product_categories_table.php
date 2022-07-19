<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('parent_id')->default('0')->comment('父类ID');
            $table->unsignedInteger('order')->default('0')->comment('排序');
            $table->string('title')->default('')->comment('标题');
            $table->tinyInteger('is_directory')->comment('是否有子类');
            $table->unsignedInteger('depth')->default('1')->comment('层级');
            $table->string('path')->nullable()->comment('完整父类ID');
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
        Schema::dropIfExists('product_categories');
    }
}
