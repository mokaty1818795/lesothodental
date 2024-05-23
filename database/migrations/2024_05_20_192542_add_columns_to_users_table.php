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
            $table->string('region')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('practice')->nullable();
            $table->string('practice_number')->nullable();
            $table->string('address')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('state')->nullable();
            $table->string('authorization_number')->nullable();
            $table->string('facility_name')->nullable();
            $table->string('employer_letter')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('license_number')->nullable();
            $table->string('occupation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('region');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('practice');
            $table->dropColumn('practice_number');
            $table->dropColumn('address');
            $table->dropColumn('zip_code');
            $table->dropColumn('state');
            $table->dropColumn('authorization_number');
            $table->dropColumn('facility_name');
            $table->dropColumn('employer_letter');
            $table->dropColumn('registration_number');
            $table->dropColumn('license_number');
            $table->dropColumn('occupation');
        });
    }
};
