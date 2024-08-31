<?php

namespace Elbrahms\NigerLocation\Models;

use Illuminate\Database\Eloquent\Model;
use Elbrahms\NigerLocation\Models\Localite;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Commune extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['commune', 'commune_departement_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(Config::get('location.communes_table', 'communes'));
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class, 'commune_departement_id');
    }

    public function localites()
    {
        return $this->hasMany(Localite::class, 'localite_commune_id');
    }

    protected static function newFactory()
    {
        return \Elbrahms\NigerLocation\Database\Factories\CommuneFactory::new();
    }
}
