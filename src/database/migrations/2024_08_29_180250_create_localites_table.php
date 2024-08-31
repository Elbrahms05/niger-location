<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalitesTable extends Migration
{
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('localite', 50);
            $table->unsignedBigInteger('localite_commune_id');
            $table->foreign('localite_commune_id')->references('id')->on($this->getCommuneTableName())->onDelete('cascade');
        });
    }

    protected function getTableName()
    {
        return Config::get('location.localites_table');
    }

    protected function getCommuneTableName()
    {
        return Config::get('location.communes_table');
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
