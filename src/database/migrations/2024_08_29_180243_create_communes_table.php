<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunesTable extends Migration
{
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('commune');
            $table->unsignedBigInteger('commune_departement_id');
            $table->foreign('commune_departement_id')->references('id')->on($this->getDepartementTableName())->onDelete('cascade');
        });
    }
    protected function getDepartementTableName()
    {
        return Config::get('location.departements_table');
    }

    protected function getTableName()
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
