<?php

use App\Models\Category;
use App\Models\SubCategory;
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
            $table->foreignIdFor(Category::class)->nullable();
            $table->foreignIdFor(SubCategory::class)->nullable();
            $table->string('name')->nullable();
            $table->longText('details')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('price')->nullable();
            $table->integer('available_quantity')->nullable();
            $table->integer('sold_quantity')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
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
