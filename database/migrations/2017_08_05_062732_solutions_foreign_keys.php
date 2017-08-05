<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SolutionsForeignKeys extends Migration
{
    public function up() {
        Schema::table('solutions', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
        Schema::table('solutions', function (Blueprint $table) {
            $table->foreign('question_id')
                ->references('id')->on('questions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('solutions', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('questions_id');
        });
    }
}
