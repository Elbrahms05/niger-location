<?php

namespace Elbrahms\NigerLocation\Http\Controllers;

use Illuminate\Http\Request;
use Elbrahms\NigerLocation\Models\Country;
use Elbrahms\NigerLocation\Models\Region;
use Elbrahms\NigerLocation\Models\Departement;
use Elbrahms\NigerLocation\Models\Commune;
use Elbrahms\NigerLocation\Models\Localite;

class LocationController extends Controller
{
    # Get all Countries
    public function getCountries()
    {
        return response()->json(Country::all(),200);
    }

    # Get a Country by its ID
    public function getCountry($id)
    {
        return response()->json(Country::findOrFail($id),200);
    }

    # Get all Regions
    public function getRegions()
    {
        return response()->json(Region::all(),200);
    }

    # Get a Region by its ID
    public function getRegion($id)
    {
        return response()->json(Region::findOrFail($id),200);
    }

    # Get all Regions in a Country using the Country ID
    public function getRegionsByCountry($countryId)
    {
        $regions = Region::where('region_country_id', $countryId)->get();
        return response()->json($regions,200);
    }

    # Get all Departements
    public function getDepartements()
    {
        return response()->json(Departement::all(),200);
    }

    # Get a Departement by its ID
    public function getDepartement($id)
    {
        return response()->json(Departement::findOrFail($id),200);
    }

    # Get all Departements in a Region using the Region ID
    public function getDepartementsByRegion($regionId)
    {
        $departements = Departement::where('departement_region_id', $regionId)->get();
        return response()->json($departements,200);
    }

    # Get all Departements in a Country using the Country ID
    public function getDepartementsByCountry($countryId)
    {
        $departements = Departement::whereHas('region', function ($query) use ($countryId) {
            $query->where('region_country_id', $countryId);
        })->get();
        return response()->json($departements,200);
    }

    # Get all Communes
    public function getCommunes()
    {
        return response()->json(Commune::all(),200);
    }

    # Get a Commune by its ID
    public function getCommune($id)
    {
        return response()->json(Commune::findOrFail($id),200);
    }

    # Get all Communes in a Departement using the Departement ID
    public function getCommunesByDepartement($departementId)
    {
        $communes = Commune::where('commune_departement_id', $departementId)->get();
        return response()->json($communes,200);
    }

    # Get all Communes in a Region using the Region ID
    public function getCommunesByRegion($regionId)
    {
        $communes = Commune::whereHas('departement', function ($query) use ($regionId) {
            $query->where('departement_region_id', $regionId);
        })->get();
        return response()->json($communes,200);
    }

    # Get all Communes in a Country using the Country ID
    public function getCommunesByCountry($countryId)
    {
        $communes = Commune::whereHas('departement.region', function ($query) use ($countryId) {
            $query->where('region_country_id', $countryId);
        })->get();
        return response()->json($communes,200);
    }

    # Get all Localites
    public function getLocalites()
    {
        return response()->json(Localite::all(),200);
    }

    # Get a Localite by its ID
    public function getLocalite($id)
    {
        return response()->json(Localite::findOrFail($id),200);
    }

    # Get all Localites in a Commune using the Commune ID
    public function getLocalitesByCommune($communeId)
    {
        $localites = Localite::where('localite_commune_id', $communeId)->get();
        return response()->json($localites,200);
    }

    # Get all Localites in a Departement using the Departement ID
    public function getLocalitesByDepartement($departementId)
    {
        $localites = Localite::whereHas('commune', function ($query) use ($departementId) {
            $query->where('commune_departement_id', $departementId);
        })->get();
        return response()->json($localites,200);
    }

    # Get all Localites in a Region using the Region ID
    public function getLocalitesByRegion($regionId)
    {
        $localites = Localite::whereHas('commune.departement', function ($query) use ($regionId) {
            $query->where('departement_region_id', $regionId);
        })->get();
        return response()->json($localites,200);
    }

    # Get all Localites in a Country using the Country ID
    public function getLocalitesByCountry($countryId)
    {
        $localites = Localite::whereHas('commune.departement.region', function ($query) use ($countryId) {
            $query->where('region_country_id', $countryId);
        })->get();
        return response()->json($localites,200);
    }


}
