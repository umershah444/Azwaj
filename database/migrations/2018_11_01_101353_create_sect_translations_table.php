<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sect_translations', function (Blueprint $table) {
              $table->increments('id');
            $table->integer('sect_id')->unsigned();
            $table->foreign('sect_id')->references('id')->on('sects')->onDelete('cascade');
            
            $table->string('locale')->index();
            $table->string('title')->nullabel();
            $table->unique(['sect_id','locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sect_translations');
    }
}
