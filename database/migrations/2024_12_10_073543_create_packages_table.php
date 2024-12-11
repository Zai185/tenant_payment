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
        // 'name',
        // 'price',
        // 'max_users',
        // 'max_products',
        // 'max_invoices'

        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->integer("price");
            $table->integer("max_users");
            $table->integer("max_products");
            $table->integer("max_invoices");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
