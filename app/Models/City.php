<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'federal_entity_id',
        'settlement_id',
        'municipality_id',
        'zip_code',
        'locality',
    ];

    /**
     * Interact with the name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper(utf8_decode($value)),
            set: fn ($value) => strtolower(utf8_encode($value)),
        );
    }

    public function federal_entity (){
        return $this->belongsTo(FederalEntity::class);
    }

    public function settlement (){
        return $this->belongsTo(Settlement::class);
    }

    public function municipality (){
        return $this->belongsTo(Municipality::class);
    }
}
