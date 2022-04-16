<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class SettlementType extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
    ];

    public function settlement()
    {
        return $this->hasMany(Settlement::class);
    }

    /**
     * Interact with the name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst(utf8_decode($value)),
            set: fn ($value) => strtolower(utf8_encode($value)),
        );
    }
}
