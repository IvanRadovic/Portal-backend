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
        Schema::table('article', function (Blueprint $table) {
            // default je stavljeno jer vec ima podataka u bazu, pa da bi prosla migracija jer je ovo polje not null
            // kod inicijalne instalacije ne stavlja se ovaj default
            $table->dateTime('date')->after('subcategory_id');//->default('2024-01-01 00:00:00');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }
};
