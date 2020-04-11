<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('summary');
            $table->text('content');
            $table->dateTime('began_at');
            $table->dateTime('finished_at');
            $table->string('status');
            $table->date('published_at');
            $table->string('tag');
            $table->string('image');
            $table->integer('category_id');
            $table->integer('vendor_id');
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
        Schema::dropIfExists('promotes');
    }
}
