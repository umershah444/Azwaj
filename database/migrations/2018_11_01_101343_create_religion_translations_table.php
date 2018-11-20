<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReligionTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('religion_translations', function (Blueprint $table) {
              $table->increments('id');
            $table->integer('religion_id')->unsigned();
            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
            
            $table->string('locale')->index();
            $table->string('title')->nullabel();
            $table->unique(['religion_id','locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('religion_translations');
    }
}
