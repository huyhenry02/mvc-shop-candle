<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->string('shipping_name', 255)->nullable();
            $table->string('shipping_address', 255)->nullable();
            $table->string('shipping_phone', 255)->nullable();
            $table->string('shipping_note', 255)->nullable();
            $table->enum('status', ['pending', 'approved', 'shipping', 'completed'])->default('pending');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
