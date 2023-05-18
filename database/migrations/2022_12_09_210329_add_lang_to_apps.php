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
        Schema::table('apps', function (Blueprint $table) {
            $table->string('name_kz');
            $table->string('name_en');
            $table->string('name_ru');

            $table->string('content_kz');
            $table->string('content_ru');
            $table->string('content_en');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apps', function (Blueprint $table) {
            $table->dropColumn('name_kz');
            $table->dropColumn('name_en');
            $table->dropColumn('name_ru');

            $table->dropColumn('content_kz');
            $table->dropColumn('content_ru');
            $table->dropColumn('content_en');
        });
    }
};
