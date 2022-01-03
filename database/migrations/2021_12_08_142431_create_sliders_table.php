<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'sliders', function ( Blueprint $table )
        {
            $table->id();
            $table->string( 'title_en' )->nullable();
            $table->string( 'title_bn' )->nullable();
            $table->string( 'sub_title_en' )->nullable();
            $table->string( 'sub_title_bn' )->nullable();
            $table->string( 'image' )->nullable();
            $table->text( 'description_en' )->nullable();
            $table->text( 'description_bn' )->nullable();
            $table->boolean( 'status' )->default( true );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'sliders' );
    }
}
