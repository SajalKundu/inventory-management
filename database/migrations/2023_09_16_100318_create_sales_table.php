<?php

use App\Models\Customer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id')->nullable();
            $table->foreignIdFor(Customer::class)->nullable();
            $table->date('invoice_create_date')->nullable();
            $table->longText('note')->nullable();
            $table->integer('total_amount')->nullable();
            $table->integer('total_sub_amount')->nullable();
            $table->integer('total_paid')->nullable();
            $table->integer('total_due')->nullable();
            $table->integer('discount_amount')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
