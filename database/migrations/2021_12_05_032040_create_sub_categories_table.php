<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'sub_categories', function ( Blueprint $table )
        {
            $table->id();
            $table->foreignId( 'category_id' )->nullable()->constrained()->nullOnDelete();
            $table->string( 'subcategory_name_en' )->nullable();
            $table->string( 'subcategory_slug_en' )->nullable();
            $table->string( 'subcategory_name_bn' )->nullable();
            $table->string( 'subcategory_slug_bn' )->nullable();
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
        Schema::dropIfExists( 'sub_categories' );
    }
}
