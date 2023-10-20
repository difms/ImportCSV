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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->nullable();;
            $table->string('title');
            $table->string('l1')->nullable();
            $table->string('l2')->nullable();
            $table->string('l3')->nullable();
            $table->float('price')->nullable();;
            $table->float('price_sp')->nullable();;
            $table->integer('stock')->nullable();;
            $table->integer('params')->nullable();
            $table->integer('related')->nullable();
            $table->string('unit')->nullable();;
            $table->string('img')->nullable();
            $table->boolean('on_main')->default(0);
            $table->text('description')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
