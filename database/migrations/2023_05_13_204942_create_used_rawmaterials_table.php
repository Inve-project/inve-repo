<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsedRawmaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('used_rawmaterials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('raw_material_id');
            $table->string('name',30)->nullable();
            $table->string('quantity',10)->nullable();
            $table->string('date',10)->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('raw_material_id')->references('id')->on('rawmaterials');
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
        Schema::dropIfExists('used_rawmaterials');
    }
}
