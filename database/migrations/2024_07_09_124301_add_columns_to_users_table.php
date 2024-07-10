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
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->string('tittle')->nullable();
            $table->string('town')->nullable();
            $table->string('catergory')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender')->nullable();
            $table->dropColumn('tittle')->nullable();
            $table->dropColumn('town')->nullable();
            $table->dropColumn('catergory')->nullable();
        });
    }
};
