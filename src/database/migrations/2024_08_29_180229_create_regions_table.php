<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('name', 10);
            $table->string('code', 5);
            $table->unsignedBigInteger('region_country_id');
            $table->foreign('region_country_id')->references('id')->on($this->getCountryTableName())->onDelete('cascade');
        });
    }
    protected function getCountryTableName()
    {
        return Config::get('location.countries_table');
    }
    protected function getTableName()
    {
        return Config::get('location.regions_table');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->getTableName());
    }
}
