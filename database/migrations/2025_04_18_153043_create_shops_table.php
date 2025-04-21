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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('image')->nullable();
            //featured 1->active && 2->inactive
            $table->tinyinteger('featured')->default(1);
            //visibility 1->yes && 2->no
            $table->tinyinteger('visibility')->default(1);
            $table->decimal('price', 10, 2)->default(0.00);
            $table->string('size')->nullable(); 
            $table->string('description');
            $table->string('category_id')->nullable()->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
