<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->default('')->comment('名称');
            $table->string('title')->default('')->comment('标题');
            $table->string('address')->default('')->comment('地址');
            $table->text('about')->comment('关于');
            $table->string('photo')->default('')->comment('快照');
            $table->string('logo')->default('')->comment('LOGO');
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
        Schema::dropIfExists('licenses');
    }
}
