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
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->boolean('is_promotion')->default(false);
            $table->decimal('promotion_price', 8, 2)->nullable(); // Make nullable if promotion price might not always be set
            $table->string('image_url');
            $table->unsignedBigInteger('category_id'); // Add this line for the category ID
            $table->foreign('category_id')->references('id')->on('categories'); // Add this line to set the foreign key constraint
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Drop the foreign key constraint
            $table->dropColumn('category_id'); // Remove the category_id column
        });
        Schema::dropIfExists('products');
    }
};