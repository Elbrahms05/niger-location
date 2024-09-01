# Niger Location ▲

![hero](https://res.cloudinary.com/dtafjakmd/image/upload/v1725131286/localitesByCommune_cnfmrt.png)

## Introduction 🖖
This package offers a simple way to get the regions, departments, communes and localities of the Niger Republic (NE:+227) that you might need for your application - for example, for drop-down menus.

### Step One - Install via Composer 🎼

Require the package via composer into your project

```shell
composer require elbrahms/niger-location
```

![composer install](https://res.cloudinary.com/dtafjakmd/image/upload/v1725131285/installation_package_bkuf8q.png)

### Step Two - Publish Configurations ⚙️
Laravel location provides you with an easy way of customizing the tables used for storing Countries, States and Cities. Also, you can customisethe route prefix and middleware. To customize these you need to publish the 
configuration file. To publish the configuration file, run:

`php artisan vendor:publish --tag=niger-location`

You will have `config/location.php` available for you to edit. The default configurations are:

```php
<?php

return [
    'countries_table' => 'countries',
    'regions_table' => 'regions',
    'departements_table' => 'departements',
    'communes_table' => 'communes',
    'localites_table' => 'localites',
    'country_initial_id' => 159, //for Niger Republic
    'routes' => [
        'prefix' => 'location',
        'middleware' => 'web'
    ]
];
```

You can go ahead and customize the `table names`, `route prefix` and `middleware` as you need before running the Migration.

### Step Three - Running Migrations

> Before you do this make sure your correct Database credentials are set in the `.env` file

```shell
php artisan migrate
```

![migrations](https://res.cloudinary.com/dtafjakmd/image/upload/v1725131286/migrations_yrflg6.png)

Finally, run the Package seeders

```shell
php artisan db:seed --class=Elbrahms\NigerLocation\Database\Seeders\LocationDatabaseSeeder
```
![seeders](https://res.cloudinary.com/dtafjakmd/image/upload/v1725131284/Seeders_tvn3ht.png)
## Usage 🧨

>**NOTE**<br>
>The routes below are prefixed with `location` which is the default configuration set in the `config/location.php`
>file. If mofified, replace the prefixin your route with the correct prefix. 

Here's the table in English:

| **Route**                                  | **Description**                                                       |
|:-------------------------------------------|:----------------------------------------------------------------------|
| `/location/countries`                      | Returns all countries.                                                |
| `/location/country/{id}`                   | Returns a single country by its ID.                                   |
| `/location/regions`                        | Returns all regions.                                                  |
| `/location/region/{id}`                    | Returns a single region by its ID.                                    |
| `/location/regions-by-country/{countryId}` | Returns all regions in a country using the country ID.                |
| `/location/departements`                   | Returns all departments.                                              |
| `/location/departement/{id}`               | Returns a single department by its ID.                                |
| `/location/departements-by-region/{regionId}` | Returns all departments in a region using the region ID.            |
| `/location/departements-by-country/{countryId}` | Returns all departments in a country using the country ID.         |
| `/location/communes`                       | Returns all communes.                                                 |
| `/location/commune/{id}`                   | Returns a single commune by its ID.                                   |
| `/location/communes-by-departement/{departementId}` | Returns all communes in a department using the department ID.      |
| `/location/communes-by-region/{regionId}`  | Returns all communes in a region using the region ID.                 |
| `/location/communes-by-country/{countryId}`| Returns all communes in a country using the country ID.               |
| `/location/localites`                      | Returns all localities.                                               |
| `/location/localite/{id}`                  | Returns a single locality by its ID.                                  |
| `/location/localites-by-commune/{communeId}`| Returns all localities in a commune using the commune ID.             |
| `/location/localites-by-departement/{departementId}` | Returns all localities in a department using the department ID.   |
| `/location/localites-by-region/{regionId}` | Returns all localities in a region using the region ID.               |
| `/location/localites-by-country/{countryId}` | Returns all localities in a country using the country ID.          |

This table lists the routes defined in your code and provides a brief description of what each one returns.

## Test
`composer test`

## Contribution

Free for all, if you find an issue with the package or if a group of people somehow created a new country please send in a PR.
