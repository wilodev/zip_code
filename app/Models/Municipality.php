<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'name',
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

    public function cities ()
    {
        return $this->hasMany(City::class);
    }
}
