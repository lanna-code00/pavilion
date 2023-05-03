<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::table('email_audit_log', function (Blueprint $table) {
               $table->foreignUlid('user_id')->nullable()->constrained('users')->onDelete('cascade');
            });
        } catch (\Exception $e) {
            return "Column already exists";
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['user_id']);
        Schema::dropColumns(['user_id']);
    }
};
