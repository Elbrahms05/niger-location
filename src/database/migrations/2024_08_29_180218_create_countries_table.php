<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create($this->getTableName(), function (Blueprint $table) {
            $table->id();
            $table->string('sortname', 3);
            $table->string('name', 150);
            $table->string('slug');
            $table->integer('phonecode');
            $table->tinyInteger('status')->default(1);
        });
    }

    protected function getTableName()
    {
        return Config::get('location.countries_table');
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
