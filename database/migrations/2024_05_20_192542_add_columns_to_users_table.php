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
            $table->string('region');
            $table->string('date_of_birth');
            $table->string('practice');
            $table->string('practice_number');
            $table->string('address');
            $table->string('zip_code');
            $table->string('state');
            $table->string('authorization_number');
            $table->string('facility_name');
            $table->string('employer_letter');
            $table->string('registration_number');
            $table->string('license_number');
            $table->string('occupation');
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
