<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ZakljucivanjeAnalize extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reprodukovanje_zahteva_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'reprodukovanje_zahteva_id' => 'integer',
        ];
    }

    public function reprodukovanjeZahteva(): BelongsTo
    {
        return $this->belongsTo(ReprodukovanjeZahteva::class);
    }

    public function izvestajAnalize(): HasOne
    {
        return $this->hasOne(IzvestajAnalize::class);
    }
}
