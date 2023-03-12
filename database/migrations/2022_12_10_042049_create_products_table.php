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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->longText('description')->nullable();
            $table->foreignId('category_id')->references('id')->on('categories')->constrained();
            $table->unsignedBigInteger('parent_id')->nullable()->index();
            $table->foreignId('brand_id')->references('id')->on('brands')->constrained();
            $table->string('video')->nullable();
            $table->foreignId('attribute_id')->references('id')->on('attributes')->constrained();
            $table->foreignId('attribute_values_id')->references('id')->on('attribute_values')->constrained();
            $table->string('warranty_period')->nullable();
            $table->string('warranty_policy')->nullable();
            $table->double('price')->index();
            $table->double('price_purchase')->index();
            $table->string('slug')->index();
            $table->string('skus')->unique();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
