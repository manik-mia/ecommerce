<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'sub_sub_categories', function ( Blueprint $table )
        {
            $table->id();
            $table->foreignId( 'category_id' )->nullable()->constrained()->cascadeOnDelete();
            $table->integer( 'subcategory_id' )->nullable();
            $table->string( 'subsubcategory_name_en' )->nullable();
            $table->string( 'subsubcategory_slug_en' )->nullable();
            $table->string( 'subsubcategory_name_bn' )->nullable();
            $table->string( 'subsubcategory_slug_bn' )->nullable();
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
        Schema::dropIfExists( 'sub_sub_categories' );
    }
}
