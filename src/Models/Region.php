<?php

namespace Elbrahms\NigerLocation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Region extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'code', 'region_country_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(Config::get('location.regions_table', 'regions'));
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'region_country_id');
    }

    public function departements()
    {
        return $this->hasMany(Departement::class, 'departement_region_id');
    }

    protected static function newFactory()
    {
        return \Elbrahms\NigerLocation\Database\Factories\RegionFactory::new();
    }
}
