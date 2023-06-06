<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reorders', function (Blueprint $table) {
            $table->id();
            $table->string('User_id',5)->nullable();
            $table->string('item_id',5)->nullable();
            $table->string('item_name',30)->nullable();
            $table->string('item_quantity',10)->nullable();
            $table->string('item_category',30)->nullable();
            $table->string('status',10)->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('reorders');
    }
}
