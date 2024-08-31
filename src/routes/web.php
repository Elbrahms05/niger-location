<?php

Route::group(['prefix' => Config::get('location.routes.prefix'), 'namespace' => 'Elbrahms\NigerLocation\Http\Controllers', 'middleware' => [Config::get('location.routes.middleware')]], function () {
    # Get all Countries
    Route::get('countries', 'LocationController@getCountries');
    # Get a Country by its ID
    Route::get('country/{id}', 'LocationController@getCountry');
    ##########################################################################################
    # Get all Regions
    Route::get('regions', 'LocationController@getRegions');
    # Get a Region by its ID
    Route::get('region/{id}', 'LocationController@getRegion');
    # Get all Regions in a Country using the Country ID
    Route::get('regions-by-country/{countryId}', 'LocationController@getRegionsByCountry');
    ##########################################################################################
    # Get all Departements
    Route::get('departements', 'LocationController@getDepartements');
    # Get a departement by its ID
    Route::get('departement/{id}', 'LocationController@getDepartement');
    # Get all departements in a region using the region ID
    Route::get('departements-by-region/{regionId}', 'LocationController@getDepartementsByRegion');
    # Get all departements in a country using the country ID
    Route::get('departements-by-country/{countryId}', 'LocationController@getDepartementsByCountry');
    ##########################################################################################
    # Get all Communes
    Route::get('communes', 'LocationController@getCommunes');
    # Get a Commune by its ID
    Route::get('commune/{id}', 'LocationController@getCommune');
    # Get all Communes in a departement using the departement ID
    Route::get('communes-by-departement/{departementId}', 'LocationController@getCommunesByDepartement');
    # Get all Communes in a Region using the Region ID
    Route::get('communes-by-region/{regionId}', 'LocationController@getCommunesByregion');
    # Get all Communes in a Country using the Country ID
    Route::get('communes-by-country/{countryId}', 'LocationController@getCommunesByCountry');
    ##########################################################################################
    # Get all Localites
    Route::get('localites', 'LocationController@getLocalites');
    # Get a Localite by its ID
    Route::get('localite/{id}', 'LocationController@getLocalite');
    # Get all Localites in a Commune using the Commune ID
    Route::get('localites-by-commune/{communeId}', 'LocationController@getLocalitesByCommune');
    # Get all Localites in a Departement using the Departement ID
    Route::get('localites-by-departement/{departementId}', 'LocationController@getLocalitesByDepartement');
    # Get all Localites in a Region using the Region ID
    Route::get('localites-by-region/{regionId}', 'LocationController@getLocalitesByRegion');
    # Get all Localites in a Country using the Country ID
    Route::get('localites-by-country/{countryId}', 'LocationController@getLocalitesByCountry');
});
