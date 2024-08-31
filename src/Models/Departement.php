<?php

namespace Elbrahms\NigerLocation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Departement extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['departement', 'departement_region_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(Config::get('location.departements_table', 'departements'));
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'departement_region_id');
    }

    public function communes()
    {
        return $this->hasMany(Commune::class, 'commune_departement_id');
    }
    protected static function newFactory()
    {
        return \Elbrahms\NigerLocation\Database\Factories\DepartementFactory::new();
    }
}
