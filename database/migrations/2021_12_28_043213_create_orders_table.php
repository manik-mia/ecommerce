<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'orders', function ( Blueprint $table )
        {
            $table->id();
            $table->unsignedBigInteger( 'user_id' )->nullable();
            $table->unsignedBigInteger( 'division_id' )->nullable();
            $table->unsignedBigInteger( 'district_id' )->nullable();
            $table->unsignedBigInteger( 'state_id' )->nullable();
            $table->string( 'name' )->nullable();
            $table->string( 'email' )->nullable();
            $table->string( 'phone' )->nullable();
            $table->integer( 'post_code' )->nullable();
            $table->string( 'payment_type' )->nullable();
            $table->string( 'payment_method' )->nullable();
            $table->string( 'transaction_id' )->nullable();
            $table->string( 'currency' );
            $table->float( 'amount', 8, 2 )->nullable();
            $table->string( 'order_number' )->nullable();
            $table->string( 'invoice_no' )->nullable();
            $table->string( 'order_date' )->nullable();
            $table->string( 'order_month' )->nullable();
            $table->string( 'order_year' )->nullable();
            $table->string( 'confirm_date' )->nullable();
            $table->string( 'processing_date' )->nullable();
            $table->string( 'picked_date' )->nullable();
            $table->string( 'shipped_date' )->nullable();
            $table->string( 'delivered_date' )->nullable();
            $table->string( 'cancel_date' )->nullable();
            $table->string( 'return_date' )->nullable();
            $table->string( 'return_reason' )->nullable();
            $table->text( 'notes' )->nullable();
            $table->string( 'status' )->default( 'pending' );
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
        Schema::dropIfExists( 'orders' );
    }
}
