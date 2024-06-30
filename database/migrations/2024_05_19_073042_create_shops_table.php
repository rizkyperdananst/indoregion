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
            $table->string('name');
            $table->char('province_id', 2);
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->char('regency_id', 4);
            $table->foreign('regency_id')
                ->references('id')
                ->on('regencies')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->char('district_id', 7);
            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->char('village_id', 10);
            $table->foreign('village_id')
                ->references('id')
                ->on('villages')
                ->onUpdate('cascade')->onDelete('restrict');
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
