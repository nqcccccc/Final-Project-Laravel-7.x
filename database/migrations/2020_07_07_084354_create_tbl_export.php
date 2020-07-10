<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblExport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_export', function (Blueprint $table) {
            $table->increments('out_id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('tbl_product');
            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('branch_id')->on('tbl_branch');
            $table->integer('out_qty');
            $table->integer('out_price');
            $table->datetime('out_date');
            $table->integer('sub_profit');
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
        Schema::dropIfExists('tbl_export');
    }
}
