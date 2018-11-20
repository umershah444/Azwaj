<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            ////////////////PERSONAL INFORMATION//////////////////////
            $table->string('username')->nullable();
            $table->integer('age')->nullable();
            $table->integer('gender_id')->unsigned()->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->integer('origin_id')->unsigned()->nullable();
            $table->foreign('origin_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('nationality_id')->unsigned()->nullable();
            $table->foreign('nationality_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('cast_id')->unsigned()->nullable();
            $table->foreign('cast_id')->references('id')->on('casts')->onDelete('cascade');
            $table->integer('country_id')->unsigned()->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->integer('province_id')->unsigned()->nullable();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->string('nearest_location')->nullable();
            $table->integer('native_language_id')->unsigned()->nullable();
            $table->foreign('native_language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->integer('second_language_id')->unsigned()->nullable();
            $table->foreign('second_language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->integer('nummber')->nullable();
            
            
            //////////////////////////LIFESTYLE////////////////////////////////
            $table->integer('religion_id')->unsigned()->nullable();
            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->integer('sect_id')->unsigned()->nullable();
            $table->foreign('sect_id')->references('id')->on('sects')->onDelete('cascade');
            $table->integer('martial_status_id')->unsigned()->nullable();
            $table->foreign('martial_status_id')->references('id')->on('martial_statuses')->onDelete('cascade');
            $table->boolean('accept_polygamy')->nullable();
            $table->string('seeking_for')->nullable();
            $table->string('partner_age_limit')->nullable();
            $table->integer('living_situation_id')->unsigned()->nullable();
            
            $table->integer('sibling_brothers')->nullable();
            $table->integer('sibling_brothers_married')->nullable();
            $table->integer('sibling_sisters')->nullable();
            $table->integer('sibling_sisters_married')->nullable();
            $table->integer('diet_id')->unsigned()->nullable();
            
            $table->boolean('smoking')->nullable();
            $table->boolean('drinking')->nullable();
            $table->boolean('willing_to_relocate')->nullable();
            
            
            
            /////////////////////////PROFESSIONAL////////////////////////////////
            $table->boolean('hafiz_quran')->nullable();
            $table->integer('education_id')->unsigned()->nullable();
            $table->foreign('education_id')->references('id')->on('education')->onDelete('cascade');
            $table->integer('profession_id')->unsigned()->nullable();
            $table->foreign('profession_id')->references('id')->on('professions')->onDelete('cascade');
            $table->string('income')->nullable();
            
            
            //////////////////////////APPEARANCE////////////////////////////////
            $table->float('height')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('body_type_id')->unsigned()->nullable();
            $table->foreign('body_type_id')->references('id')->on('body_types')->onDelete('cascade');
            $table->integer('complexion_id')->unsigned()->nullable();
            $table->foreign('complexion_id')->references('id')->on('complexions')->onDelete('cascade');
            $table->integer('disability_id')->unsigned()->nullable();
            $table->foreign('disability_id')->references('id')->on('disabilities')->onDelete('cascade');
            
            
            /////////////////////////////ABOUT//////////////////////////////////
            $table->text('about_yourself')->nullable();
            $table->text('about_partner')->nullable();
            
            $table->boolean('status')->nullable();  
            $table->boolean('block')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
