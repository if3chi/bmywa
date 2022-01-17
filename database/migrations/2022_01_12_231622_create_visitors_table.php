<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('browser', 32)->nullable();
            $table->string('platform', 32)->nullable();
            $table->string('device', 32)->nullable();
            $table->string('ip')->nullable();
            // Location
            $table->string('country_code', 8)->nullable();
            $table->string('city_name')->nullable();
            $table->string('region_name')->nullable();
            $table->string('country_name', 64)->nullable();
            // Date
            $table->time('visit_time');
            $table->date('visit_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
