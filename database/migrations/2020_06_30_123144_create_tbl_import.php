<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblImport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_import', function (Blueprint $table) {
            $table->increments('in_id');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('product_id')->on('tbl_product');
            $table->integer('branch_id')->unsigned();
            $table->foreign('branch_id')->references('branch_id')->on('tbl_branch');
            $table->integer('in_qty');
            $table->integer('in_price');
            $table->date('in_date');
            $table->integer('in_inventory');
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
        Schema::dropIfExists('tbl_import');
    }
}
