<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();
            $table->string('manufacturer', 30);
            $table->string('model', 30);
            $table->decimal('price', 10,2);
            $table->timestamps();
        });
        Schema::table('modelos',function (Blueprint $table){
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('photo_id');
            $table->foreign('photo_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modelos', function (Blueprint $table){
            $tale->dropForeign(['category_id']);
            $tale->dropColumn(['category_id']);


        });


        Schema::dropIfExists('modelos');
    }
}
