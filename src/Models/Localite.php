<?php

namespace Elbrahms\NigerLocation\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Localite extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['localite', 'localite_commune_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setTable(Config::get('location.localites_table', 'localites'));
    }

    public function commune()
    {
        return $this->belongsTo(Commune::class, 'localite_commune_id');
    }
    protected static function newFactory()
    {
        return \Elbrahms\NigerLocation\Database\Factories\LocaliteFactory::new();
    }
}
