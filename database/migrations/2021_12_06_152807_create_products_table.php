<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'products', function ( Blueprint $table )
        {
            $table->id();
            $table->integer( 'brand_id' )->nullable();
            $table->integer( 'category_id' )->nullable();
            $table->integer( 'subcategory_id' )->nullable();
            $table->integer( 'subsubcategory_id' )->nullable();
            $table->string( 'product_name_en' )->nullable();
            $table->string( 'product_name_bn' )->nullable();
            $table->string( 'product_slug_en' )->nullable();
            $table->string( 'product_slug_bn' )->nullable();
            $table->string( 'product_code' )->nullable();
            $table->string( 'product_quantity_en' )->nullable();
            $table->string( 'product_quantity_bn' )->nullable();
            $table->string( 'product_tags_en' )->nullable();
            $table->string( 'product_tags_bn' )->nullable();
            $table->string( 'product_color_en' )->nullable();
            $table->string( 'product_color_bn' )->nullable();
            $table->string( 'product_size_en' )->nullable();
            $table->string( 'product_size_bn' )->nullable();
            $table->string( 'product_weight_en' )->nullable();
            $table->string( 'product_weight_bn' )->nullable();
            $table->unsignedBigInteger( 'selling_price' )->nullable();
            $table->unsignedBigInteger( 'discount' )->nullable();
            $table->unsignedBigInteger( 'discount_price' )->nullable();
            $table->string( 'product_thumbnail' )->nullable();
            $table->integer( 'hot_deals' )->default( 0 )->nullable();
            $table->integer( 'featured' )->default( 0 )->nullable();
            $table->integer( 'special_offer' )->default( 0 )->nullable();
            $table->integer( 'special_deals' )->default( 0 )->nullable();
            $table->longText( 'short_desc_en' )->nullable();
            $table->longText( 'short_desc_bn' )->nullable();
            $table->longText( 'full_desc_en' )->nullable();
            $table->longText( 'full_desc_bn' )->nullable();
            $table->integer( 'status' )->default( 1 )->nullable();
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
        Schema::dropIfExists( 'products' );
    }
}
