<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            if (!Schema::hasColumn('orders', 'shipping_cost_customer')) {
                $table->decimal('shipping_cost_customer', 8, 2)->nullable();
            }

            if (!Schema::hasColumn('orders', 'shipping_cost_actual')) {
                $table->decimal('shipping_cost_actual', 8, 2)->nullable();
            }

            if (!Schema::hasColumn('orders', 'shipping_currency')) {
                $table->string('shipping_currency', 3)->nullable();
            }

            if (!Schema::hasColumn('orders', 'shipping_carrier')) {
                $table->string('shipping_carrier')->nullable();
            }

            if (!Schema::hasColumn('orders', 'shipping_delivery_days')) {
                $table->string('shipping_delivery_days')->nullable();
            }

            if (!Schema::hasColumn('orders', 'shipping_is_free')) {
                $table->boolean('shipping_is_free')->default(false);
            }

            if (!Schema::hasColumn('orders', 'shipping_data')) {
                $table->json('shipping_data')->nullable();
            }
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'shipping_cost_customer',
                'shipping_cost_actual',
                'shipping_currency',
                'shipping_carrier',
                'shipping_delivery_days',
                'shipping_is_free',
                'shipping_data'
            ]);
        });
    }
};
