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
        Schema::table('user_infos', function (Blueprint $table) {
            $table->string('go_with')->nullable();
            $table->string('address')->nullable();
            $table->string('reil')->nullable();
            $table->string('usd')->nullable();
            $table->dropColumn(['phone','email','dob','gender']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_infos', function (Blueprint $table) {
            $table->string('phone')->nullable();
            $table->string('email')->unique()->nullable();;
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->dropColumn(['go_with','address','reil','usd']);

        });
    }
};
