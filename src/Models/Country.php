<?php

namespace Elbrahms\NigerLocation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Country extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['sortname', 'name', 'slug', 'phonecode', 'status'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(Config::get('location.countries_table', 'countries'));
    }

    public function regions()
    {
        return $this->hasMany(Region::class, 'region_country_id');
    }
    protected static function newFactory()
    {
        return \Elbrahms\NigerLocation\Database\Factories\CountryFactory::new();
    }
}
