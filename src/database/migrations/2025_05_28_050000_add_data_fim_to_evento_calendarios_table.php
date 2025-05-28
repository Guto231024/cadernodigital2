<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('evento_calendarios', function (Blueprint $table) {
            $table->date('data_fim')->after('data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('evento_calendarios', function (Blueprint $table) {
            $table->dropColumn('data_fim');
        });
    }
};
