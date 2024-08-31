<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('departement', 50);
            $table->unsignedBigInteger('departement_region_id');
            $table->foreign('departement_region_id')->references('id')->on($this->getRegionTableName())->onDelete('cascade');
        });
    }

    protected function getRegionTableName()
    {
        return Config::get('location.regions_table');
    }

    protected function getTableName()
    {
        return Config::get('location.departements_table');
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
