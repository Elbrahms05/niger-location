<?php

namespace Elbrahms\NigerLocation\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Config;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function getLocaliteTableName()
    {
        return Config::get('location.localites_table');
    }

    protected function getCommuneTableName()
    {
        return Config::get('location.communes_table');
    }
    protected function getDepartementTableName()
    {
        return Config::get('location.departements_table');
    }

    protected function getCountryTableName()
    {
        return Config::get('location.countries_table');
    }
    protected function getRegionTableName()
    {
        return Config::get('location.regions_table');
    }
}
