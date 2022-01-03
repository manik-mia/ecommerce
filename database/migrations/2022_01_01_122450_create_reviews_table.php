<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'reviews', function ( Blueprint $table )
        {
            $table->id();
            $table->unsignedBigInteger( 'user_id' );
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->constraint()->cascadeOnDelete();
            $table->unsignedBigInteger( 'product_id' );
            $table->foreign( 'product_id' )->references( 'id' )->on( 'products' )->constraint()->cascadeOnDelete();
            $table->string( 'comment' )->nullable();
            $table->integer( 'rating' )->nullable();
            $table->string( 'status', 20 )->default( 'pending' );
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
        Schema::dropIfExists( 'reviews' );
    }
}
