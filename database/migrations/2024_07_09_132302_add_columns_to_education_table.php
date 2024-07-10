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
        Schema::table('education', function (Blueprint $table) {
            $table->string('attended_from')->nullable();
            $table->string('attended_to')->nullable();
            $table->string('degree_date')->nullable();
            $table->string('specialization')->nullable();
            $table->string('telephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('certificate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('education', function (Blueprint $table) {
            $table->dropColumn('attended_from')->nullable();
            $table->dropColumn('attended_to')->nullable();
            $table->dropColumn('degree_date')->nullable();
            $table->dropColumn('specialization')->nullable();
            $table->dropColumn('telephone')->nullable();
            $table->dropColumn('fax')->nullable();
            $table->dropColumn('certificate')->nullable();
        });
    }
};
