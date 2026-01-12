<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ReprodukovanjeZahteva extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reprodukovanje_pokusaj',
        'reprodukovan',
        'komentar',
        'zahtev_id',
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
            'reprodukovan' => 'boolean',
            'zahtev_id' => 'integer',
        ];
    }

    public function zahtev(): BelongsTo
    {
        return $this->belongsTo(Zahtev::class);
    }

    public function zakljucivanjeAnalize(): HasOne
    {
        return $this->hasOne(ZakljucivanjeAnalize::class);
    }
}
